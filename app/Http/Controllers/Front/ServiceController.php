<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Models\Citizen;
use App\Models\Document;
use Illuminate\Http\Request;
use PharIo\Manifest\Requirement;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Document::all();
        return view('front.services.index')->with(compact('services'));
    }

    public function apply($documentid)
    {
        $requirements =  Document::find($documentid)->requirements();
        return view('front.services.apply')->with(compact('requirements'));
    }

    public function submit(Request $r, $documentId)
    {
        $validationRules = [];

        $requirements = Document::find($documentId)->requirements();
        // adding validation rule for every requirements
        foreach ($requirements as $requirement) {
            $validationRules[$requirement->name] = ["required", "file"];
        }

        // make validator
        $validator = Validator::make($r->all(), $validationRules);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $citizen = new Citizen();
        $citizen->name = $r->name;
        $citizen->nik = $r->nik;
        $citizen->address = $r->address;
        $citizen->document_id = $r->document_id;
        $citizen->save();

        $date = Carbon::now()->toDateString();
        $path = '/documents/' . $date . '/' . $citizen->id . '/' . $documentId . '/';
        foreach ($requirements as $requirement) {
            $filename = uniqid("document_file_" . auth()->id() . "_") . $r->file($requirement->name)->clientExtension();
            $r->file($requirement->name)->storeAs('public/' . $path, $filename);
            $file = new File();
            $file->url = $path;
            $file->requirement_id = $requirement->id;
            $file->citizen_id = $citizen->id;
            $file->save();
        }

        return redirect(route('front.services.index'))->with(["success" => "Success submitting documents"]);
    }
}
