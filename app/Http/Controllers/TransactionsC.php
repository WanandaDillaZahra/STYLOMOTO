<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionsM;
use App\Models\ProductsM;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use PDF;

class TransactionsC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Transaksi',
        ]);
        $transactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans', 'transactions.updated_at AS tg_tran')
        ->join('products', 'products.id', '=', 'transactions.id_produk')
        ->orderBy('transactions.created_at', 'desc')
        ->get();
    
        $title = "Daftar Transaksi Produk";
        return view('transactions_index', compact('title', 'transactionsM'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Tambah Data Transaksi',
        ]);
        $title = "Tambah Data Transaksi Produk";
        $products = ProductsM::all();

        return view('transactions_create', compact('title', 'products'));
    }

     public function store(Request $request)
     {
         $request->validate([
             'nomor_unik' => 'required',
             'nama_pelanggan' => 'required',
             'id' => 'required|exists:products,id',
             'uang_bayar' => 'required',
         ]);
     
         $product = ProductsM::find($request->input('id'));
     
         if (!$product) {
             return redirect()->route('transactions.create')->with('error', 'Produk tidak ditemukan');
         }
     
         $total_price = $product->harga_produk;
         $paid_amount = $request->input('uang_bayar');
     
         if ($paid_amount < $total_price) {
             return redirect()->route('transactions.create')->with('error', 'Mohon Maaf Uang Yang Anda Masukkan Kurang');
         }
     
         $transactions = new TransactionsM;
         $transactions->nomor_unik = $request->input('nomor_unik');
         $transactions->nama_pelanggan = $request->input('nama_pelanggan');
         $transactions->id_produk = $request->input('id');
         $transactions->uang_bayar = $paid_amount;
         $transactions->uang_kembali = $paid_amount - $total_price;
         $transactions->save();
     
         return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Ditambahkan');
     }
     
    public function edit($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Edit Data Transaksi',
        ]);
        $title = "Edit Data Transaksi Produk";
        $transactionsM = TransactionsM::find($id);

        if (!$transactionsM) {
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan');
        }

        $productsM = ProductsM::all();

        return view('transactions_edit', compact('title', 'productsM', 'transactionsM'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nomor_unik' => 'required',
            'nama_pelanggan' => 'required',
            'id_produk' => 'required',
            'uang_bayar' => 'required',
        ]);

        $transactionsM = TransactionsM::find($id);

        if (!$transactionsM) {
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan');
        }

        $productsM = ProductsM::find($request->input('id_produk'));

        if (!$productsM) {
            return redirect()->route('transactions.edit', $id)->with('error', 'Produk tidak ditemukan');
        }

        $transactionsM->nomor_unik = $request->input('nomor_unik');
        $transactionsM->nama_pelanggan = $request->input('nama_pelanggan');
        $transactionsM->id_produk = $request->input('id_produk');
        $transactionsM->uang_bayar = $request->input('uang_bayar');
        $transactionsM->uang_kembali = $request->input('uang_bayar') - $productsM->harga_produk;
        $transactionsM->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Menghapus Data Transaksi',
        ]);
        $transactionsM = TransactionsM::find($id);

        if (!$transactionsM) {
            return redirect()->route('transactions.index')->with('error', 'Transaksi tidak ditemukan');
        }

        $transactionsM->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi Berhasil Dihapus');
    }

    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mencetak PDF',
        ]);
        $transactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->get();

        $pdf = PDF::loadView('transactions_pdf', ['transactionsM' => $transactionsM]);

        return $pdf->stream('transactions.pdf');
    }

    public function pdf2($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mencetak Struk',
        ]);
        $transactionsM = TransactionsM::select('transactions.*', 'products.*', 'transactions.id AS id_trans')
            ->join('products', 'products.id', '=', 'transactions.id_produk')
            ->where('transactions.id', $id)
            ->first();

        if (!$transactionsM) {
            return response('Data transaksi tidak ditemukan', 404);
        }

        $pdf = PDF::loadView('transactions_pdf2', ['transactionsM' => $transactionsM]);

        return $pdf->stream('transactions.pdf2' . $id . '.pdf');
    }
    
}
