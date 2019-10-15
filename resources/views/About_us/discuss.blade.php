@extends('layouts.app')
@section('title')
Discussions
@endsection
<style>
.loader {
  border: 16px solid #eee;
  border-radius: 50%;
  border-top: 16px solid #eee;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
.loader {
  border-top: 16px solid #5572e8;
  border-bottom: 16px solid #5572e8;
  
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@section('content')
<h1 style="text-align:center; margin-top:20px;">Coming Soon...</h1>
<center><div class="loader my-5" ></div></center>
@endsection

