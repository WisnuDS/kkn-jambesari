<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.level.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.level.create');
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
            "level" => ["required","integer"],
            "title" => ["required","string","max:255"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors([$validator->errors()->first()]);

        $level = new Level();
        $level->level = $request->level;
        $level->title = $request->title;
        $level->created_by = auth()->id();
        $level->save();

        return redirect(route('level.index'))->with(["success" => "Success create position"]);
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
        $level = Level::findOrFail($id);
        return view('admin.level.edit')->with(compact('level'));
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
            "level" => ["required","integer"],
            "title" => ["required","string","max:255"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors([$validator->errors()->first()]);

        $level = Level::findOrFail($id);
        $level->level = $request->level;
        $level->title = $request->title;
        $level->save();

        return redirect(route('level.index'))->with(["success" => "Success update position"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        return redirect()->back()->with(["success" => "Success delete data"]);
    }

    public function data(Request $request)
    {
        if (!$request->ajax()) return 'ACCESS DENIED';

        $level = Level::with('user');

        return DataTables::of($level)
            ->addColumn('action', function ($row) {
                return [
                    'destroy_link' => route("level.destroy",$row->id),
                    'edit_link' => route("level.edit",$row->id),
                    'csrf_token' => csrf_token(),
                    'id' => $row->id
                ];
            })
            ->addIndexColumn()
            ->make(true);
    }
}
