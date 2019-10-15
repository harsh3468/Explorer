@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Posts
        <span class="btn-sm float-right"><a href="{{route('posts.create')}}" class="btn btn-success">ADD POSTS</a></span>
    </div>
    <div class="card-body">
       @if($posts->count()>0)
       <table class="table">
            <thead>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th></th>
                <th></th>
                
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{asset($post->image)}}" width="100px" height="50px" alt=""></td>
                        
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="{{route('categories.edit',$post->category->id)}}">
                            {{$post->category->name}} 
                            </a>
                            <!-- here category is the function defined in the Post model which returns all the attributes of category -->
                        </td>

                        @if($post->trashed())
                        <td>
                            <form action="{{route('restore-posts',$post->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm float-right ">Restore</button>
                            </form>
                        </td>
                        @else
                        <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm float-right ">Edit</a></td>
                        
                        @endif
                        <td>
                            <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit"  class="btn btn-danger btn-sm " >
                               {{$post->trashed()?'Delete':'Trash'}} 
                            </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Posts Yet</h3>
        @endif
    </div>
</div>

@endsection