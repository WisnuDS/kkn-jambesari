<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::orderBy('level')->get();
        return view('admin.staff.create')->with(compact('levels'));
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
            "level_id" => ["required","integer","exists:levels,id"],
            "image" => ["nullable","string","max:255"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        if (!$request->exists('image'))
            $image = env('STAFF_IMAGE_DEFAULT');
        else
            $image = $request->image;

        $staff = new Staff();
        $staff->name = $request->name;
        $staff->level_id = $request->level_id;
        $staff->image = $image;
        $staff->save();

        return redirect(route('staff.index'))->with(["success" => "Success Create New Staff"]);
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
        $staff = Staff::findOrFail($id);
        $levels = Level::orderBy('level')->get();
        return view('admin.staff.edit')->with(compact('staff','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required","string","max:255"],
            "level_id" => ["required","integer","exists:levels,id"],
            "image" => ["nullable","string","max:255"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        if (!$request->exists('image'))
            $image = env('STAFF_IMAGE_DEFAULT');
        else
            $image = $request->image;

        $staff = Staff::findOrFail($id);
        $staff->name = $request->name;
        $staff->level_id = $request->level_id;
        $staff->image = $image;
        $staff->save();

        return redirect(route('staff.index'))->with(["success" => "Success update Staff"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->back()->with(["succes" => "Success Delete data"]);
    }

    public function data(Request $request)
    {
        if (!$request->ajax()) return "Access Denied";

        $staff = Staff::with('level');

        return DataTables::of($staff)
            ->addColumn('action', function ($row) {
                return [
                    'destroy_link' => route("staff.destroy",$row->id),
                    'edit_link' => route("staff.edit",$row->id),
                    'csrf_token' => csrf_token(),
                    'id' => $row->id
                ];
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function cover(Request $request)
    {
        // Make validator
        $validator = Validator::make($request->all(),[
            "file" => ["required", "image", "max:3072"]
        ]);

        // Validation request
        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        // Create path and filename
        $path = 'staff/cover/';
        $filename = uniqid("cover_".auth()->id()."_").".".$request->file('file')->clientExtension();

        //Save to storage
        $request->file('file')->storeAs('/public/'.$path, $filename);

        // Return success message
        return response()->json($path.$filename);

    }
}
