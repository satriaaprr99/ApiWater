<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Barang;

class BarangController extends Controller
{
	public function index(){

		$data = DB::table('barangs')
		->select('*',DB::RAW('barangs.id_barang as id'))
		->get();

		return response()->json([
			"status" => "200",
			"message" => "success",
			"data" => $data
		], 200);
	}

	public function create(Request $request){

		$data = Barang::create([
			'id_barang' => mt_rand('0000','9999'),
			'nama_barang' => $request->nama_barang,
			'jenis_barang' => $request->jenis_barang,
			'harga' => $request->harga,
			'stok' => $request->stok,
		]);

		return response()->json([
			"status" => "Created",
			"message" => "success"
		], 201);
	}
}
