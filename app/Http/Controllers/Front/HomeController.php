<?php

namespace App\Http\Controllers\Front;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Association;

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

    public function profilDataRtRw()
    {
        $data = Association::all();
        return view('front.profil_data_rt_rw.index')->with(compact('data'));
    }
}
