<div class="modal" id="passwordReset" class="modal fade text-center">
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
                                <label class="col-sm-4 col-form-label text-sm-right">Enter Verification Code</label>
                                <div class="col-sm-6">
                                    <input type="text" name="code" id="code" class="form-control" placeholder="Varification Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-sm-right">New Password</label>

                                <div class="col-sm-6">
                                    <input id="fp_password" type="password" class="form-control" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>

                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="password-confirm" class="col-sm-4 col-form-label text-sm-right">Confirm New Password</label>

                                <div class="col-sm-6">
                                    <input id="fp_c_password" type="password" class="form-control" name="c_password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Retype Password" required>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" id="password_submit">Update Password</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('/') }}/js/staticText.js"></script>

<script>

    $('#password_submit').click(function() {

        var url = project_url+'api/v1/password/reset';
        var data =JSON.stringify( {
            email: $('#fp_id').val(),
            varificatio_code : $('#code').val(),
            password: $('#fp_password').val(),
            c_password: $('#fp_c_password').val()
        });
        var request = httpRequest('POST', url, data);
        var data =JSON.parse(request.response);

        if(request.status==200){
            alert('ok')
        }
        else{
            alert('Enter Correct Verification Code')
        }
    });


</script>
