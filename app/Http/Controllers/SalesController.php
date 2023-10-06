<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sales::all();
        return response()->json([
            "message" => "berhasil mendapatkan data sales",
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
        $data = Sales::create([
            "nama_sales" => $request->nama_sales,
            "no_telp_sales" =>$request->no_telp_sales,
            "alamat_sales" => $request->alamat_sales
        ]);

        if($data){
            return response()->json([
                "status" => true,
                "message" => "berhasil menambahkan sales",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "gagal menambahkan sales",
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Sales::find($id);
        if($data){
            return response()->json([
                "status" => true,
                "message" => "data sales ditemukan",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data sales tidak ditemukan",
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
        $data = Sales::find($id);

        if(!$data){
            return response()->json([
                "status" =>false,
                "message" => "data sales tidak ditemukan",
            ], 404);
        }

        $update = $data->update([
            "nama_sales" => $request->nama_sales,
            "no_telp_sales" =>$request->no_telp_sales,
            "alamat_sales" => $request->alamat_sales
        ]);

        if($update){
            return response()->json([
                "status" => true,
                "message" => "data sales berhasil diedit",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data sales gagal diedit",
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sales::find($id);

        if(empty($data)){
            return response()->json([
                "status" =>false,
                "message" => "data sales tidak ditemukan",
            ], 404);
        }

        $destroy = $data->delete();
        if($destroy){
            return response()->json([
                "status" => true,
                "message" => "data sales berhasil dihapus",
                "data" => $data
            ], 200);
        }else{
            return response()->json([
                "status" =>false,
                "message" => "data sales gagal dihapus",
            ], 404);
        }
    }
}
