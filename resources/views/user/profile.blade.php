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
    <script src="{{ url('/') }}/js/common.js"></script>
    <script src="{{ url('/') }}/js/userProfile.js"></script>


@endsection












