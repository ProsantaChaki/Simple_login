@extends('layouts.userDashboardLayout')

@section('content')
    <div class="container" style="background-color: #ffffff; max-width: 800px">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header"><h4>Update Information </h4></div>
                    <hr/>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-sm-right">Password</label>
                                <div class="col-sm-6">
                                    <input type="text" name="old_password" id="old_password" class="form-control" placeholder="Old Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-sm-right">New Password</label>

                                <div class="col-sm-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Enter New Password" required>

                                </div>
                            </div>

                            <div class="form-group row" >
                                <label for="password-confirm" class="col-sm-4 col-form-label text-sm-right">Confirm New Password</label>

                                <div class="col-sm-6">
                                    <input id="c_new_password" type="password" class="form-control" name="c_new_password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Retype New Password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" id="password_change">Update Password</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/') }}/js/common.js"></script>
    <script>

        $('#password_change').click(function() {

            var url = 'http://donor.test/api/v1/password/change';
            var data =JSON.stringify( {
                old_password: $('#old_password').val(),
                new_password : $('#new_password').val(),
                c_new_password: $('#c_new_password').val(),
            });
            $('#old_password').val('');
            $('#new_password').val('');
            $('#c_new_password').val('');
            var request = httpRequest('POST', url, data);
            var data =JSON.parse(request.response);

            if(request.status==200){
                alert('Your Password has been Changed');

                window.location.replace("http://donor.test/profile");
            }
            else{
                alert('Incorrect Password')
            }
        });

    </script>

@endsection
