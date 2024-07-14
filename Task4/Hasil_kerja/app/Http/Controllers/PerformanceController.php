<?php

namespace App\Http\Controllers;

use App\Models\Performance;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('performance');
    }

    public function evaluate(Request $request)
    {
        $hasil_kerja = $request->input('hasil_kerja');
        $perilaku = $request->input('perilaku');
        $predikat = '';

        if ($hasil_kerja == 'diatas ekspektasi' && $perilaku == 'diatas ekspektasi') {
            $predikat = 'Sangat Baik';
        } elseif ($hasil_kerja == 'diatas ekspektasi' && $perilaku == 'sesuai ekspektasi') {
            $predikat = 'Baik';
        } elseif ($hasil_kerja == 'diatas ekspektasi' && $perilaku == 'dibawah ekspektasi') {
            $predikat = 'Kurang/misconduct';
        } elseif ($hasil_kerja == 'sesuai ekspektasi' && $perilaku == 'diatas ekspektasi') {
            $predikat = 'Baik';
        } elseif ($hasil_kerja == 'sesuai ekspektasi' && $perilaku == 'sesuai ekspektasi') {
            $predikat = 'Baik';
        } elseif ($hasil_kerja == 'sesuai ekspektasi' && $perilaku == 'dibawah ekspektasi') {
            $predikat = 'Kurang/misconduct';
        } elseif ($hasil_kerja == 'dibawah ekspektasi' && $perilaku == 'diatas ekspektasi') {
            $predikat = 'Butuh perbaikan';
        } elseif ($hasil_kerja == 'dibawah ekspektasi' && $perilaku == 'sesuai ekspektasi') {
            $predikat = 'Butuh perbaikan';
        } elseif ($hasil_kerja == 'dibawah ekspektasi' && $perilaku == 'dibawah ekspektasi') {
            $predikat = 'Sangat Kurang';
        }

        return view('performance', compact('predikat'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Performance $performance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performance $performance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performance $performance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performance $performance)
    {
        //
    }
}