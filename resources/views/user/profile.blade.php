@extends('layouts.userDashboardLayout')

@section('content')
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
                                <h4 style="margin-top: 0px">Contact Information</h4>
                            </div>

                            <div class="col-sm-8 ">
                                <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                    <div style="width: 110px; float: left; margin-top: 2px">
                                        <label >E-mail Address<label>:</label></label>
                                    </div>
                                    <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                        <p id="email">abcd@gmail.com</p>
                                    </div>
                                </div>
                                <div class="col-sm-12 " style="margin-left: 0px; padding-left: 0px">
                                    <div style="width: 110px; float: left; margin-top: 2px">
                                        <label >Mobile Number<label>:</label></label>
                                    </div>
                                    <div class="info border-bottom-line" id="info" style="min-width: 310px ;float: left">
                                        <p id="mobile">01111111111 </p>
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
                                <div class="col-sm-12" style="margin-left: 0px; padding-left: 0px">
                                    <div style="width: 110px; float: left; margin-top: 2px">
                                        <label >Address<label>:</label></label>
                                    </div>
                                    <div class="info" id="info" style="min-width: 310px ;float: left">
                                        <p id="address" >House Number, Area Name</p>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="row border-bottom-line" >
                            <div class="col-sm-4  text-md-right" >
                                <h4 style="margin-top: 0px">Basic Information</h4>
                            </div>

                            <div class="col-sm-8 ">
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
                                <div class="col-sm-12" style="margin-left: 0px; padding-left: 0px">
                                    <div style="width: 110px; float: left; margin-top: 2px">
                                        <label >Marital Status<label>:</label></label>
                                    </div>
                                    <div class="info" id="info" style="min-width: 310px ;float: left">
                                        <p id="marital_status">Single </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row border-bottom-line" >
                            <div class="col-sm-4  text-md-right" >
                                <h4 style="margin-top: 0px">Personal Information</h4>
                            </div>

                            <div class="col-sm-8 ">
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
<script>
    var idlist = ['photo','mobile','name','email','gender','birthday','occupation','marital_status','blood_group','weight','address','description','area'];
    var id='', token='', respons;

    $(document).ready(function() { /*  here */

        var CookieArray = document.cookie.split(';');

        for(var i=0; CookieArray.length>i; i++){
            if(CookieArray[i].split('=')[0]==' id'){
                id=CookieArray[i].split('=')[1];
            }
            else if(CookieArray[i].split('=')[0]==' token'){
                token=CookieArray[i].split('=')[1];
            }
        }
        try{
            var request = new XMLHttpRequest();
            var url = 'http://donor.test/api/v1/users/'+ id;
            request.open("GET", url, false);
            request.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
            request.setRequestHeader("Authorization", 'Bearer '+token);

            request.send();
            respons  = JSON.parse(request.response);

            respons['data']['photo']= "{{ url('/') }}"+respons['data']['photo'];
            for(var i=0; i<idlist.length; i++){
                if (idlist[i] in respons['data']){
                    if(idlist[i]=='photo'){
                        document.getElementById(idlist[i]).src =respons['data'][idlist[i]];
                    }
                    else if(idlist[i]=='area'){
                        document.getElementById(idlist[i]).innerHTML =respons['data'][idlist[i]];
                        areaId = respons['data']['area_id'];
                    }
                    else{
                        document.getElementById(idlist[i]).innerHTML =respons['data'][idlist[i]];
                    }
                }
            }
        }
        catch (e) {
            console.log(e)
        }
    });

    if($(window).width()>768){
        var x = document.getElementsByClassName("info");
        for(var i=0; i<x.length;i++){
            x[i].style.width = '330px';
        }
    }
    if($(window).width()<769 & $(window).width()>500){
        var x = document.getElementsByClassName("info");
        for(var i=0; i<x.length;i++){
            x[i].style.width =($(window).width()-190)+'px';
        }
    }
</script>


@endsection












