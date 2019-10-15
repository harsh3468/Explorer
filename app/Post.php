<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;
    protected $dates=['published_at'];
    
    protected $fillable = ['title','description','content','image','published_at','category_id','user_id'];

    /**
     * Delete the image from storage.
     *
     * 
     * @return void
     */

    public function deleteImage()
    {
        Storage::delete($this->image); 
    }

    public function category() //here name is catetgory and not categories bcoz one post belongs to one category
    {
      return  $this->belongsTo(Category::class);
    }

    public function tags()    //here name is tags bcoz one post belongs to many tags
    {
      return $this->belongsToMany(Tag::class);

    }

    
    /**
     * check if post has tags.
     *
     * 
     * @return bool
     */
    public function hasTag($tagId)
    {
      return in_array($tagId,$this->tags->pluck('id')->toArray());
    }

    public function user()
    {
      return  $this->belongsTo(User::class);

    }


    public function scopePublished($query)
    {
      return $query->where('published_at','<=',now());
      // now gives us the current date and time 
    }

    public function scopeSearched($query)
    {
      $search=request()->query('search');
        if($search){
           return $query->published()->where('title','LIKE',"%{$search}%");
        }
        else{
          return $query->published();
        }

    }

}
