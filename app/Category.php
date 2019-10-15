<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['name'];

    public function posts()     //here name is posts not post bcoz one category has many posts
    {
        return $this->hasMany(Post::class);
    }

   

}
