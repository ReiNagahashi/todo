<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Services',
            'services' => ['Programming','Data analytics','SEO']
        ];

        // return view('pages.index',['data=>$data']);
        // return view('pages.index',compact($data));
        return view('pages.index')->with($data);
    }
}
