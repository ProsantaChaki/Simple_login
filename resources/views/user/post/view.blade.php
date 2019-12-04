@extends('layouts.publicHeaderLayout')

@section('content')
    <div class="container" style="max-width:1000px; margin-top: 60px">

        <div class="col-md-12 col-sm-12 ftco-animate d-md-flex" id="header">

        </div>
        <div class="col-md-12 col-sm-12 ftco-animate d-md-flex w3-light-grey" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
            <div  class="col-xl-8 col-lg-8 col-md-8 col-sm-6 "  id="middleLeft">

            </div>
            <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-6 " style="alignment: right">
                <div>
                    <button type="button" id="editPost" class="btn btn-primary" style="width: 100%">
                        Edit this post
                    </button>
                </div>
                <div style="margin-top: 5px">
                    <p style="color: #1b4b72; size: 13px; font-style: italic"> <a>5 people are interested</a></p>
                </div>
                <div id="middleRight" ></div>
                <div id="statusOption" style="display: none">
                    <from id="poststatus" >
                        <p class="border-bottom-line ">Please select one</p>
                        <div id="reserved" style="display: none">
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="I received response"> I received response<br>
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="I am not available now"> I am not available now<br>
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="This post will available soon"> This post will available soon<br>
                        </div>
                        <div id="occupied" style="display: none">
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="I am committed to someone"> I am committed to someone<br>
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="I handover this to Receiver"> I handover this to Receiver<br>
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="I received support"> I received support<br>
                        </div>
                        <div id="deleted" style="display: none">
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="I am not interested anymore"> I am not interested anymore<br>
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="This is not useful "> This is not useful <br>
                            <input class="messageCheckbox" type="radio" style="margin: 7px" name="reason" value="Some other reason"> Some other reason<br>

                        </div>
                      </from>
                </div>
                <div class="border-bottom-line ">
                    <p id="getUserMobile1" style="margin-bottom: 0px; margin-top: 6px; display: none">Who received or donate this</p>
                    <p id="getUserMobile2" style="color: #4c110f; font-size: 11px; font-style: italic; margin-bottom: 0px; display: none">Enter the registered mobile no</p>
                    <from style="display: flex">
                        <input type="text" class="form-control " id="respons_mobile" name="mobile" style="display: none; flex: 1" placeholder="Mobile Number" autocomplete="mobile" pattern="(01)[0-9]{9}">
                        <button type="button" id="respons_mobile_submit" style="display: none">Submit</button>
                    </from>
                    <p id="userFound" style="color: #1b4b72; font-size: 14px; font-style: italic; margin-bottom: 0px;display: none"></p>

                    <p id="userNotFound" style="color: red; font-size: 11px; font-style: italic; margin-bottom: 0px;display: none">User not found, enter correct mobile number to avoid fraudulent activities. This is very important for this service</p>
                    <p id="successMessage" style="color: green; font-size: 13px; font-style: italic; margin-bottom: 0px; display: none">Successfully updated</p>
                </div>


            </div>
        </div>
        <div class="col-md-12 col-sm-12 ftco-animate d-md-flex" style="margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px" >
            <div  class="col-xl-10 col-lg-10 col-md-12 col-sm-12 ">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" id="buttomLeft">
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 " id="buttomRight">

                </div>
            </div>
        </div>

        <div class="w3-content" >

        </div>
        <input type="hidden" id="postId" value="{{$postId}}">
    </div>


    <script src="{{ url('/') }}/js/common.js"></script>
    <script src="{{ url('/') }}/js/UserPostView.js"></script>

    <script>
        var status='', note='';

        function changeStatus(postId) {
            status = document.getElementById('post_type').value;
            $("#reserved").css("display", "none");
            $("#occupied").css("display", "none");
            $("#deleted").css("display", "none");
            $("#statusOption").css("display", "none");

            $("#getUserMobile1").css("display", "none");
            $("#getUserMobile2").css("display", "none");
            $("#respons_mobile").css("display", "none");
            $("#userNotFound").css("display", "none");
            $("#userFound").css("display", "none");

            $("#respons_mobile_submit").css("display", "none")

            if(status=='Reserved'){
                $("#statusOption").css("display", "block");
                $("#reserved").css("display", "block");
            }
            else if(status=='Occupied'){
                $("#statusOption").css("display", "block");
                $("#occupied").css("display", "block");
            }
            else if(status=='Delete'){
                $("#statusOption").css("display", "block");
                $("#deleted").css("display", "block");
            }
            else if(status == 'Available'){
                note='';
                var data ={
                    'user_id': null
                }
                postStatusUpdate(data)
            }

        }

        $('#editPost').click(function() {
            window.location = "http://donor.test/user/post/update/" + postId;
        });




        $('#poststatus input').on('change', function() {
            note = $('input[name=reason]:checked', '#poststatus').val();
            if(note == 'I am committed to someone' || note =='I handover this to Receiver' || note=='I received support'){
                $("#getUserMobile1").css("display", "block");
                $("#getUserMobile2").css("display", "block");
                $("#respons_mobile").css("display", "block");
                $("#respons_mobile_submit").css("display", "block")
            }
            else{
                var data ={
                    'user_id': null
                }
                postStatusUpdate(data)

            }
        });

        $('#respons_mobile_submit').click(function() {

            var url= 'http://donor.test/api/v1/user/post/mobile-search/'+$('#respons_mobile').val();

            var request =httpRequest('GET', url, false)
            //alert(request.status)
            if(request.status==400){
                $("#userNotFound").css("display", "block");
            }
            else if(request.status==200){
                var datas = JSON.parse(request.response);
                $("#userNotFound").css("display", "none");
                $("#userFound").css("display", "block");
                $("#userFound").html(datas['data']['name']);

                var data ={
                    'user_id': datas['data']['id']
                }
                postStatusUpdate(data)
            }
            //alert(data['data']['id'])
            //window.location = "http://donor.test/user/post/update/" + postId;
        });


        function postStatusUpdate(data) {
            data['post_id']=postId;
            data['status']= status;
            data['note']=note;
            var data = JSON.stringify(data);
            var url= 'http://donor.test/api/v1/user/post/status-update/'+postId;
            alert('3')
            var request =httpRequest('POST',url,data);
            alert(request.response)

        }
    </script>
@endsection
