<!DOCTYPE html>
<html>
<head>
    <title>Donor Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/newStyle.css">

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
<body style="overflow-y: scroll;">
<nav class=" navbar navbar-inverse navbar-fixed-top "  >
    <div class="container-fluid col-xl-12" style=" alignment: center; max-width: 1000px" >
        <a class="navbar-brand w3-left" href="{{ url('/') }}/post">Sohozogi</a>
        <button type="button"  class="navbar-toggle w3-left" data-toggle="collapse" onclick="sideBar()">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand w3-right sticky-top" style="font-size: 14px" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>-->
        <!--
        -------------------------------Right side of Menu bar after Login---------------------------------------
        -->

        <ul class="navbar-brand w3-right sticky-top small"  style="padding-left: 0px; padding-top: 0px; ">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" id="profilePhoto" src="{{ url('/') }}images/avatar.png" style="border-radius: 50%" alt="">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="{{ url('/') }}/profile"><i class="fa fa- user"></i>My Profile</a>

                    <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                     <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>-->

                    <a class="nav-link" id="logout" onclick="logoutProfile()"><i class="fa fa-power -off"></i>Logout</a>
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

        <ul class="nav navbar-nav collapse navbar-collapse" id="myNavbar" style="margin-top: 0px" >
            <li class="active"><a href="{{ url('/') }}post">Home</a></li>
        </ul>-->

    </div>
</nav>


<div class="w3-content w3-border-left w3-border-right font-normal" style=" font-weight: normal; margin-bottom: 50px">


    <!-- Sidebar/menu -->
    <nav class=" w3-sidebar w3-light-grey w3-collapse w3-top navbarleft navbar-expand-sm navbar-default" style="z-index:3;width:260px; margin-top: 56px" id="mySidebar">
        <div class=" nav w3-container w3-display-container w3-padding-16 overlay zoom" >
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>

            <!-- <div id="main-menu" class="main-menu collapse navbar-collapse">-->
            <ul class="hover-li nav navbar-nav left-nav" style="size: 14px">


                <li class="menu-title border-bottom-line">Menu</li>
                <li><i class=""></i><a href="{{ url('/') }}/profile">Profile</a></li>
                <li><i class=""></i><a href="{{ url('/') }}/updateprofile">Update Information</a></li>
                <li><i class=""></i><a href="{{ url('/') }}/change/password">Update Password</a></li>

                <li><i class=""></i><a href="{{ url('/') }}/activities">Activities</a></li>
                <li><i class=""></i><a href="{{ url('/') }}/userallpost">All Post</a></li>
                <li><i class=""></i><a href="{{ url('/') }}/createpost">Create Help</a></li>
            <!--li><i class=""></i><a href="{{ url('/') }}/userallpost">Update Post</a></li>
                <li><i class=""></i><a href="#">Delete Post</a></li-->
            </ul>
        </div>

    </nav>

    <!-- Top menu on small screens
    <footer class="w3-bar w3-bottom w3-hide-large w3-small">
        <a style="border-radius: 20px ;" href="javascript:void(0)" class="w3-right w3-bar-item w3-button w3-gray w3-large"  onclick="w3_open() ">Filter</a>
    </footer>-->

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-Xlarge" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->

    <div class="w3-main w3-white " style="margin-left:260px; margin-top: 56px">
        <div class="w3-container" >
            @yield('content')

        </div>
        <!-- End page content -->
    </div>
</div>


<script src="{{ url('/') }}/js/staticText.js"></script>

<script src="{{ url('/') }}/js/common.js"></script>

<script>
    userInformationLoad();
    function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }


    //document.getElementById("navMenu").style.display = 'none';
    // Script to open and close sidebar when on tablets and phones
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }
    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
<div class="footer p-3 mt-5 bg-white text-dark" >
    <div class="container">
        <div class="row footer-text">
            <div class="col-lg-6 col-md-16 col-sm-6 col-12 text-left">
                Copyright &copy; Sohozogi 2020
            </div>
            <div class="col-lg-6 col-md-16 col-sm-6 col-12 text-right">
                Prosanta Kumar Chaki
            </div>
        </div>
    </div>
</div>

</html>
