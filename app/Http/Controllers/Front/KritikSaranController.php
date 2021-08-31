<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KritikSaran;
use Illuminate\Support\Facades\Validator;

class KritikSaranController extends Controller
{
    public function create()
    {
        return view('front.kritik_saran.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "string", "max:255"],
            "nik" => ["required", "integer"],
            "address" => ["required"],
            "content" => ["required"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $kritik_saran = new KritikSaran();
        $kritik_saran->name = $request->name;
        $kritik_saran->nik = $request->nik;
        $kritik_saran->address = $request->address;
        $kritik_saran->content = $request->content;

        $kritik_saran->save();

        return redirect(route('front.kritik-saran.create'))->with(['success' => 'Kritik dan Saran berhasil dikirimkan.']);
    }
}
