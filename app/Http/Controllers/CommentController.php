<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Picture;
class CommentController extends Controller
{
    public function show($id)
    {
        return view('showpicture/show')->withpicture(\App\Picture::with('hasManyComments')->find($id));
        return view('showpicture/show')->withpicture(\App\Picture::with('hasManyComments')->find($id));
    }

    public function store(request $request){
        $comment = new Comment;
        $comment->article_id = $request->get('article_id');
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->website = $request->get('website');
        $comment->content = $request->get('content');
        $comment->save();
        return redirect('home');

    }
}


