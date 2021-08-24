<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.content.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin.content.create')->with(compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // make validator
        $validator = Validator::make($request->all(), [
            "cover" => ["required","string","max:255"],
            "title" => ["required","string","max:255"],
            "body" => ["required", "string"],
            "category_id" => ["required","exists:categories,id"]
        ]);

        //validation
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $content = new Content();
        $content->title = $request->title;
        $content->body = $request->body;
        $content->cover = $request->cover;
        $content->category_id = $request->category_id;
        $content->created_by = auth()->id();
        $content->save();

        return redirect(url('/admin/content/'.$request->category_id))->with(["success" => "Success create new content"]);
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
        $content = Content::findOrFail($id);
        return view('admin.content.edit')->with(compact('content'));
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
        // make validator
        $validator = Validator::make($request->all(), [
            "cover" => ["required","string","max:255"],
            "title" => ["required","string","max:255"],
            "body" => ["required", "string"],
            "category_id" => ["required", "exists:categories,id"]
        ]);

        //validation
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors()->first());

        $content = Content::findOrFail($id);
        $content->title = $request->title;
        $content->body = $request->body;
        $content->cover = $request->cover;
        $content->save();

        return redirect(url('/admin/content/'.$content->category_id))->with(["success" => "Success update content"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //find content and delete
        $content = Content::findOrFail($id);
        $content->delete();

        // redirect back
        return redirect()->back()->with(["success" => "Success delete content"]);
    }

    public function data(Request $request, $id)
    {
        if (!$request->ajax())
            return 'Access Denied';

        $content = Content::with('user')->where('category_id',$id);

        return DataTables::of($content)
            ->addColumn('action', function ($row) {
                return [
                    'destroy_link' => route("content.destroy",$row->id),
                    'edit_link' => route("content.edit",$row->id),
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
        $path = 'content/cover/';
        $filename = uniqid("cover_".auth()->id()."_").".".$request->file('file')->clientExtension();

        //Save to storage
        $request->file('file')->storeAs('/public/'.$path, $filename);

        // Return success message
        return response()->json($path.$filename);

    }
}
