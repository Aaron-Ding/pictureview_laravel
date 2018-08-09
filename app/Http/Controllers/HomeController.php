<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $result = \App\Picture::all();

        return view('admin/home');
    }

    public function pic()
    {
        return view('newweb');
    }

    public function picadmin(){
        return view('admin/picture')->with('pictures', \App\Picture::all());
    }

    public function create(){
        return view('admin/picture/create');
    }

        public function store(Request $request)
    {
        if($request->hasFile('profile_image')) {

            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
            //var_dump($filenamewithextension);
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //var_dump($filename);
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $filenametostore = '/s3_API_test/'. $filename.'_'.time().'.'.$extension;
           // var_dump($filenametostore);
            Storage::disk('s3')->put($filenametostore, fopen($request->file('profile_image'), 'r+'), 'public');
            echo('1');
            //return view ('admin/image');
        }
    }


    public function showall(){
        $nihao = Storage::disk('s3')->allFiles('/s3_API_test');
        $stack = array();
        for($i=0; $i<count($nihao); $i++) {
            $singleurl = $nihao[$i];
            $url = Storage::disk('s3')->url(
                $singleurl);
            array_push($stack, $url);
        }
            //var_dump($stack);
        //$link = 'https://s3-us-west-2.amazonaws.com/xingzheng/s3_API_test/daisy%402x_1533073058.jpg';
        //$img = file_get_contents('https://s3-us-west-2.amazonaws.com/xingzheng/s3_API_test/daisy%402x_1533073058.jpg');
       // header('Content-type: image/jpg');

        return view('/admin/image')->with('picture',$stack);
    }


}
