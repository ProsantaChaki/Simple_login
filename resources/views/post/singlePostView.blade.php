@extends('layouts.publicHeaderLayout')

@section('content')
    <div class="container" style="max-width:1000px; margin-top: 60px">

    <div class="col-md-12 col-sm-12 ftco-animate d-md-flex" id="header">

         </div>
         <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
            <div  class="col-xl-8 col-lg-8 col-md-8 col-sm-6 "  id="middleLeft">

            </div>
             <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-6 " style="alignment: right" id="middleRight">

             </div>
         </div>
         <div class="col-md-12 col-sm-12 ftco-animate d-md-flex" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
             <div  class="col-xl-10 col-lg-10 col-md-12 col-sm-12 ">
                 <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 " id="buttomLeft">
                 </div>
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 " id="buttomRight">

                 </div>
             </div>
         </div>

         <div class="w3-content" >

         </div>
         <input type="hidden" id="postId" value="{{$postId}}">
    </div>


    <script src="{{ url('/') }}/js/common.js"></script>
    <script src="{{ url('/') }}/js/singlePostView.js"></script>
@endsection
