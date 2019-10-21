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




<header id="header" class="header navbar-fixed-top" style=" max-height: 56px; background-color: rgba(0,0,0,0.84)">
    <div class="container-fluid col-xl-12" style=" alignment: center; max-width: 1000px" >

        <div class="top-left" >
            <a class="navbar-brand w3-left" href="#" style="color: white">Sohozogi Foundation</a>

            <a  href="javascript:void(0)" class="w3-left btn-lg w3-hide-large"  onclick="w3_open() ">
                <span class="glyphicon glyphicon-align-justify" style="color: white"></span>
            </a>

        </div>

        <div class="top-right" style="background: transparent">
            <div class="header-menu" >
                <div class="header-left" >
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

                </div>
            </div>
        </div>
    </div>
</header>
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

    </script>
</div>
</body>
</html>
