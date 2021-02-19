<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
   	protected $table = 'penjualan';
   
    protected $fillable = [
          'id_penjualan', 'id_barang', 'jumlah', 'harga_total', 'tanggal'
    ];
}
