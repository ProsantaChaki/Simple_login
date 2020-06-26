<div class="modal" id="forgotPassword" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Password Reset</h4>
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form id="loginForm">
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label text-sm-right" id="_message" style="color: #4c110f; text-align: center">Enter Your Email or Mobile Number to Recover Your Password</label>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">Email/Mobile</label>
                            <div class="col-sm-6">
                                <input id="fp_id" type="text" class="form-control" name="email" autocomplete="email"  placeholder="Email Address or Mobile Number">
                            </div>
                        </div>



                        <button type="button" class="btn btn-success btn-flat m-b-30 m-t-30" id="id_submit" >Get Verification Code</button>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="display: none">Get Verification Code</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('/') }}/js/staticText.js"></script>

<script>

    $('#id_submit').click(function() {
        var url = project_url+'api/v1/password/recovery';
        var data =JSON.stringify( {
            email : $('#fp_id').val()
        });
        var request = httpRequest('POST', url, data);
        var data =JSON.parse(request.response);

        if(data['data']){
            $('#passwordReset').modal('show');
            $('#forgotPassword').modal('hide');
        }
        else{
            alert('Enter Correct User Id')
            $('#_message').html('Enter Correct Email or Mobile No')
            $('#_message').css("color", 'red');
            $('#fp_id').focus()
        }
    });

</script>
