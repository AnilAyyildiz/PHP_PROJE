<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=Content::all();
        return view("admin.content",[
            'datalist'=>$datalist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_list=Category::with('children')->get();
        return view("admin.content_add",[
            "category_list"=>$category_list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Content;
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->status=$request->status;
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }
        if($request->file){
            $data->file=Storage::putFile("file",$request->file("file"));
        }
        $data->save();
        return redirect()->route("admin_content");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content, $id)
    {
        $category_list=Category::with('children')->get();
        $data=Content::find($id);
        return view("admin.content_update",[
            'data'=>$data,
            'category_list'=>$category_list
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id, Content $content)
    {
        $data=Content::find($id);
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->status=$request->status;
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }
        if($request->file){
            $data->file=Storage::putFile("files",$request->file("file"));
        }
        $data->save();
        return redirect()->route("admin_content")->with("succes","Content is created");
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content, $id)
    {
        Content::destroy($id);
        return redirect()->route("admin_content");
    }
}
