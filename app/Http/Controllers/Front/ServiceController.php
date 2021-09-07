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
        $document =  Document::with('requirements')->where('id', $documentid)->first();
        $requirements = $document->requirements;
        return view('front.services.apply')->with(compact('requirements', 'document'));
    }

    public function submit(Request $r, $documentId)
    {
        $document = Document::with('requirements')->where('id', $documentId)->first();
        // adding validation rule for every requirements
        foreach ($document->requirements as $requirement) {
            if (!$r->hasFile("form_".$requirement->id))
                return redirect()->back()->withErrors("File $requirement->name belum diupload");
        }
        // make validator
        $validator = Validator::make($r->all(), [
            "name" => ["required", "string", "max:255"],
            "address" => ["required"],
            "nik" => ["required"],
            "whatsapp_number" => ["required"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $citizen = new Citizen();
        $citizen->name = $r->name;
        $citizen->nik = $r->nik;
        $citizen->whatsapp_number = $r->whatsapp_number;
        $citizen->address = $r->address;
        $citizen->document_id = $document->id;
        $citizen->status = 0;
        $citizen->save();

        $date = Carbon::now()->toDateString();
        $path = '/documents/' . $date . '/' . $citizen->id . '/' . $documentId . '/';
        foreach ($document->requirements as $requirement) {
            $filename = uniqid("document_file_" . auth()->id() . "_") . $r->file("form_".$requirement->id)->clientExtension();
            $r->file("form_".$requirement->id)->storeAs('public/' . $path, $filename);
            $file = new File();
            $file->url = $path.$filename;
            $file->requirement_id = $requirement->id;
            $file->citizen_id = $citizen->id;
            $file->save();
        }

        return redirect(route('front.services.index'))->with(["success" => "Dokumen sukses diunggah, petugas kami akan mengubungi anda melalui nomor WA"]);
    }
}
