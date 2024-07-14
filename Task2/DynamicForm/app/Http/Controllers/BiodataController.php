<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
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
        $request->validate([
           'inputs.*.name'=>'required',
           'inputs.*.no_hp'=>'required',
           'inputs.*.alamat'=>'required'
           
        ],
        [
            'inputs.*.name' =>  'The name field is required!',
            'inputs.*.no_hp' =>  'The no_hp field is required!',
            'inputs.*.alamat' =>  'The alamat field is required!'
        ]
    );
        foreach ($request->inputs as $key => $value) {
            Biodata::create($value);
        }
    
        return back()->with('success', 'The post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Biodata $biodata)
    {
            $biodatas = Biodata::all();
            return view('biodatas', compact('biodatas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Biodata $biodata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();

        return redirect('/biodatas')->with('success', 'Biodata deleted successfully');
    }
}