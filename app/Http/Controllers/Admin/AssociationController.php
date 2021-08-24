<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.association.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.association.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required","string","max:255"],
            "position" => ["required","string","in:RT,RW"],
            "association_number" => ["required","string"],
            "address" => ["required","string","max:255"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->all());

        $association = new Association();
        $association->name = $request->name;
        $association->position = $request->position;
        $association->association_number = $request->association_number;
        $association->address = $request->address;
        $association->save();

        return redirect(route('association.index'))->with(["success" => "Success create new RT/RW"]);
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
        $association = Association::findOrFail($id);
        return view('admin.association.edit')->with(compact('association'));
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
            "name" => ["required","string","max:255"],
            "position" => ["required","string","in:RT,RW"],
            "association_number" => ["required","string"],
            "address" => ["required","string","max:255"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->all());

        $association = Association::findOrFail($id);
        $association->name = $request->name;
        $association->position = $request->position;
        $association->association_number = $request->association_number;
        $association->address = $request->address;
        $association->save();

        return redirect(route('association.index'))->with(["success" => "Success update RT/RW"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find content and delete
        $association = Association::findOrFail($id);
        $association->delete();

        // redirect back
        return redirect()->back()->with(["success" => "Success delete RT/RW"]);
    }

    public function data(Request $request)
    {
        if (!$request->ajax())
            return 'Access Denied';

        $association = Association::withoutTrashed();

        return DataTables::of($association)
            ->addColumn('action', function ($row) {
                return [
                    'destroy_link' => route("association.destroy",$row->id),
                    'edit_link' => route("association.edit",$row->id),
                    'csrf_token' => csrf_token(),
                    'id' => $row->id
                ];
            })
            ->addIndexColumn()
            ->make(true);
    }
}
