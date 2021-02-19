<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';
   
    protected $fillable = [
          'id_barang', 'nama_barang', 'jenis_barang', 'harga', 'stok'
    ];
}
