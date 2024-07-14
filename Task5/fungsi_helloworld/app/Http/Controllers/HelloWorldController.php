<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function index()
    {
        return view('helloworld');
    }

    public function show(Request $request)
    {
        $n = $request->input('number');
        $result = [];

        for ($i = 1; $i <= $n; $i++) {
            if ($i % 4 == 0 && $i % 5 == 0) {
                $result[] = 'helloworld';
            } elseif ($i % 4 == 0) {
                $result[] = 'hello';
            } elseif ($i % 5 == 0) {
                $result[] = 'world';
            } else {
                $result[] = $i;
            }
        }

        return view('helloworld', compact('result', 'n'));
    }
}