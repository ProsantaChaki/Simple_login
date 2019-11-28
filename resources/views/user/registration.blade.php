<div class="modal" id="register" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Registration</h4>
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form  action="#" onsubmit="return userRegistration(this);">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-sm-right">Name</label>

                            <div class="col-sm-6">
                                <input id="r_name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Your Name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-sm-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-6">
                                <input id="r_email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" pattern="\S+@\S+\.\S+" placeholder="Enter Your Email Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label text-sm-right">Mobile Number</label>

                            <div class="col-sm-6">
                                <input id="r_mobile" type="tel" class="form-control" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" pattern="(01)[0-9]{9}" placeholder="Enter Your Mobile Number">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-sm-right">{{ __('Password') }}</label>

                            <div class="col-sm-6">
                                <input id="r_password" type="password" class="form-control" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-4 col-form-label text-sm-right">{{ __('Confirm Password') }}</label>

                            <div class="col-sm-6">
                                <input id="r_c_password" type="password" class="form-control" name="c_password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Retype Password" required>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="messageCheckbox" type="checkbox" id="rememberme" value="1"> Remember Me
                            </label>
                        </div>

                        <div class="form-group row sm-0">
                            <div class="col-sm-6 offset-sm-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
