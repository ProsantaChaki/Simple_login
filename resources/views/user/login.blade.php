<div class="modal" id="login" class="modal fade text-center">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Login</h4>
            </div>

            <div class="modal-body">
                <div class="login-form">
                    <form id="loginForm" onsubmit="userLogin()">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">User Id</label>

                            <div class="col-sm-6">
                                <input  type="text" id="email" class="form-control" placeholder="Email or Mobile Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-sm-right">Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="messageCheckbox" type="checkbox" id="rememberme" value="1"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a style="font-size: 14px; color: #4c110f" data-toggle="modal" data-target="#forgotPassword" data-dismiss="modal" >Forgotten Password?</a><br>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <label class="pull-right">
                            <a style="font-size: 14px; color: #fb9678" data-toggle="modal" data-target="#register" data-dismiss="modal" > Don't have an account yet?</a>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
