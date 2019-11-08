
<!DOCTYPE html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sohozogi Foundation</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        /*used in profile.blade.php page*/
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
<body>

<header id="header" class="header navbar-fixed-top" style=" max-height: 56px; background-color: rgba(0,0,0,0.84)">
    <div class="container-fluid col-xl-12" style=" alignment: center; max-width: 1000px" >

        <div class="top-left" >
            <a class="navbar-brand w3-left" href="#" style="color: white">Sohozogi</a>



            <a  href="javascript:void(0)" class="w3-left btn-lg w3-hide-large"  onclick="w3_open() ">
                <span class="glyphicon glyphicon-align-justify" style="color: white"></span>
            </a>

        </div>

        <div class="top-right" style="background: transparent">
            <div class="header-menu" >
                <div class="header-left" >
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" id="profilePhoto" src="images/admin.jpg" style="border-radius: 50%" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <!-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>
                             <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>-->

                            <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <!--
                    <div class="user-area dropdown float-right">
                        <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                            <i class="fa fa-envelope" style="font-size: 20px; color: white"></i>
                            <span class="count bg-primary">4</span>
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
                    <div class="user-area dropdown  float-right">
                        <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                            <i class="fa fa-bell" style="font-size: 20px; color: white; padding-right: 5px"></i>
                            <span class="count bg-primary">4</span>
                        </a>
                        <div class="user-menu dropdown-menu" style="width: 250px">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                        </div>
                    </div>
                    -->

                </div>
            </div>
        </div>
    </div>
</header>
<div class="aside left-panel w3-content w3-border-left w3-border-right">


    <!-- Sidebar/menu -->
    <nav class=" w3-sidebar w3-light-grey w3-collapse w3-top navbarleft navbar-expand-sm navbar-default" style="z-index:3;width:260px; margin-top: 56px" id="mySidebar">
        <div class=" nav w3-container w3-display-container w3-padding-16 overlay zoom">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-transparent w3-display-topright"></i>

            <!-- <div id="main-menu" class="main-menu collapse navbar-collapse">-->
            <ul class="hover-li nav navbar-nav left-nav" style="size: 14px">

                <li class="menu-title">Menu</li>
                <li><i class=""></i><a href="#">Profile</a></li>
                <li><i class=""></i><a href="#">Update Information</a></li>
                <li><i class=""></i><a href="#">Connections</a></li>
                <li><i class=""></i><a href="#">Activities</a></li>
                <li><i class=""></i><a href="#">All Post</a></li>
                <li><i class=""></i><a href="#">Create Post</a></li>
                <li><i class=""></i><a href="#">Update Post</a></li>
                <li><i class=""></i><a href="#">Delete Post</a></li>
            </ul>
        </div>
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-Xlarge" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->


    <div class="w3-main w3-white" style="margin-left:260px; margin-top: 56px">
        <div class="w3-container">

            @yield('content')

        </div>
        <!-- End page content -->
    </div>

    <!-- Subscribe Modal -->


    <script>
        var id=-1, token='', photo='';
        window.onload = function(){
            userInformationLoad();
        };
        function userInformationLoad() {
            // alert('successful')
            try{
                var allCookieArray = document.cookie.split(';');
                for(var i=0; allCookieArray.length>i; i++){
                    //alert(allCookieArray[i].split('=')[0])
                    if(allCookieArray[i].split('=')[0]==' id'){
                        id=allCookieArray[i].split('=')[1];
                    }
                    else if(allCookieArray[i].split('=')[0]==' token'){
                        token=allCookieArray[i].split('=')[1];
                    }
                }
            }
            catch (e) {
                alert ('alert');
            }
            //alert ('alert no');
            if(id>0){
                var url = 'http://donor.test/api/v1/users/'+ id;
                var method = 'GET';
                var data = false;
                var request = httpRequest(method, url, data);
                var respons  = JSON.parse(request.response);
                if(respons['data']['photo'].length>1)
                    document.getElementById('profilePhoto').src ='{{ url('/') }}/'+ respons['data']['photo'];
            }
        }
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        function navMargin() {
            if($(window).width()<769){
                document.getElementById("navMenu").style.marginTop = '56px';
            }
        }
        $(window).resize(function(){
            if($(window).width()>769){
                document.getElementById("navMenu").style.display = none;
            }
            else {
                document.getElementById("navMenu").style.marginTop = '0px';
            }
        });
        document.getElementById("navMenu").style.display = none;
        // Script to open and close sidebar when on tablets and phones
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
        function httpRequest(method, url, data) {
            var request = new XMLHttpRequest();
            request.open(method, url, false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.setRequestHeader("Authorization", 'Bearer '+token);
            request.send(data);
            return request;
        }
    </script>
</div>
</body>
</html>
