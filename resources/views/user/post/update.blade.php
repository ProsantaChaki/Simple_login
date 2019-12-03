@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>Create a Post </h4></div>
                    <hr/>
                    <div class="card-body">

                        <form id="audit_submit" onsubmit="createPost()">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-7">
                                    <input id="title" type="text" class="form-control" name="title" placeholder="The Title of Your Post" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_title" class="col-md-4 col-form-label text-md-right">Sub-Title</label>

                                <div class="col-md-7">
                                    <input id="sub_title" type="sub_title" class="form-control" name="title" required placeholder="Sub-Title of Your Post"  >
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-7">
                                    <textarea rows="14" id="description" type="text" class="form-control " name="description" required placeholder="Describe within 200 words"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                                <div class="col-md-7">
                                    <input id="mobile" type="mobile" disabled class="form-control " name="mobile">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>

                                <div class="col-md-7">
                                    <input id="area" type="text" class="form-control " required name="area" placeholder="Click to Enter Your Address" readonly  onclick="activateArea();">
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
                                    <input id="address" type="text" class="form-control " name="address" required placeholder="Your Address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-7">
                                    <input id="category" type="text" class="form-control " name="area" required placeholder="Click to Enter Right Category" readonly  onclick="activateCategory();" >
                                    <input list="categorylist" id="selectcategory" required class="chosen md-3 form-control" placeholder="Select Category"  onchange="CategoryPickup()" style="display: none; margin-top: 10px">
                                    <datalist id="categorylist">
                                        <!--option value=" Dhaka">
                                        <option value="Firefox">
                                        <option value="Chrome">
                                        <option value="Opera"-->
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quality" class="col-md-4 col-form-label text-md-right" >Quality</label>

                                <div class="col-md-7">
                                    <div class="range range-primary">
                                        <input type="range" name="range" min="1" max="10" value="5" onchange="quality.value=value">
                                        <output id="quality">5</output>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_type" class="col-md-4 col-form-label text-md-right">Type of Post</label>

                                <div class="col-md-7">
                                    <select id="post_type" class="chosen md-3 form-control" placeholder="ype of Post" required>
                                        <option value="Want to Donate" selected>Want to Donate</option>
                                        <option value="Asking For Donation">Asking For Donation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="financial_value" class="col-md-4 col-form-label text-md-right">Financial Value</label>

                                <div class="col-md-7">
                                    <input id="financial_value" type="number" class="form-control " name="financial_value" placeholder="Approximate Financial Value" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="Validation()" >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/') }}/js/common.js"></script>

    <script src="{{ url('/') }}/js/createPost.js">
    </script>

@endsection
