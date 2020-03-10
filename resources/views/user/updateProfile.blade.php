@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>Update Information </h4></div>
                    <hr/>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/') }}/v1/photo" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"></label>

                                <div class="col-md-7 text-center">
                                    <img id="photo" src="#" class="avatar img-circle img-thumbnail" alt="avatar" style="max-height: 200px; width: auto">
                                    <h6>Upload a different photo...</h6>
                                    <button id="imageUpload" type="submit" class="btn btn-primary ext-center center-block"  style="display: none; margin-bottom: 7px" >
                                        <i class="fa fa-cloud-upload" style="font-size: 20px"></i>
                                        Update Image
                                    </button>
                                    <input type="number" id="user_id" value=8 name="imageable_id" style="display: none">
                                    <input type="text" name="imageable_type" value="App/User" style="display: none">
                                    <input type="file" id="photoupload" name="photo" class="text-center center-block well well-sm" accept="image/*" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0]); document.getElementById('imageUpload').style.display = 'block'">

                                </div>
                            </div>
                        </form>
                        <form>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                                <div class="col-md-7">
                                    <input id="mobile" type="mobile" disabled class="form-control " name="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control " name="email" placeholder="Your Email Address" required autocomplete="email" pattern="\S+@\S+\.\S+">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                <div class="col-md-7">
                                    <select id="gender" class="chosen md-3 form-control" placeholder="Your Gender" required>
                                        <option value="" disabled selected>Your Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Shemale">Shemale</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right" >Date of Birth</label>

                                <div class="col-md-7">
                                    <input id="birthday" type="date" class="form-control" name="birthday" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="occupation" class="col-md-4 col-form-label text-md-right">Occupation</label>

                                <div class="col-md-7">
                                    <select id="occupation" class="chosen md-3 form-control" placeholder="Your Occupation" required>
                                        <option value="" disabled selected>Your Occupation Type</option>
                                        <option value="Actor">Actor</option>
                                        <option value="Banker">Banker</option>
                                        <option value="Student">Student</option>
                                        <option value="Teacher">Teacher</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="organization" class="col-md-4 col-form-label text-md-right">Organization</label>
                                <div class="col-md-7">
                                    <input list="organizationList" id="organization" class="chosen md-3 form-control" placeholder="Type Your Organization"  onclick="organizationLoad(); this.onclick=null;">
                                    <datalist id="organizationList">
                                        <!--option value=" Dhaka">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera"-->
                                    </datalist>

                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="marital_status" class="col-md-4 col-form-label text-md-right">Marital Status</label>

                                <div class="col-md-7">
                                    <select id="marital_status" class="chosen md-3 form-control" required>
                                        <option value="" disabled selected>Your Marital Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="blood_group" class="col-md-4 col-form-label text-md-right">Blood Group</label>

                                <div class="col-md-7">
                                    <select id="blood_group" class="chosen md-3 form-control" required>
                                        <option value="" disabled selected>Your Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">Weight</label>

                                <div class="col-md-7">
                                    <input id="weight" type="number" class="form-control " name="weight" placeholder="Require if You Want To Donate Blood">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Area</label>

                                <div class="col-md-7">
                                    <input id="area" type="text" class="form-control " name="area" placeholder="Click to Enter Your Address" readonly  onclick="activateArea(); this.onclick=null;" ondblclick="activateArea()" required>
                                    <input list="data" id="selectarea" class="chosen md-3 form-control" placeholder="Select Division"  onchange="addressPickup()" style="display: none; margin-top: 10px">
                                    <datalist id="data">
                                        <!--option value=" Dhaka">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera"-->
                                    </datalist>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right" >Address</label>

                                <div class="col-md-7">
                                    <input id="address" type="text" class="form-control " name="address" value="{{ old('address') }}" placeholder="Your Address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-7">
                                    <textarea rows="4" id="description" type="text" class="form-control " name="description" placeholder="Describe Yourself within 50 words"></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="btn btn-primary"  onclick="userInformationUpdate()">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/') }}/js/staticText.js"></script>

    <script src="{{ url('/') }}/js/common.js"></script>
    <script src="{{ url('/') }}/js/userUpdate.js"></script>

@endsection
