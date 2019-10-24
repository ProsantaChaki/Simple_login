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
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class=" navbar navbar-inverse navbar-fixed-top " >
    <div class="container-fluid col-xl-12" style=" alignment: center; max-width: 1000px" >
        <a class="navbar-brand w3-left" href="#">Sohozogi Foundation</a>
        <button type="button"  class="navbar-toggle w3-left" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand w3-right sticky-top" style="font-size: 14px" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>-->
        <a class="navbar-brand w3-right sticky-top small" id="loginVisibility" style="font-size: 14px; display: block" data-toggle="modal" data-target="#login" href="#" ><span class="glyphicon glyphicon-log-in"></span> Login</a>
        <ul class="navbar-brand w3-right sticky-top small" id="profileVisibility" style="padding-left: 0px; padding-top: 0px; display: none">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="images/admin.jpg" style="border-radius: 50%" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                    <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                    <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                    <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
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

        <ul class="nav navbar-nav collapse navbar-collapse" id="myNavbar" style="margin-top: 0px" >
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Volunteering</a></li>
                    <li><a href="#">Lending</a></li>
                    <li><a href="#">Donation</a></li>
                </ul>
            </li>
            <li><a href="#">Books</a></li>
            <li><a href="#">Blood</a></li>
        </ul>

    </div>
</nav>
<div class="modal" id="login" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Login</h4>
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form>
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
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a><br>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" onclick="userLogin(this.form)">Sign in</button>
                        <label class="pull-right">
                            <a style="font-size: 14px; color: #fb9678" data-toggle="modal" data-target="#register" data-dismiss="modal" > Don't have an account yet?</a>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div class="w3-content w3-border-left w3-border-right">


    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-light-grey w3-collapse w3-top" style="z-index:3;width:260px; margin-top: 56px" id="mySidebar">


        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>
            <h3>Filters</h3>

            <div class="row form-group">
                <div class="col col-md-12"><label for="selectSm" class=" form-control-label">Sort Results By</label></div>
                <div class="col-12 col-md-12">
                    <select name="selectSm" id="selectSm" class="form-control-sm form-control">
                        <option value="0">Please select</option>
                        <option value="1">Date</option>
                        <option value="2">Popular</option>
                        <option value="3">Quality</option>
                    </select>
                </div>
            </div>


            <div class="row form-group">
                <div class="col col-md-12"><label class=" form-control-label">Type of Post</label></div>
                <div class="col col-md-12">
                    <div class="form-check" style="font-style: normal;">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="donate" name="radios" value="donate" class="custom-control-input">
                            <label for="donate" class="form-check-label ">
                                Available Donations
                            </label>
                        </div>
                        <div class="custom-control custom-radio ">
                            <input type="radio" id="help" name="radios" value="help" class="custom-control-input">
                            <label for="help" class="form-check-label ">
                                Required Donations
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12"><label class=" form-control-label">Categories</label></div>
                <div class=" col-md-12">
                    <form action="/action_page.php">
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" class="custom-control-input" id="1" name="example1">
                            <label class="custom-control-label" for="customCheck">Education</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="2" name="example1">
                            <label class="custom-control-label" for="customCheck">Cloths </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="3" name="example1">
                            <label class="custom-control-label" for="customCheck">Sports</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="4" name="example1">
                            <label class="custom-control-label" for="customCheck">Furniture </label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="5" name="example1">
                            <label class="custom-control-label" for="customCheck">Pet & Hobbies</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="6" name="example1">
                            <label class="custom-control-label" for="customCheck">Electronics</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-12"><label for="selectSm" class=" form-control-label">Location</label></div>
                <div class="col-12 col-md-12">
                    <select name="selectSm" id="selectSma" class="form-control-sm form-control">
                        <option value="0">Please select</option>
                        <option value="1">Dhaka</option>
                        <option value="2">Khulna</option>
                        <option value="3">Chittagong</option>
                    </select>
                </div>
                <div class="col col-md-12"><label for="selectSm" class=" form-control-label">Area</label></div>
                <div class="col-12 col-md-12">
                    <select name="selectSm" id="selectSmda" class="form-control-sm form-control">
                        <option value="0">Please select</option>
                        <option value="1">Mirpur</option>
                        <option value="2">Mohammudpur</option>
                        <option value="3">Banani</option>
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

    <div class="w3-main w3-white" style="margin-left:260px; margin-top: 56px">
        <div class="w3-container">

            <!-- Push down content on small screens -->
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
        </div>
        <!-- End page content -->
    </div>

    <!-- Subscribe Modal -->


    <script>
            var allCookieArray = document.cookie.split(';');
            if(allCookieArray.length>4){
                document.getElementById('loginVisibility').style.display = 'none';
                document.getElementById('profileVisibility').style.display = 'block';
                document.getElementById('messageVisibility').style.display = 'block';
                document.getElementById('notificationVisibility').style.display = 'block';
            }
            else {
                document.getElementById('loginVisibility').style.display = 'block';
                document.getElementById('profileVisibility').style.display = 'none';
                document.getElementById('messageVisibility').style.display = 'none';
                document.getElementById('notificationVisibility').style.display = 'none';
            }

            function userRegistration(theForm) {

            var data = JSON.stringify({
                'name' :document.getElementById("r_name").value,
                'email' : document.getElementById("r_email").value,
                'mobile' : document.getElementById("r_mobile").value,
                'password' : document.getElementById("r_password").value,
                'c_password' :document.getElementById("r_c_password").value,
            });

            var request = new XMLHttpRequest();
            request.open("POST", "http://donor.test/api/v1/register", false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.send(data);
            if(request.status = 200) {
                setCookies(request.response);
                document.getElementById("r_password").value= '';
                document.getElementById("r_c_password").value= '';

            }
        }

        function setCookies(data) {
            var date = new Date();
            date.setTime(date.getTime() + (60*24*60*60*1000));

            var respons  = JSON.parse(data);
            var u_id     = respons['data']['id'];
            var u_name   = respons['data']['name'];
            var u_token  = respons['data']['token'];
            var expires  = date.toUTCString();
            try {
                document.cookie = 'name=' + u_name + ";" + "expires=" + expires + ";path=/";
                document.cookie = 'id=' + u_id + ";" + "expires=" + expires + ";path=/";
                document.cookie = 'token=' + u_token + ";" + "expires="+ expires + ";path=/";
            }
            catch (e) {
                console.log(e);
            }
        }

        function userLogin(form) {
            // New XMLHTTPRequest
            var data = JSON.stringify({
                'email' : document.getElementById("email").value,
                'password' : document.getElementById("password").value
            });
            var request = new XMLHttpRequest();
            request.open("POST", "http://donor.test/api/v1/login", false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.send(data);
            if(request.status = 200) {
                setCookies(request.response);
                document.getElementById("email").value = '';
                document.getElementById("password").value= '';
            }
        }

        function navMargin() {
            if($(window).width()<769){
                document.getElementById("myNavbar").style.marginTop = '56px';
            }
        }
        // Script to open and close sidebar when on tablets and phones
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
            $(window).resize(function(){
                if($(window).width()<769){
                    document.getElementById("myNavbar").style.marginTop = '56px';
                }
                else {
                    document.getElementById("myNavbar").style.marginTop = '0px';

                }
            });
            document.getElementById("myNavbar").style.marginTop = '0px';

    </script>
</div>
</body>
</html>
