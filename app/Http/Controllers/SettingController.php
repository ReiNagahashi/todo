<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index(){
        //ここのfirstはさっき作ったfixedデータは1つしかないので、ここはallではなくてfirstを記述している
        return view('admin.settings')->with('settings',Settings::first());
    }

    public function update(){
        $this->validate(request(),[
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required'
        ]); 

        $settings = Settings::first();
        //！！！1つ目のsite_nameはコラムの名前　2つ目のsaite_nameはフォーム内にあるnameと同じ名前
        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->address = request()->address;
        $settings->save();

        Session::flash('success',' settings updated successfully');
        return redirect('/settings');
    }
}
