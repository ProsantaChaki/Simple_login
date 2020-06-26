@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="toast">
                        <div class="toast-header">
                            Toast Header
                        </div>
                        <div class="toast-body">
                            Some text inside the toast body
                        </div>
                    </div>
                    <div class="card-header"><h4>Update Post </h4></div>
                    <hr/>
                    <div class="card-body">
                        <form id="post_create" name="post_create" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row text-center">
                                <div class="preview-images-zone">
                                    <!--div class="preview-image preview-show-1">
                                        <div class="image-cancel" data-no="1">x</div>
                                        <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>
                                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
                                    </div>
                                    <div class="preview-image preview-show-2">
                                        <div class="image-cancel" data-no="2">x</div>
                                        <div class="image-zone"><img id="pro-img-2" src="https://www.codeproject.com/KB/GDI-plus/ImageProcessing2/flip.jpg"></div>
                                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="2" class="btn btn-light btn-edit-image">edit</a></div>
                                    </div>
                                    <div class="preview-image preview-show-3">
                                        <div class="image-cancel" data-no="3">x</div>
                                        <div class="image-zone"><img id="pro-img-3" src="http://i.stack.imgur.com/WCveg.jpg"></div>
                                        <div class="tools-edit-image"><a href="javascript:void(0)" data-no="3" class="btn btn-light btn-edit-image">edit</a></div>
                                    </div-->
                                </div>

                                <input type="file" id="pro-image" name="pro-image[]" onclick="$('#pro-image').click()" class="text-center center-block well well-sm" multiple>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-7">
                                    <input id="title" name="title" type="text" class="form-control"  placeholder="The Title of Your Post" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_title" class="col-md-4 col-form-label text-md-right">Sub-Title</label>

                                <div class="col-md-7">
                                    <input id="sub_title"  name="sub_title" type="text" class="form-control"  required placeholder="Sub-Title of Your Post"  >
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-7">
                                    <textarea rows="14" id="description" name="description" type="text" class="form-control "  required placeholder="Describe within 200 words"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile Number</label>

                                <div class="col-md-7">
                                    <input id="mobile" name="mobile" type="number" readonly class="form-control " >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>

                                <div class="col-md-7">
                                    <input id="area" name="area"  type="text" class="form-control " required placeholder="Click to Enter Your Address" readonly  onclick="activateArea();">
                                    <input list="data" id="selectarea" name="selectarea" class="chosen md-3 form-control" placeholder="Select Division"  onchange="addressPickup()" style="display: none; margin-top: 10px">
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
                                    <input id="address" name="address" type="text" class="form-control "  required placeholder="Your Address" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-7">
                                    <input id="category" name="category" type="text" class="form-control " required placeholder="Click to Enter Right Category" readonly  onclick="activateCategory();" >
                                    <input list="categorylist" id="selectcategory" class="chosen md-3 form-control" placeholder="Select Category"  onchange="CategoryPickup()" style="display: none; margin-top: 10px">
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
                                        <input type="range" name="quality" id="quality" min="1" max="10" value="5" onchange="quality_level.value=value">
                                        <output id="quality_level">5</output>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_type" class="col-md-4 col-form-label text-md-right">Type of Post</label>

                                <div class="col-md-7">
                                    <select id="post_type" name="post_type" class="chosen md-3 form-control" placeholder="ype of Post" required>
                                        <option value="Want to Donate" selected>Want to Donate</option>
                                        <option value="Asking For Donation">Asking For Donation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_type" class="col-md-4 col-form-label text-md-right">Post Status</label>

                                <div class="col-md-7">
                                    <select id="post_status" name="post_status" class="chosen md-3 form-control" placeholder="ype of Post" value="Available" required>
                                        <option value="Available" >Available</option>
                                        <option value="Reserved">Reserved</option>
                                        <option value="Occupied">Occupied</option>
                                        <option value="Delete">Delete</option>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post_condition" class="col-md-4 col-form-label text-md-right"> Condition</label>

                                <div class="col-md-7">
                                    <select id="post_condition" name="post_condition" class="chosen md-3 form-control" placeholder="Condition" required>
                                        <option value="Used" selected>Used</option>
                                        <option value="New">New</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="financial_value" class="col-md-4 col-form-label text-md-right">Financial Value</label>

                                <div class="col-md-7">
                                    <input id="financial_value" name="financial_value" type="number" class="form-control "  placeholder="Approximate Financial Value" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="button" class="btn btn-primary" onclick="updatePost()" >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="postId" value="{{$postId}}">

    </div>
    <script src="{{ url('/') }}/js/staticText.js"></script>

    <script src="{{ url('/') }}/js/common.js"></script>
    <script src="{{ url('/') }}/js/updatePost.js"></script>

@endsection
