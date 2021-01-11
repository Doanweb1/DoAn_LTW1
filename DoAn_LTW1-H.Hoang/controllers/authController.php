<?php
  
    session_start();
    
    require_once "controllers/emailController.php";
    $conn = new mysqli('localhost', 'root', '', 'db_check');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }
       echo "Connected successfully";
     require_once'vendor/autoload.php';
    $errors = array();
    $username  = "";
    $email = "";
    if(isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['re_password'];
        
        if (empty($username)) {
            $errors['username'] = "Username required";

        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email adress is invalid";
        }
        if (empty($email)) {
            $errors['email'] = "Email required";

        }
        if (empty($password)) {
            $errors['password'] = "Password required";

        }
        if (empty($repassword)) {
            $errors['re_password'] = "Repassword required";

        }
        // if (empty($address)) {
        //     $errors['address'] = "Address required";

        // }
        // if (empty($phone)) {
        //     $errors['phone'] = "Phone required";

        // }
        // if (empty($birth)) {
        //     $errors['birthday'] = "Birthdate required";

        // }
        if ($password !== $repassword) {
            $errors['password'] = "The two password do not matches";
        }
        $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($emailQuery);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $userCount = $result->num_rows;
        $stmt->close();
        if ($userCount > 0) {
            $error['email'] = "Email already exists";
        }       

       if (count($errors) === 0) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(50));
            $verified = false;
             $stmt = $conn->prepare("INSERT INTO users  (username ,email ,password,token) VALUE (?, ?,?, ?)");
             $stmt->bind_param('ssss',$username ,$email ,$password ,$token );
             $result = $stmt->execute();
      if($result)
             {        //var_dump($result);
        try{
            
                //login user;
                $user_id = $stmt->insert_id;
                $stmt->close();

               // print_r ("$user_id");
                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                // $_SESSION['address'] = $address;
                // $_SESSION['phone'] = $phone;
                // $_SESSION['birthday'] = $birth;
                $_SESSION['verified'] = false;
                $_SESSION['token'] = $token;
                sendVerificationEmail($email,$token);
                $_SESSION['message'] = "You are now logged in!";
                $_SESSION['alertSuccess'] = "alertSuccess";
                header('location: index.php');
                
            }
            catch(Exception $e){
                echo "$e";
         }
        }else {
                $_SESSION['error_msg'] = "Database error: Could not register user";
           }
             
        }
    }

        // if user click login

        if (isset($_POST['login'])) {

                if (empty($_POST['email'])) {
                    $errors['email'] = "Email required";

                }
                if (empty($_POST['password'])) {
                    $errors['password'] = "Password required";

                }
                $email= $_POST['email'];
                $password = $_POST['password'];
                if (count($errors) === 0) {
                
                    $sql = "SELECT * FROM users WHERE email=? or username=? LIMIT 1";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss', $email, $password);
                    //var_dump($stmt);
                   if( $stmt->execute()){
                        $result = $stmt->get_result();
                        $user = $result->fetch_assoc();
                   //     var_dump($result);
                        if (password_verify($password, $user['password'])) {
                            $stmt->close();
                            // login success
                            
                            $_SESSION['id'] = $user['id'];
                            $_SESSION['username'] = $user['username'];
                            $_SESSION['email'] = $user['email'];
                            $_SESSION['verified'] = $user['verified'];
                            $_SESSION['message'] = "You are now logged in!";
                            $_SESSION['alertSuccess'] = "alertSuccess";
                            header('location: index.php');
                            exit(0);
                        } else {
                            $errors['login_failed'] = " Wrong credentials";
                        }
                     }else{
                        $_SESSION['message'] = "Database error. Login failed!";
                        $_SESSION['type'] = "alert-danger";
                     }
              }
        }
        if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['verified']);
        header('location: login.php');
        exit();
        }

        // Verify user by token
 function verifyUser($token)
 {
     global $conn;
     $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
     $result = mysqli_query ($con, $sql);
     if (mysqli_num_rows ($result) > 0) {
         $user = mysqli_fetch_assoc ($result);
         $update_query = "UPDATE users SET verified=1 WHERE token='$token'";
         if (mysqli_query ($con, $update_query)) {
             //logger
             $_SESSION['id'] = $user['id'];
             $_SESSION['username'] = $user['username'];
             $_SESSION['email'] = $user['email'];
             $_SESSION['verified'] = 1;
             $_SESSION['message'] = "Your email address was successfully verified!";
             $_SESSION['alertSuccess'] = "alertSuccess";
             header ('location: index.php');
             exit();
         } else {
             echo 'User not found ';
         }
     }
 }
 // Click btn forgot password
        if(isset($_POST['forgot_password-btn'])){
        $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email adress is invalid";
            }
            if (empty($email)) {
                $errors['email'] = "Email required";

            }
            if (count($errors)==0){
                $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc ($result);
                $token = $user['token'];
                senPasswordResetLink($email, $token);
                header('location: password_message.php');
                exit(0);

            }
        }
        if (isset($_POST['reset_password-btn'])){
            $password = $_POST['password'];
            $repassword = $_POST['confirm_password'];
            if (empty($password) || empty($repassword)) {
                $errors['password'] = "Password required";

            }
            if (empty($repassword)) {
                $errors['repassword'] = "Repassword required";
            }
            $password = password_hash ($password,PASSWORD_DEFAULT);
            $email = $_SESSION['email'];

            if (count($errors)==0){
                $sql = "UPDATE users SET password='' WHERE email=''";
                $result = mysqli_query($conn,$sql);
                if($result){
                    header('location: login.php');#
                    exit(0);
                }
            }
        }
            function resetPassword($token)
            {
                        global  $conn;
                        $sql= "SELECT * FROM users WHERE token='$token' LIMIT 1";
                        $result = mysqli_query($conn,$sql);
                        $user = mysqli_fetch_assoc ($result);
                        $_SESSION['email'] = $user['email'];
                        header('Location: resetpassword.php ');
                        exit(0);
            }

        