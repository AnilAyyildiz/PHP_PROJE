<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected $appends =[
        "getParentsTree"
    ];

    public static function getParentsTree($category,$title){
        if($category->parent_id == 0){
            return $title;
        }

        $parent= Category::find($category->parent_id);
        $title=$parent->title.' > '. $title;
        return CategoryController::getParentsTree($parent,$title);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $datalist=Category::with('children')->get();
        return view("admin.category",[
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
        $parent_category=Category::with('children')->get();
        return view("admin.category_add",[
            "parent_category"=>$parent_category
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
        $data=new Category;
        $data->parent_id = $request->parent_id;
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->status=$request->status;
        $data->slug=$request->slug;
        $is_save=$data->save();
        if($is_save){
            return redirect()->route("admin_category")->with("succes","Category is created");
        }
        else
        {
            return redirect()->route("admin_category_add")->with("warning","Category is not created");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $parent_category=Category::all();
        $data=Category::find($id);
        return view("admin.category_update",[
            'data'=>$data,
            'parent_category'=>$parent_category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, Category $category)
    {
        $data=Category::find($id);
        $data->parent_id = $request->parent_id;
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->status=$request->status;
        $data->slug=$request->slug;
        if($data->save()){
            return redirect()->route("admin_category")->with("succes","Category is created");
        }
        else
        {
            return redirect()->route("admin_category_add")->with("warning","Category is not created");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect()->route("admin_category");
    }
}
