<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','details'];


    public function posts()      //here name is posts bcoz one tag belongs to many posts
    {
        return $this->belongsToMany(Post::class);
    }
}
