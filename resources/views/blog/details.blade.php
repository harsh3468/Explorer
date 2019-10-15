@extends('layouts.blog')

@section('title')
    Tag-->{{$tag->name}}
@endsection
@section('header')
   <!-- Header -->
   <header class="header text-center text-white mt-5" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <h1><strong>{{$tag->name}}</strong></h1>
            <!-- <p class="lead-2 opacity-90 mt-6">{{$tag->details}}</p> -->
          </div>
        </div>
      </div>
    </header><!-- /.header -->
@endsection
@section('content')
 <!-- Main Content -->
 <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-xl-9">
              <div class="row gap-y">
                <div class="col-md-10">
                {!!$tag->details!!}
                 </div>
               
               
              </div>

    
            </div>

         @include('partials.sidebar')

          </div>
        </div>
      </div>
    </main>
@endsection

