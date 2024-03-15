<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsM extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $fillable = ["id", "id_produk", "nama_pelanggan", "nomor_unik", "uang_bayar", "uang_kembali", "created_at"];
    protected $guarded = [];

    public function transactions()
    {
        return $this->hasMany(TransactionsM::class);
    }

    public function products()
    {
        return $this->belongsTo(ProductsM::class, 'id');
    }
}
