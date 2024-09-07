<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $search = $request->query('search');
        $sortField = $request->query('sort', 'tanggal_masuk'); // Default sorting field
        $sortOrder = $request->query('order', 'desc'); // Default sorting order
        $perPage = $request->query('per_page', 99999); // Default 10 data per page

        $validSortFields = ['id_transaksi', 'tanggal_masuk', 'keluar_sepatu', 'jenis_sepatu'];
        $validSortOrders = ['asc', 'desc'];

        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'tanggal_masuk';
        }

        if (!in_array($sortOrder, $validSortOrders)) {
            $sortOrder = 'desc';
        }

        $query = Order::query();

        // Apply filters
        if ($filter == 'daily') {
            $query->whereDate('tanggal_masuk', Carbon::today());
        } elseif ($filter == 'weekly') {
            $query->whereBetween('tanggal_masuk', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
        } elseif ($filter == 'monthly') {
            $query->whereMonth('tanggal_masuk', Carbon::now()->month);
        }

        // Apply search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_client', 'like', "%{$search}%")
                  ->orWhere('merk_sepatu', 'like', "%{$search}%")
                  ->orWhere('jenis_sepatu', 'like', "%{$search}%");
            });
        }

        // Apply sorting
        $query->orderBy($sortField, $sortOrder);

        // Handle per_page and pagination
        if ($perPage == 'all') {
            $orders = $query->get(); // Get all orders without pagination
        } else {
            $orders = $query->paginate($perPage);
        }

        return view('orders.index', compact('orders', 'search', 'filter', 'sortField', 'sortOrder'));
    }

    public function showDetail($id)
    {
        $order = Order::find($id);
    
        if ($order) {
            return view('orders.detail', compact('order'));
        } else {
            return response()->json(['error' => 'Order tidak ditemukan'], 404);
        }
    }
    
    public function print($id)
    {
        $order = Order::findOrFail($id);
        $pdf = Pdf::loadView('orders.invoice', compact('order'));
        return $pdf->stream('struk.pdf');
    }

    public function create()
    {
        $existingMerk = Order::select('merk_sepatu')->distinct()->pluck('merk_sepatu');
        $existingJenis = Order::select('jenis_sepatu')->distinct()->pluck('jenis_sepatu');

        return view('orders.create', compact('existingMerk', 'existingJenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'nama_client' => 'required',
            'no_handphone' => 'required',
            'merk_sepatu' => 'required',
            'jenis_sepatu' => 'required',
            'service' => 'required',
            'harga' => 'required|numeric',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $existingMerk = Order::distinct()->pluck('merk_sepatu');
        $existingJenis = Order::distinct()->pluck('jenis_sepatu');

        return view('orders.edit', compact('order', 'existingMerk', 'existingJenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'nama_client' => 'required',
            'no_handphone' => 'required',
            'merk_sepatu' => 'required',
            'jenis_sepatu' => 'required',
            'service' => 'required',
            'harga' => 'required|numeric',
            'keluar_sepatu' => 'nullable|date',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function selesai($id)
    {
        $order = Order::findOrFail($id);
        $order->keluar_sepatu = now();
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order berhasil ditandai sebagai selesai.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
