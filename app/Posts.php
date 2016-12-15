<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = [
        'id',
            'name',
        'picture',
        'post'
        ];
    public $timestamps = false;
}
