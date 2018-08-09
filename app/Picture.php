<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Picture extends Model
{

    protected $table = 'pictures'; //select # from pictures

    public function hasManyComments(){
        return $this->hasMany('App\Comment','article_id','id');
    }
}
