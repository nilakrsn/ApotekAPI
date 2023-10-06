<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pelanggan::all();
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Pelanggan::create([
            "nama_plg" => $request->nama_plg,
            "no_telp_plg" =>$request->no_telp_plg,
            "alamat_plg" => $request->alamat_plg
        ]);

        if($data){
            return response()->json([
                "status" => true,
                "message" => "berhasil menambahkan plg",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "gagal menambahkan plg",
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pelanggan::find($id);
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pelanggan::find($id);

        if(!$data){
            return response()->json([
                "status" =>false,
                "message" => "data plg tidak ditemukan",
            ], 404);
        }

        $update = $data->update([
            "nama_plg" => $request->nama_plg,
            "no_telp_plg" =>$request->no_telp_plg,
            "alamat_plg" => $request->alamat_plg
        ]);

        if($update){
            return response()->json([
                "status" => true,
                "message" => "data plg berhasil diedit",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data plg gagal diedit",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pelanggan::find($id);

        if(empty($data)){
            return response()->json([
                "status" =>false,
                "message" => "data plg tidak ditemukan",
            ], 404);
        }

        $destroy = $data->delete();
        if($destroy){
            return response()->json([
                "status" => true,
                "message" => "data plg berhasil dihapus",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data plg gagal dihapus",
            ], 404);
        }
    }
}
