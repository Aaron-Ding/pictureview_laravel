<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Picture;

class PictureController extends Controller
{
    public function index(){
        return view('admin/picture')->with('pictures', \App\Picture::all());
    }

    public function create(){
        return view('admin/picture/create');
    }

    public function  edit($id){
        return view('admin/picture/edit')->with('picture',\App\Picture::find($id));
    }
    public function store(Request $request){
        $rules = array(
            'name'=>'required'|'name',
            'comment'=>'required',
            'time'=>'required',
        );
        $validate = $request->validate([
            'name'=>'required',
            'comment'=>'required',
            'time'=>'required',
        ]);

        $picture  = new Picture;
        $picture->name = $request->get('name');
        $picture->comment = $request->get('comment');
        $picture->time = $request->get('time');
        $picture->save();
        return redirect('admin/picture');
    }

    public function update(Request $request,$id){
        $validate = $request->validate([
            'name'=>'required|unique:pictures,name,'.$id.'|max:255',
            'comment'=>'required',
            'time'=>'required',
        ]);
        $picture = Picture::find($id);
        $picture->name = $request->get('name');
        $picture->comment = $request->get('comment');
        $picture->time = $request->get('time');
        $picture->save();
        return redirect('admin/picture');
    }

    public function destroy($id){
        \App\Picture::find($id)->delete();
        return redirect()->back()->withInput()->withError('successful');
    }
}
