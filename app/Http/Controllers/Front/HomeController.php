<?php

namespace App\Http\Controllers\Front;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function perangkatDesa()
    {
        $data = Level::with('staff')->get();
        return view('front.perangkat_desa.index')->with(compact('data'));
    }
}
