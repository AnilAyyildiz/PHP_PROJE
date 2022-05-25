<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;



class SettingController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $data=Setting::first();
        if(!isEmpty($data)){
            return view("admin.setting_edit",[
                'data'=>$data
            ]);
        }


        else{
            $data= new Setting();
            $data->title="Your Project Title";
            $data->save();
            $data=Setting::first();
            return view("admin.setting_edit",[
                'data'=>$data
            ]);

        }
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
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, Setting $setting)
    {
        $data=Setting::find($id);
        $data->title=$request->title;
        $data->keywords=$request->keywords;
        $data->description=$request->description;
        $data->company=$request->company;
        $data->adress=$request->adress;
        $data->phone=$request->phone;
        $data->fax=$request->fax;
        $data->email=$request->email;
        $data->smtpserver=$request->smtpserver;
        $data->smtpsemail=$request->smtpemail;
        $data->smtpspassword=$request->smtpspassword;
        $data->smtpport=$request->smtpport;
        $data->facebook=$request->facebook;
        $data->twitter=$request->twitter;
        $data->instagram=$request->instagram;
        $data->youtube=$request->youtube;
        $data->aboutus=$request->aboutus;
        $data->contact=$request->contact;
        $data->referances=$request->referances;
        $data->status=$request->status;
        if($request->logo){
            $data->logo=Storage::putFile('settings',$request->file('logo'));
        }
        if($request->icon){
            $data->icon=Storage::putFile('settings',$request->file('icon'));
        }
        $data->save();
        return redirect()->route("admin_setting")->with("succes","Setting is saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
