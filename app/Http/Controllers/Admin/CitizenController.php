<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.citizen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Citizen::with(['files', 'document', 'files.requirement' => function($q){
            return $q->withTrashed();
        }])->where('id', $id)->first();

        return view('admin.citizen.show')->with(compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "status" => ["required", "integer", "max:2"]
        ]);

        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $citizen = Citizen::findOrFail($id);
        $citizen->status = $request->status;
        $citizen->save();

        return redirect(route('citizen.show', $citizen->id))->with(["success" => "Dokumen telah diselesaikan"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Citizen::destroy($id);
        return redirect(route('citizen.index'))->with(["success" => "Success Delete data"]);
    }

    public function data(Request $request)
    {
        if (!$request->ajax()) return 'ACCESS DENIED';

        $citizen = Citizen::with('document')->orderBy('created_at', 'DESC');

        return DataTables::of($citizen)
            ->addIndexColumn()
            ->addColumn('_status', function ($row){
                if ($row->status == Citizen::$PENDING){
                    return '<span class="badge badge-warning">Menunggu Diproses</span>';
                } elseif ($row->status == Citizen::$PROGRESS){
                    return '<span class="badge badge-primary">Sedang Diproses</span>';
                } else {
                    return '<span class="badge badge-success">Selesai Diproses</span>';
                }
            })
            ->addColumn('action', function ($row) {
                return [
                    'destroy_link' => route("citizen.destroy",$row->id),
                    'edit_link' => route("citizen.edit",$row->id),
                    'show_link' => route("citizen.show",$row->id),
                    'csrf_token' => csrf_token(),
                    'id' => $row->id
                ];
            })
            ->rawColumns(['_status'])
            ->make(true);
    }
}
