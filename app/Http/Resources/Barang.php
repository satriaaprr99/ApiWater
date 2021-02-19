<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Barang extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_barang' => $this->id_barang,
            'nama_barang' => $this->nama_barang,
            'jenis_barang' => $this->jenis_barang,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
