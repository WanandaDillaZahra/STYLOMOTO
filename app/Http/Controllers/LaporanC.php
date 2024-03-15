<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionsM;
use App\Models\ProductsM;
use Carbon\Carbon;
use PDF;


class LaporanC extends Controller {

    public function index(Request $request)
    {
        $title = "Laporan Transaksi";
        $transactionsM = TransactionsM::select('transactions.*', 'products.nama_produk', 'products.harga_produk')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->orderBy('transactions.created_at', 'desc')
            ->get();
    
        return view('laporan', compact('title', 'transactionsM'));
    }
    
    public function filter(Request $request)
    {
        $title = "Filter Transaksi";
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    
        $transactionsM = TransactionsM::select('transactions.*', 'products.nama_produk', 'products.harga_produk')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->whereBetween('transactions.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->orderBy('transactions.created_at', 'desc')
            ->get();
    
        return view('laporan', compact('title', 'transactionsM', 'startDate', 'endDate'));
    }
    
    public function export(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    
        $transactionsM = TransactionsM::select('transactions.*', 'products.nama_produk', 'products.harga_produk')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->whereBetween('transactions.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->get();
    
        $pdf = Pdf::loadView('transactions_pdf1', compact('transactionsM', 'startDate', 'endDate'));
        return $pdf->stream();
    }
    
}