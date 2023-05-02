<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDetailController extends Controller
{
    //
    public function index()
    {
        return view('client-detail.index');
    }

    public function store(Request $request)
    {
        # code...
    }

    public function filter()
    {
        # code...
    }
}
