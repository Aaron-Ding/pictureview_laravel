<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
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
        $resultpath = array();
        $resultrul = array();
        for($i = 0; $i<count($nihao);$i++ ){
            $singleurl = $nihao[$i];
            $url = Storage::disk('s3')->url(
                $singleurl);

            array_push($resultrul,$url);
            array_push($resultpath,$singleurl);
        }
        //var_dump($resultrul);
        //["querystring"=>$request->session()->get('querystring'),"personcount"=>$personcount,"adultcount"=>$adultcount
        return view('/admin/image')->with(["picture" => $resultrul,"pathurl"=> $resultpath]);
    }

    public function showalll(){
        $nihao = Storage::disk('s3')->allFiles('/s3_API_test');
        $stack = array();
        for($i=0; $i<count($nihao); $i++) {
            $singleurl = $nihao[$i];
            $url = Storage::disk('s3')->url(
                $singleurl);
            $urlarray = array([
                'url' => $url,
                'id' =>  $i,
            ]);
            $stack = array_merge_recursive($urlarray, $stack);
            //array_push($url,$i);
            //array_push($stack, $urlarray);

        }
        $result = array();
        for($i =0; $i<4;$i++){
            //var_dump($stack[$i]);
            $result = array_merge_recursive($stack[$i], $result);
        }
        //print_r($result);
        //$link = 'https://s3-us-west-2.amazonaws.com/xingzheng/s3_API_test/daisy%402x_1533073058.jpg';
        //$img = file_get_contents('https://s3-us-west-2.amazonaws.com/xingzheng/s3_API_test/daisy%402x_1533073058.jpg');
        // header('Content-type: image/jpg');
        print_r($result);
        //return view('/admin/image')->with('picture',$result['url']);
    }

    public function destroy(){
        var_dump('111');
        //Storage::disk('s3')->delete('/s3_API_test/file_name.jpg');
    }








}