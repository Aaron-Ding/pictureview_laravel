<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filesystems extends Model
{
    protected $table = 'filesystem';
    protected $fillable = ['url', 'link', 'filename', 'createtime'];

}
