<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;


// Route untuk mengunduh PDF daftar order
Route::get('pdf/orders', [PDFController::class, 'generatePDF'])->name('orders.pdf');

// Halaman landing yang bisa diakses publik
Route::get('/', function () {
    return view('landing');
});

// Route login admin dan register
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('login', [AdminController::class, 'handleLogin'])->name('admin.handleLogin');

Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('register', [AdminController::class, 'handleRegister'])->name('admin.handleRegister');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

// Kelompok route yang dilindungi oleh middleware auth:admin
Route::middleware(['auth:admin'])->group(function () {
    // Daftar order
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    

    // Tambah order
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('orders', [OrderController::class, 'store'])->name('orders.store');

    // Edit order
    Route::get('orders/{order_number}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::patch('orders/{order_number}', [OrderController::class, 'update'])->name('orders.update');

    // Tandai order sebagai selesai
    Route::patch('orders/{id}/selesai', [OrderController::class, 'selesai'])->name('orders.selesai');

    //invoice
    Route::get('orders/{id}/print', [OrderController::class, 'print'])->name('orders.print');
  


    Route::get('orders/excel', function () {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    })->name('orders.excel');
    

    // Hapus order
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');



    // Dashboard laporan
    Route::get('dashboard/daily', function () {
        return view('reports.daily');
    })->name('dashboard.daily');

    Route::get('dashboard/weekly', function () {
        return view('reports.weekly');
    })->name('dashboard.weekly');

    Route::get('dashboard/monthly', function () {
        return view('reports.monthly');
    })->name('dashboard.monthly');
});
