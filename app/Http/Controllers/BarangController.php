<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Barang;

class BarangController extends Controller
{
	public function index(){

		$data = Barang::all();

		return response()->json([
			"status" => 200,
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
			"status" => 201,
			"message" => "success"
		], 201);
	}

	public function show($id){

        $check_data = Barang::firstWhere('id', $id);

        if($check_data){
            return response()->json(Barang::find($id), 200);
        } else {
            return response([
                'status' => 'ERROR',
                'message'=> 'Data Tidak Ditemukan',
            ], 404);
        }

    }

	public function update(Request $request, $id){

         $check_data =  Barang::firstWhere('id', $id);

        if($check_data){
            $data = Barang::find($id);
            $data->update($request->all());
            return response()->json([
            	"status" => 200,
				"message" => "success",
				"data" => $data
            ], 200);
        }else{
            return response([
                'status' => 404,
                'message'=> 'error',
            ], 404);
        }

    }
}
