<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $orders = Order::all();
        $pdf = Pdf::loadView('pdf.orders', compact('orders'));
        return $pdf->download('orders.pdf');
    }
}
