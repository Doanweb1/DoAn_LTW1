
<?php require_once 'controllers/authController.php' ;
unset($_COOKIE['IDCustomer']); 
setcookie('IDCustomer', null, -1, '/'); 

unset($_COOKIE['email']); 
setcookie('email', null, -1, '/'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/login.png" alt="sing up image " height="750px"></figure>
                        <a href="registration.php" style = "text-decoration : none; font-size : 18px;" class="signup-image-link">Create an account</a>
                        <a href="forgot_password.php" style = "text-decoration : none; font-size : 18px;" class="signup-image-link">Forgot Password</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form action="login.php" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>


