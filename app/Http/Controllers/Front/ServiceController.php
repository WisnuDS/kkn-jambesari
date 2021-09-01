<?php

namespace App\Http\Controllers\Front;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Document::all();
        return view('front.services.index')->with(compact('services'));
    }
}
