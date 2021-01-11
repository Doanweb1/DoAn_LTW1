
<?php 
require_once 'controllers/authController.php' 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>


<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <?php if (count($errors)>0): ?>
                        <div class = "alert alert-danger">

                        <?php foreach ($errors as $error ):?> 
                        <li>
                            <?php echo $error; ?>
                        </li>
                        <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <form  action="registration.php" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <!-- <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label> -->
                                <input type="text" name="username" value="<?php echo $username;?>" placeholder="User Name" />
                            </div>
                            <div class="form-group">
                                <!-- <label for="email"><i class="zmdi zmdi-email"></i></label> -->
                               <input type="email"  name="email" value="<?php echo $email;?>"  placeholder="Your Email" />
                            </div>
                             <div class="form-group">
                                <!-- <label for="pass"><i class="zmdi zmdi-lock"></i></label> -->
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <!-- <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label> -->
                                <input type="password" name="re_password" id="re_password" placeholder="Repeat your password" />
                            </div>
                            <!-- <div class="form-group">
                                <!-- <label for="email"><i class="zmdi zmdi-email"></i></label> -->
                               <!-- <input type="text" name="address" id="Address" placeholder="Your Address" /> -->
                            <!-- </div> -->
                            <!-- <div class="form-group">
                                <!-- <label for="email"><i class="zmdi zmdi-email"></i></label> -->
                                <!-- <input type="number" name="phone" id="Phone" placeholder="Your Phone Number" />
                            </div>                   -->
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="register" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/Register-login.png" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
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


<!--
