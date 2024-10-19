<?php

@include 'user_connection.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user_login WHERE email = '$email' OR password = '$pass'";

    $result = mysqli_query($con,$select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'user already exist!';
    }
    else{

        if($pass != $cpass){
            $error[] = 'password not matched!';
        }
        else{
            $insert = "INSERT INTO user_login(name, email, password) VALUES('$name','$email','$pass')";
            mysqli_query($con,$insert);
            echo"<script> alert('User Registered Successfully!');
            window.location.replace('user_login.php');
            </script>";
            //header('location:user_login.php');
        }
    }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="user_style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Register Now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">

            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account?<a href="user_login.php">Login Now</a></p>
        </form>
    </div>
    
</body>
</html>