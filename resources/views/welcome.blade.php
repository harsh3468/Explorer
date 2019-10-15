@extends('layouts.blog')

@section('title')
The Explorer
@endsection
@section('header')
   <!-- Header -->
    <header class="header text-center text-white mt-5" style=" background-image: url('{{asset('img/coding.jpg')}}')"  data-overlay="4">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
          <h1 style="font-size:5vw;">
          <img class="logo" src="{{asset('img/logo_navbar.png')}}" alt="logo" style="width:6vw;">
           The Explorers<br></h1><h1 style="font-size:3vw;">Begin Exploring...</h1>
            
            <p class="lead-2 opacity-90 mt-6 my-5"></p>
          </div>
        </div>
      </div>
    </header> 

    
    
    <!-- /.header -->
@endsection
@section('content')
 <!-- Main Content -->
 <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9" id="post">
              <div class="row gap-y">
                @forelse($posts as $post)
                <div class="col-md-6">
                  <div class="card border hover-shadow-6 mb-6 d-block">
                    <a href="{{route('blog.show',$post->id)}}"><img class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap" style="height:200px;"></a>
                    <div class="p-6 text-center">
                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">{{$post->category->name}}</a></p>
                      <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show',$post->id)}}">{{$post->title}}</a></h5>
                    </div>
                  </div>
                  </div>
               
                @empty
                <p class="text-center">
               <h3> NO RESULTS FOUND FOR QUERY <strong>{{request()->query('search')}}</strong></h3>
                </p>
                @endforelse
              
              </div>

              <!--  -->
              {{$posts->appends(['search'=>request()->query('search')])->links()}}
              <!-- links() help us in pagination -->
            </div>

            

           @include('partials.sidebar')

          </div>

        </div>
      </div>
    </main>
    <!-- testimonial -->
    <h5 class="section-title h1 mt-5" style="text-align:center;">REVIEWS</h5>
    <div class="container content my-5">
    
    <div class="row">
        <div class="col-md-6 ">
            <div class="testimonials">
            	<div class="active item">
                  <blockquote><p>Acoording to me <strong>The Explorer</strong> is the best site to learn coding and concepts of programming languages.

I have calculated all programs and problems which are on <strong>The Explorer</strong>.</p></blockquote>
                  <div class="carousel-info">
                    <img alt="" src="{{asset('img/john doe2.jpg')}}" class="pull-left">
                    <div class="pull-left">
                      <span class="testimonials-name">Rahul Kumar</span>
                      <span class="testimonials-post">Student</span>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="testimonials">
            	<div class="active item">
                  <blockquote><p>I can say it is one of the very useful website for the students who are preparing for technical interviews related to computer Science field.</p></blockquote>
                  <div class="carousel-info">
                    <img alt="" src="{{asset('img/john doe.jpg')}}" class="pull-left">
                    <div class="pull-left">
                      <span class="testimonials-name">Sanjay</span>
                      <span class="testimonials-post">Student</span>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- testimonial -->
    <!-- Team -->
<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">OUR TEAM</h5>
        <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{asset('img/harsh.jpg')}}" alt="card image"></p>
                                    <h4 class="card-title">Harsh Tyagi</h4>
                                    <p class="card-text">ABES Engineering College</p>
                                    <!--<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>-->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Web Developer</h4>
                                    <p class="card-text">Abes Engineering College Ghaziabad</p>
                                     <span> <b>3rd year</b></span>
                                     <span>Computer Science and Engineering</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{asset('img/kanak.jpg')}}" alt="card image"></p>
                                    <h4 class="card-title">Kanak Goel</h4>
                                    <p class="card-text">ABES Engineering College</p>
                                    <!-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Web Developer</h4>
                                    <p class="card-text">Abes Engineering College Ghaziabad</p>
                                     <span> <b>3rd year</b></span>
                                     <span>Computer Science and Engineering</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{asset('img/harshgoel.jpg')}}" alt="card image"></p>
                                    <h4 class="card-title">Harsh Kumar Goel</h4>
                                    <p class="card-text">ABES Engineering College</p>
                                    <!-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Front End Developer</h4>
                                    <p class="card-text">Abes Engineering College Ghaziabad</p>
                                     <span> <b>3rd year</b></span>
                                     <span>Computer Science and Engineering</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-2"></div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{asset('img/yash.JPG')}}" alt="card image"></p>
                                    <h4 class="card-title">Yash Mishra</h4>
                                    <p class="card-text">ABES Engineering College</p>
                                    <!-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Consultant</h4>
                                    <p class="card-text">Abes Engineering College Ghaziabad</p>
                                     <span> <b>3rd year</b></span>
                                     <span>Computer Science and Engineering</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{{asset('img/aakash.jpg')}}" alt="card image"></p>
                                    <h4 class="card-title">Aakash Kumar</h4>
                                    <p class="card-text">ABES Engineering College</p>
                                    <!-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Designer</h4>
                                    <p class="card-text">Abes Engineering College Ghaziabad</p>
                                     <span> <b>3rd year</b></span>
                                     <span>Computer Science and Engineering</span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
           

        </div>
    </div>
</section>
<!-- Team -->
<div class="container my-5">
  <h2>OUR ASSOCIATIONS</h2>
   <section class="customer-logos slider mb-5">
      <div class="slide"><img src="{{asset('img/directilogo.png')}}"></div>
      <div class="slide"><img src="{{asset('img/facebooklogo.png')}}"></div>
      <div class="slide"><img src="{{asset('img/googlelogo.jpeg')}}"></div>
      <div class="slide"><img src="{{asset('img/interviewebitlogo.png')}}"></div>
      <div class="slide"><img src="{{asset('img/Yahoologo.png')}}"></div>
      <div class="slide"><img src="{{asset('img/paytmlogo.jpg')}}"></div>
      <div class="slide"><img src="{{asset('img/microsoftlogo.jpg')}}"></div>
   </section>
   

</div>
@endsection


