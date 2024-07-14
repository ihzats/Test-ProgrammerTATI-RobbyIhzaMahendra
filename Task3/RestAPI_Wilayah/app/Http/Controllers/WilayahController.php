<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Wilayah::all();
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
        $wilayah = Wilayah::create($request->all());
        return response()->json($wilayah, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Wilayah::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->update($request->all());
        return response()->json($wilayah,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah::delete();

        return response()->json([
            'message' => 'Wilayah berhasil dihapus'
        ], 200);
    }
}