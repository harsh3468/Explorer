@extends('layouts.app')

@section('content')

@if(auth()->user()->isAdmin())
<div class="card-deck">

    <div class="card text-center" style="max-width: 10rem;">
        <div class="card-header text-white bg-primary mb-3">POSTS</div>
        <div class="card-body">
          <h3 class="card-title">{{$posts->count()}}</h3>
        </div>
      
</div>
               

    <div class="card text-center" style="max-width: 10rem;">
        <div class="card-header text-white bg-primary mb-3">CATEGORIES</div>
        <div class="card-body">
          <h3 class="card-title">{{$categories->count()}}</h3>
        </div>
   
</div>
               

    <div class="card text-center" style="max-width: 10rem;">
        <div class="card-header text-white bg-primary mb-3">USERS</div>
        <div class="card-body">
          <h3 class="card-title">{{$users->count()}}</h3>
        </div>
      </div>

               

    <div class="card text-center" style="max-width:  10rem;">
        <div class="card-header text-white bg-primary mb-3">TAGS</div>
        <div class="card-body">
          <h3 class="card-title">{{$tags->count()}}</h3>
        </div>
      </div>

</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
