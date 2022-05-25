<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{



   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
    }
    public function user_content_image($id){
        $data=DB::table("images")->get()->where("product_id",$id);
        return view("home.user_content_galery",[
            'data'=>$data,
            'product_id'=>$id
        ]);
    }
    public function user_content_image_store(Request $request)
    {
        $data= new Image;
        $data->product_id=$request->product_id;
        $data->title=$request->title;
        $data->image=Storage::putFile("images",$request->file("image"));
        $data->save();
        return redirect()->route("user_content_image",['id'=>$request->product_id]);
    }



    public function user_content_image_destroy(Image $image,$id)
    {
        Image::destroy($id);
        return redirect()->back();
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_list=Category::with('children')->get();
        return view("home.user_content_add",[
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
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }
        if($request->file){
            $data->file=Storage::putFile("files",$request->file("file"));
        }
        $data->save();
        return redirect()->route("user_content")->with("success","Content is Added");
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Content $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $product, $id)
    {
        $category_list=Category::with('children')->get();
        $data=Content::find($id);
        return view("home.user_content_update",[
            'data'=>$data,
            'category_list'=>$category_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $product, $id)
    {
        $data=Content::find($id);
        $data->category_id = $request->category_id;
        $data->user_id = Auth::id();
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->detail=$request->detail;
        $data->slug=$request->slug;
        if($request->image){
            $data->image=Storage::putFile("images",$request->file("image"));
        }

        if($request->file){
            $data->file=Storage::putFile("files",$request->file("file"));
        }
        $data->save();
        return redirect()->route("user_content")->with("success","Content is Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $product, $id)
    {
        Content::destroy($id);
        return redirect()->route("user_content");
    }

}
