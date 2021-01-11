
<?php require_once 'controllers/authController.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot_password</title>

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
                        <h2 class="form-title" style = "text-decoration : none; font-size : 25px;">Recover your password</h2>
                        <?php if (count($errors)>0): ?>
                        <div class = "alert alert-danger">

                        <?php foreach ($errors as $error ):?> 
                        <li>
                            <?php echo $error; ?>
                        </li>
                        <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <form  action="forgot_password.php"  method="POST" class="register-form" id="register-form">
                           
                            <div class="form-group">
                                <!-- <label for="email"><i class="zmdi zmdi-email"></i></label> -->
                               <input type="email"  name="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="forgot_password-btn" id="register" class="form-submit" value="Recovery your password" />
                            </div>
                        </form>
                    </div>
                    <!-- <div class="signup-image">
                       // <figure><img src="images/Register-login.png" alt="sing up image"></figure>
                       // <a href="#" class="signup-image-link">I am already member</a>
                    </div> -->
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
