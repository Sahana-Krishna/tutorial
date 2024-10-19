<?php

@include 'user_connection.php';

session_start();

if(isset($_POST['login'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user_login WHERE name = '$name' && password = '$pass'";

    $result = mysqli_query($con,$select);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_array($result);
        //session_start();

        $_SESSION['user_name'] = $row['name'];
        header('location:userhome.php');
    
    }
    else{
        //$error[] = 'incorrect user name or password!';
        echo"<script>alert('Incorrect user name or password');</script>";
    }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Login Panel</title>
    <link rel="stylesheet" type="text/css" href="user_login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>
<body style='background-image:url(https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);'>
    <div class="login-form">
        <h2 style='background-color: black;'>User Login</h2>
        <form method="POST">

            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="name">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password">
            </div>
            
            <button type="submit" name="login">Login</button>

            <div class="extra">
                <a href="#">Forgot Password ?</a>
                <a href="register_form.php">Register Now</a>
            </div>
        </form>
</div>


<?php

/*if(isset($_POST['Signin']))
{
    $query="SELECT * FROM `user_login` WHERE `User_Name`='$_POST[UserName]' AND `User_Password`='$_POST[UserPassword]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION["UserLoginId"]=$_POST['UserName'];
        header("location: adminpanel.php");
    }
    else
    {
        echo"<script>alert('Incorrect Password');</script>";
    }
    
}*/
?>

    
</body>
</html>

