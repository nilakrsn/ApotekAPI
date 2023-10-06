<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Obat::all();
        return response()->json([
            "message" => "berhasil mendapatkan data ",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Obat::create([
            "nama_obat" => $request->nama_obat,
            "pembuat_obat" =>$request->pembuat_obat,
            "stok" => $request->stok,
            "harga"=> $request->harga,
            "tgl_kadaluarsa" => $request->tgl_kadaluarsa
        ]);

        if($data){
            return response()->json([
                "status" => true,
                "message" => "berhasil menambahkan obat",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "gagal menambahkan obat",
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Obat::find($id);
        if($data){
            return response()->json([
                "status" => true,
                "message" => "data ditemukan",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Obat::find($id);
        
        if(!$data){
            return response()->json([
                "status" =>false,
                "message" => "data obat tidak ditemukan",
            ], 404);
        }

        $update = $data->update([
            "nama_obat" => $request->nama_obat,
            "pembuat_obat" =>$request->pembuat_obat,
            "stok" => $request->stok,
            "harga"=> $request->harga,
            "tgl_kadaluarsa" => $request->tgl_kadaluarsa
        ]);

        if($update){
            return response()->json([
                "status" => true,
                "message" => "data obat berhasil diedit",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data obat gagal diedit",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Obat::find($id);

        if(empty($data)){
            return response()->json([
                "status" =>false,
                "message" => "data obat tidak ditemukan",
            ], 404);
        }

        $destroy = $data->delete();
        if($destroy){
            return response()->json([
                "status" => true,
                "message" => "data obat berhasil dihapus",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data obat gagal dihapus",
            ], 404);
        }
    }
}
