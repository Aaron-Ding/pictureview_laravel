<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ManageController extends Controller
{
    public function indexx(){
        $name = Auth::user()->name;
        if($name == 'feifei') {
            return view('manage/home');
        }
        else
            echo('你没有权限');
    }

    public function index(){
        //return view('manage/managecomment')->withcomments(\App\Picture::with('hasManyComments')->get());
        $info = (\App\Picture::all());
        $comments = (\App\Comment::all());

        return view('manage/managecomment',[
            'info'=> $info,
            'comments'=> $comments,
        ]);
    }

}
