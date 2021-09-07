<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Requirement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.document.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "document_name" => ["required", "string", "max:191"],
            "requirements.*" => ["required", "string", "max:191"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $document = new Document();
        $document->name = $request->document_name;
        $document->save();

        $requirements = [];
        foreach ($request->requirement as $requirement){
            array_push($requirements, [
                "document_id" => $document->id,
                "name" => $requirement
            ]);
        }

        Requirement::insert($requirements);

        return redirect(route('document.index'))->with(["success" => "Success Add Document"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::with('requirements')->where('id', $id)->first();
        return view('admin.document.edit')->with(compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "document_name" => ["required", "string", "max:191"],
            "requirements.*" => ["required", "string", "max:191"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $document = Document::with('requirements')->where('id', $id)->first();
        $document->name = $request->document_name;
        $document->save();

        foreach ($document->requirements as $requirement){
            $requirement->delete();
        }

        $requirements = [];
        foreach ($request->requirement as $requirement){
            array_push($requirements, [
                "document_id" => $document->id,
                "name" => $requirement
            ]);
        }

        Requirement::insert($requirements);

        return redirect(route('document.index'))->with(["success" => "Success Add Document"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Document::destroy($id);
        return redirect()->back()->with(["success" => "success delete document"]);
    }

    public function data(Request $request)
    {
        if (!$request->ajax()) return 'ACCESS DENIED';

        $docs = Document::all();

        return DataTables::of($docs)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return [
                    'destroy_link' => route("document.destroy",$row->id),
                    'edit_link' => route("document.edit",$row->id),
                    'csrf_token' => csrf_token(),
                    'id' => $row->id
                ];
            })
            ->make(true);
    }
}
