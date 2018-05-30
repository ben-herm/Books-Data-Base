
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link">Login</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" id="register-form-link">Register</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="../Controllers/adminController.php" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <h3 id="loginError"></h3>
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="register-form"    action="../Controllers/registerController.php" method="post" role="form" style="display: none;" >
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <h3 id="error"> </h3>
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script>

                    $(function () {

                    $('#login-form-link').click(function (e) {
                    $("#login-form").delay(100).fadeIn(100);
                            $("#register-form").fadeOut(100);
                            $('#register-form-link').removeClass('active');
                            $(this).addClass('active');
                            e.preventDefault();
                    });
                            $('#register-form-link').click(function (e) {
                    $("#register-form").delay(100).fadeIn(100);
                            $("#login-form").fadeOut(100);
                            $('#login-form-link').removeClass('active');
                            $(this).addClass('active');
                            e.preventDefault();
                    });
                            var getUrlParameter = function getUrlParameter(sParam) {
                            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                                    sURLVariables = sPageURL.split('&'),
                                    sParameterName,
                                    i;
                                    for (i = 0; i < sURLVariables.length; i++) {
                            sParameterName = sURLVariables[i].split('=');
                                    if (sParameterName[0] === sParam) {
                            return sParameterName[1] === undefined ? true : sParameterName[1];
                            }
                            }
                            };
                            
                            var err = getUrlParameter('err');
                            var PASSErrDiv = document.getElementById("error");
                            var loginErrDiv = document.getElementById("loginError");
                            
                      if (err == 'WrongRegisterDetails')
                    {
                         $('#register-form-link').trigger("click");
                         PASSErrDiv.innerHTML = "Wrong username or password!";
                         
                    } else if (err == 'WrongLoginDetails')
                    
                    {
                         $('#login-form-link').trigger("click");
                         loginErrDiv.innerHTML = "Wrong username or password!";
                         
                    } else if (err == 'WrongEmailDetails')
                    
                    {
                         $('#register-form-link').trigger("click");
                         PASSErrDiv.innerHTML = "Please Insert A Correct Email!";
                       }

                      else {
                         $('#login-form-link').trigger("click");
                      }

                    });



        </script>
    </body>
</html>
