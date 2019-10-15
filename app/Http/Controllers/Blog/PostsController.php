<?php

namespace App\Http\Controllers\Blog;
use  App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')
        ->with('post',$post)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }
    public function category(Category $category)
    {
        return view('blog.category')
        ->with('category',$category)
        ->with('posts',$category->posts()->searched()->simplePaginate(4))
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }
    public function tag(Tag $tag)
    {
        return view('blog.tag')
        ->with('tag',$tag)
        ->with('posts',$tag->posts()->searched()->simplePaginate(4))
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }
    public function details(Tag $tag)
    {
        return view('blog.details')
        ->with('tag',$tag)
        //->with('posts',$tag->posts()->searched()->simplePaginate(4))
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }


     //paginate method paginate the no of items we want for pagination
        // searched is a method defined by user in the Post model 
        // a query builder is generated and execute the query

}
