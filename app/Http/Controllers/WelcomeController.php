<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')
        ->with('categories',Category::all())
        ->with('tags',Tag::all())
        ->with('posts',Post::searched()->simplePaginate(4));
        //paginate method paginate the no of items we want for pagination
        // searched is a method defined by user in the Post model 
        // a query builder is generated and execute the query
    }

}
