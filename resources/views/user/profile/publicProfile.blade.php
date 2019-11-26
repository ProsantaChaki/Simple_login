<!DOCTYPE html>
<html>
<head>
    <title>Donor Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://donor.test/assets/css/newStyle.css">



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
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }



    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>




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
            <li class="active"><a href="http://donor.test/post">Home</a></li>
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
<!--
-------------------------------Registration Modal END--------------------------------------
-->
<div class="container" style="max-width:1000px; margin-top: 60px">
    <div class="col-md-12 col-sm-12 ftco-animate d-md-flex" id="header">
        <div class="container" style="background-color: #ffffff; max-width: 800px">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body" style="max-width: 800px">
                            @csrf
                            <div class="form-group row border-bottom-line">
                                <label for="name" class="col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-12 text-center">
                                    <img id="photo" name="photo" src="http://donor.test/images/avatar.png" class="avatar img-circle img-thumbnail" alt="avatar" style="max-height: 200px; width: auto">
                                </div>
                                <div class="col-md-12 text-center">
                                    <h3 id="name">Your Name</h3>
                                    <h5 style="opacity: .5">Volunteer</h5>
                                    <p id="description">Your Descriptions</p>
                                </div>
                            </div>
                            <div class="row border-bottom-line" >
                                <div class="col-sm-4  text-md-right" >
                                    <h4 style="margin-top: 0px">Basic Information</h4>
                                </div>

                                <div class="col-sm-8 ">
                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >E-mail Address<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="u_email">abcd@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Area<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="area">Area, Subordinate, District, Division, Post Code </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Birthday<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="birthday">2000-01-01</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Occupation<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="occupation">Self Employed </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Organization<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="organization">None</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Marital Status<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="marital_status">Single </p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Blood Group<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="blood_group">o+</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Gender<label>:</label></label>
                                        </div>
                                        <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                            <p id="gender">Male</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                        <div style="width: 110px; float: left; margin-top: 2px">
                                            <label >Weight<label>:</label></label>
                                        </div>
                                        <div class="info" id="info" style="min-width: 310px ;float: left">
                                            <p id="weight">60 Kg </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<input type="hidden" id="uid" value="{{$uid}}">

</div>
<script src="{{ url('/') }}/js/common.js"></script>
<script src="{{ url('/') }}/js/publicProfile.js"></script>
<script src="{{ url('/') }}/js/userLayout.js"></script>

</body>
</html>
















