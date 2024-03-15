<?php

namespace App\Http\Controllers;

use App\Models\ProductsM;
use App\Models\TransactionsM;
use App\Models\User;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;

class DashboardC extends Controller
{
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Dashboard'
        ]);
        
        // Mengambil jumlah total produk
        $totalProducts = ProductsM::count();

        // Mengambil jumlah total transaksi
        $totalTransactions = TransactionsM::count();

        // Mengambil semua transaksi dan data produk terkait
        $transactionsM = TransactionsM::with('products')->get();
        // Menghitung total harga transaksi
            $totalHargaTransaksi = 0;

            foreach ($transactionsM as $data) {
                $totalHargaTransaksi += $data->harga_produk;
            }

            $income = TransactionsM::join('Products', 'Transactions.id_produk', '=', 'Products.id')
            ->sum('Products.harga_produk');

        // Menghitung jumlah total anggota
        $totalMembers = User::count();

        $title = 'Dashboard';
        return view('dashboard', compact('title', 'totalProducts','income', 'totalTransactions', 'totalHargaTransaksi', 'totalMembers'));
    }

}

