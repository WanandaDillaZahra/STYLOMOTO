<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsM;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;
use PDF;

class ProductsC extends Controller
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
            'activity' => 'User Melihat Halaman Produk'
        ]);
        $products = ProductsM::all(); // Misalnya, semua data produk
        $title = "Data Layanan Servis";
        return view('products_index', compact('products', 'title'));
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
            'activity' => 'User Melakukan Tambah Data Produk'
        ]);
        $title = "Tambah Data";
        return view('products_create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
         
            'harga_produk' => 'required',
        ]);

        ProductsM::create($request->post());
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melakukan Edit Data Produk'
        ]);
        $title = "Edit Data";
        $products = ProductsM::find($id);
        return view('products_edit', compact('products', 'title'));
    }

    public function update(Request $request, $id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Berhasil Perbarui Data Produk'
        ]);
        $request->validate([
            'nama_produk' => 'required',
            
            'harga_produk' => 'required',
        ]);
        $data = request()->except(['_token', '_method', 'submit']);

        ProductsM::where('id', $id)->update($data);
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Diedit');
    }

    public function destroy($id)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Menghapus Data'
        ]);
        ProductsM::where('id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Produk Berhasil Dihapus');
    }

    public function pdf()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Mencetak PDF'
        ]);
        $products = ProductsM::all(); // Gunakan nama variabel yang benar
        $pdf = PDF::loadview('products_pdf', compact('products'));
        return $pdf->stream('products.pdf');
    }
}
