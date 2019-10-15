<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
// use Illuminate\Support\Facades\Storage;


class PostsController extends Controller

{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all())->with('user',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //upload image
        //  $image = $request->image->store('storage/posts');
        $image = $request->image;
        $image_new_name=time().$image->getClientOriginalName();
        $image->move('storage/posts',$image_new_name);
        // create post
       $post= Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            // 'image'=>$request->image,
            'image'=>'storage/posts/'.$image_new_name,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category,
            'user_id'=> auth()->user()->id,
        ]);

        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }

        session()->flash('success','Posts Created successfully');

        return redirect(route('posts.index'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')
        ->with('post',$post)
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        
        $data = $request->only(['tile','description','content','published_at']);
  
    //    check if there is a new image
        if($request->hasFile('image')){
        //    upload it
        $image = $request->image->store('posts');
         //    delete the old one
         
         $post->deleteImage();//User defined Function(we defined it in the Post Model by ourself) 

         $data['image']=$image;

        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        $post->update($data);

        session()->flash('success','Post Updated successfully');

        return redirect(route('posts.index'));

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            $post->forceDelete();//system defined
            $post->deleteImage();//User defined Function(we defined it in the Post Model by ourself)        
        session()->flash('success','Post Deleted Successfully');
        }
        else{
            $post->delete();
            
        session()->flash('success','Post Trashed Successfully');
        }




        return redirect(route('posts.index'));
    }
     /**
     * Delete the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed= Post::onlyTrashed()->get();

        
        return view('posts.index')->with('posts',$trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();

        session()->flash('success','Post Restored Successfully');

        return redirect()->back();
    }
}
