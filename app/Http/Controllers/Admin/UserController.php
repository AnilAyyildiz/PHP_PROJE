<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=User::all();
        return view("admin.user",[
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        $data=User::find($id);
        return view("admin.user_show",[
            'data'=>$data
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $data=User::find($id);
        return view("admin.user_update",[
            'data'=>$data
        ]);
    }
    public function role_edit($user_id){
        $data=User::find($user_id);
        $datalist=Role::all()->sortBy("name");
        return view("admin.user_role_edit",[
            'data'=>$data,
            'datalist'=>$datalist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, User $user)
    {

        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->adress=$request->adress;
        if($request->profile_photo_path){
            $data->profile_photo_path=Storage::putFile("profile_photos",$request->file("profile_photo_path"));
        }

        $data->save();
        return redirect()->back()->with("success","User Information Updated");
    }


    public function role_add(Request $request,$user_id){
        $user=User::find($user_id);
        $role_id=$request->role_id;
        $user->roles()->attach($role_id);
        return back()->with("success","Role Added");

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        User::destroy($id);
        return redirect()->route("admin_user")->with("success","User Has been Deleted");

    }
    public function role_delete($user_id,$role_id){
        $user=User::find($user_id);
        $user->roles()->detach($role_id);
        return back()->with("success","Role Deleted");
    }
}
