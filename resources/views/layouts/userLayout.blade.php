<!DOCTYPE html>
<html>
<head>
    <title>Donor Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/newStyle.css">

    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
        .mySlides {display: none}
        .modal-backdrop
        {
            opacity:0.5 !important;
        }
        .font-normal label{
             font-weight: normal;
        }
        .pagination>li>a {
            border-radius: 50% !important;
            margin: 0 5px;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body style="overflow-y: scroll;">
<nav class=" navbar navbar-inverse navbar-fixed-top " >
    <div class="container-fluid col-xl-12" style=" alignment: center; max-width: 1000px" >
        <a class="navbar-brand w3-left" href="#">Sohozogi</a>
        <button type="button"  class="navbar-toggle w3-left" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand w3-right sticky-top" style="font-size: 14px" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>-->
        <a class="navbar-brand w3-right sticky-top small" id="loginVisibility" style="font-size: 14px; display: block" data-toggle="modal" data-target="#login" href="#" ><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <!--
        -------------------------------Right side of Menu bar after Login---------------------------------------
        -->

        <ul class="navbar-brand w3-right sticky-top small" id="profileVisibility" style="padding-left: 0px; padding-top: 0px; display: none">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" id="profilePhoto" src="images/admin.jpg" style="border-radius: 50%" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="http://donor.test/profile"><i class="fa fa- user"></i>My Profile</a>

                    <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                     <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>-->

                    <a class="nav-link" id="logout" onclick="logout()"><i class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>
        </ul>
        <ul class="navbar-brand w3-right sticky-top small" id="messageVisibility" style="width: 40px;padding-top: 0px; margin-left: 5px; padding-right: 1px; display: none">
            <div class="user-area dropdown float-right">
                <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                    <i class="fa fa-envelope" style="font-size: 20px; color: white"></i>
                    <sup class="count bg-primary" style="width: 17px; height: 17px; margin-top: 0px">4</sup>
                </a>

                <div class="user-menu dropdown-menu" style="width: 250px;">
                    <p class="red">You have 4 Mails</p>
                    <a class="dropdown-item media" href="#">
                        <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                        <div class="message media-body">
                            <span class="name float-left">Jonathan Smith</span>
                            <span class="time float-right">Just now</span>
                            <p>Hello, this is an example msg</p>
                        </div>
                    </a>
                    <a class="dropdown-item media" href="#">
                        <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                        <div class="message media-body">
                            <span class="name float-left">Rachel Santos</span>
                            <span class="time float-right">15 minutes ago</span>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                    </a>
                </div>
            </div>
        </ul>
        <ul class="navbar-brand w3-right sticky-top small" id="notificationVisibility" style="width: 40px;padding-top: 0px; margin-left: 5px; padding-right: 1px; display: none">
            <div class="user-area dropdown  float-right">
                <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                    <i class="fa fa-bell" style="font-size: 20px; color: white; padding-right: 5px"></i>
                    <sup class="count bg-primary" style="width: 17px; height: 17px; margin-top: 0px">4</sup>
                </a>

                <div class="user-menu dropdown-menu" style="width: 250px">
                    <p class="red">You have 3 Notification</p>
                    <a class="dropdown-item media" href="#">
                        <i class="fa fa-check"></i>
                        <p>Server #1 overloaded.</p>
                    </a>
                </div>
            </div>
        </ul>
        <!--
        -------------------------------Left side of Menu bar ---------------------------------------
        -->
        <ul class="nav navbar-nav collapse navbar-collapse" id="myNavbar" style="margin-top: 0px" >
            <li class="active"><a href="#">Home</a></li>
            <!--<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Volunteering</a></li>
                    <li><a href="#">Lending</a></li>
                    <li><a href="#">Donation</a></li>
                </ul>
            </li>
            <li><a href="#">Books</a></li>
            <li><a href="#">Blood</a></li>-->
        </ul>

    </div>
</nav>

<!--
-------------------------------Login Modal---------------------------------------
-->
<div class="modal" id="login" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Login</h4>
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form id="loginForm" onsubmit="userLogin()">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">User Id</label>

                            <div class="col-sm-6">
                                <input  type="text" id="email" class="form-control" placeholder="Email or Mobile Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="messageCheckbox" type="checkbox" id="rememberme" value="1"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a><br>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <label class="pull-right">
                            <a style="font-size: 14px; color: #fb9678" data-toggle="modal" data-target="#register" data-dismiss="modal" > Don't have an account yet?</a>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
-------------------------------Registration Modal---------------------------------------
-->

<div class="modal" id="register" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Registration</h4>
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form  action="#" onsubmit="return userRegistration(this);">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-sm-right">Name</label>

                            <div class="col-sm-6">
                                <input id="r_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Your Name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-sm-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-6">
                                <input id="r_email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" pattern="\S+@\S+\.\S+" placeholder="Enter Your Email Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label text-sm-right">Mobile Number</label>

                            <div class="col-sm-6">
                                <input id="r_mobile" type="tel" class="form-control" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" pattern="(01)[0-9]{9}" placeholder="Enter Your Mobile Number">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-sm-right">{{ __('Password') }}</label>

                            <div class="col-sm-6">
                                <input id="r_password" type="password" class="form-control" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-4 col-form-label text-sm-right">{{ __('Confirm Password') }}</label>

                            <div class="col-sm-6">
                                <input id="r_c_password" type="password" class="form-control" name="c_password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Retype Password" required>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="messageCheckbox" type="checkbox" id="rememberme" value="1"> Remember Me
                            </label>
                        </div>

                        <div class="form-group row sm-0">
                            <div class="col-sm-6 offset-sm-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="w3-content w3-border-left w3-border-right font-normal" style=" font-weight: normal">


    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-light-grey w3-collapse w3-top " style="z-index:3;width:260px; margin-top: 56px; " id="mySidebar">


        <div class="w3-container w3-display-container w3-padding-16 overflow-auto " style="overflow-y: scroll; height: 93vh; ">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
            <h3>Filters</h3>
            <div class="row form-group" >
                <div class="col col-md-12"><label for="sortby" class=" form-control-label">Sort Results By</label></div>
                <div class="col-12 col-md-12">
                    <select name="sortby" id="sortby" class="form-control-sm form-control">
                        <option value="">Please select</option>
                        <option value="Date">Date</option>
                        <option value="Popularity">Popularity</option>
                        <option value="Quality">Quality</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-12">
                    <label class=" form-control-label" style="font-weight: bold">Type of Post</label>
                </div>
                <div class="col col-md-12">
                    <div class="form-check" id="typeof">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="donate" name="typeofvalue" value="" class="custom-control-input">
                            <label for="donate" class="form-check-label " >
                                All Post
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="donate" name="typeofvalue" value="Want to Donate" class="custom-control-input">
                            <label for="donate" class="form-check-label " >
                                Available Items
                            </label>
                        </div>
                        <div class="custom-control custom-radio ">
                            <input type="radio" id="help" name="typeofvalue" value="Asking For Donation" class="custom-control-input">
                            <label for="help" class="form-check-label ">
                                Required Items
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-12"><label class=" form-control-label" style="font-weight: bold">Category</label></div>
                <div class=" col-md-12">
                    <div class="control-group"  id="category">
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="1" name="catagory[]" value="Education">
                            <label class="custom-control-label" for="customCheck">Education</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="2" name="catagory2" value="Cloths">
                            <label class="custom-control-label" for="customCheck">Cloths </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="3" name="catagory3" value="Sports">
                            <label class="custom-control-label" for="customCheck">Sports</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="4" name="catagory4" value="Home Appliances">
                            <label class="custom-control-label" for="customCheck">Home Appliances </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="5" name="catagory5" value="Food">
                            <label class="custom-control-label" for="customCheck">Food</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="6" name="catagory6" value="Hobby">
                            <label class="custom-control-label" for="customCheck">Hobby</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="6" name="catagory7" value="Others">
                            <label class="custom-control-label" for="customCheck">Others</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row form-group" style="display: none">
                <div class="col col-md-12"><label for="sub-category" class=" form-control-label" style="font-weight: bold">Sub-Category</label></div>
                <div class="col-12 col-md-12">
                    <select name="sub-category" id="sub_category" class="form-control-sm form-control">
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12"><label for="division" class=" form-control-label" style="font-weight: bold">Division</label></div>
                <div class="col-12 col-md-12">
                    <select name="division" id="division" class="form-control-sm form-control">
                        <option value="0">Please select</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Rajshahi">Rajshahi</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12"><label for="district" class=" form-control-label" style="font-weight: bold">District</label></div>
                <div class="col-12 col-md-12">
                    <select name="district" id="district" class="form-control-sm form-control">
                        <option value="0">Please select</option>

                    </select>
                </div>
            </div>

        </div>


    </nav>

    <!-- Top menu on small screens -->
    <footer class="w3-bar w3-bottom w3-hide-large w3-small">
        <a style="border-radius: 20px ;" href="javascript:void(0)" class="w3-right w3-bar-item w3-button w3-gray w3-large"  onclick="w3_open() ">Filter</a>
    </footer>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-Xlarge" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->

    <div class="w3-main w3-white " style="margin-left:260px; margin-top: 56px">
        <div class="w3-container" id="posts">


            <!-- Push down content on small screens -->
            <!--<div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#" name="title">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <p class="mb-4" name="sub_title">A small river named Duden flows by their place.</p>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span name="date"><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span class="text-primary" style="font-weight: bold" name="type"><i class="mr-2 "></i>Available Item</span>
                            </p>
                        </div>
                        <p class="mb-4" name="area">Mirpur, Dhaka, Dhaka,1215</p>
                        <div class="meta-wrap">
                            <label class="text-primary" name="status" >Avalible</label>
                            <label style="float: right; display: block" name><i class="fa fa-heart-o" style="font-size:24px;" ></i></label>
                            <label style="float: right; display: none "><i class="fa fa-heart" style="font-size:24px; color: blueviolet"></i></label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p>
                            <a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p>
                            <a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p>
                            <a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p>
                            <a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p>
                            <a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 " style="alignment: left">
                    <a href="single.html" class="img img-2">
                        <img src="images/image_1.jpg" style="height: auto; width: 100%; max-width: 300px; ">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8" style="alignment: right;">
                    <h4 class="mb-2"><a href="#">A Loving Heart is the Truest Wisdom</a></h4>
                    <div class="text text-2 pl-md-4">
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
                                <span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
                                <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                            </p>
                        </div>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p>
                            <a href="#" class="btn-custom" >Read More <span class="ion-ios-arrow-forward"></span></a>
                        </p>
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
            </div>-->
        </div>
        <!-- End page content -->
    </div>
</div>
<script src="{{ url('/') }}/js/userLayout.js"></script>
<script>

</script>

</body>
</html>
