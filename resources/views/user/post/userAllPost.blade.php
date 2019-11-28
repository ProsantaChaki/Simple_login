@extends('layouts.userDashboardLayout')

@section('content')

        <div class="w3-container" id="posts" style="margin-top: 10px ">


            <!-- Push down content on small screens
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" >
                    <h4 class="mb-2"><a onclick="openSinglePost(1)" name="title">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span name="date"><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span class="text-primary" style="font-weight: bold" name="type"><i class="mr-2 "></i>Available for donate</span>
                            </p>
                        </div>
                        <p onclick="openSinglePost(1)"><b>5</b> People are interested on this</p>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span class="text-primary">Biplob Biswas</span>
                                <span > Received this.</span>
                            </p>
                        </div>
                        <select id="post_type" class="chosen md-3 form-control " placeholder="ype of Post" required>
                            <option value="Want to Donate" selected>Available</option>
                            <option value="Asking For Donation">Reserved</option>
                            <option value="Asking For Donation">Occupied</option>
                            <option value="Asking For Donation">Delete</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" >
                    <h4 class="mb-2"><a href="#" name="title">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span name="date"><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span class="text-primary" style="font-weight: bold" name="type"><i class="mr-2 "></i>Available for donate</span>
                            </p>
                        </div>
                        <p><b>5</b> People are interested on this</p>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span class="text-primary">Biplob Biswas</span>
                                <span > Received this.</span>
                            </p>
                        </div>
                        <select id="post_type" class="chosen md-3 form-control " placeholder="ype of Post" required>
                            <option value="Want to Donate" selected>Available</option>
                            <option value="Asking For Donation">Reserved</option>
                            <option value="Asking For Donation">Occupied</option>
                            <option value="Asking For Donation">Delete</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" >
                    <h4 class="mb-2"><a href="#" name="title">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span name="date"><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span class="text-primary" style="font-weight: bold" name="type"><i class="mr-2 "></i>Available for donate</span>
                            </p>
                        </div>
                        <p><b>5</b> People are interested on this</p>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span class="text-primary">Biplob Biswas</span>
                                <span > Received this.</span>
                            </p>
                        </div>
                        <select id="post_type" class="chosen md-3 form-control " placeholder="ype of Post" required>
                            <option value="Want to Donate" selected>Available</option>
                            <option value="Asking For Donation">Reserved</option>
                            <option value="Asking For Donation">Occupied</option>
                            <option value="Asking For Donation">Delete</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex " style="padding-top: 10px; text-align: center;" >
                 <ul class="pagination">
                     <li class="page-item "><a class="page-link" href="#">1</a></li>
                     <li class="page-item" style="border: none"><a class="page-link" href="#" style="border: none; margin: 0px; padding-left: 0px; padding-right: 3px"> . . . . </a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item active"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item" style="border: none"><a class="page-link" href="#" style="border: none; margin: 0px; padding-left: 0px; padding-right: 3px"> . . . . </a></li>
                     <li class="page-item"><a class="page-link" href="#">7</a></li>
                 </ul>
            </div>
            -->
        </div>
        <script src="{{ url('/') }}/js/common.js"></script>
        <script src="{{ url('/') }}/js/pagination.js"></script>
        <script src="{{ url('/') }}/js/userAllPost.js"></script>
        <script>

        </script>

        <!-- End page content -->

@endsection



