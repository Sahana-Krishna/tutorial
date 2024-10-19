<?php
require("admin_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Login Panel</title>
    <link rel="stylesheet" type="text/css" href="admin_login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body style='background-image:url(https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);background-size:cover;'>
    <div class="login-form">
        <h2 style='background-color: black;'>Admin Login</h2>
        <form style='background-color:white;' method="POST">
            <div class="input-field">
                <i style='background-color: whitesmoke;' class="fas fa-user"></i>
                <input style='background-color: whitesmoke;' type="text" placeholder="AdminName" name="AdminName">
            </div>
            <div class="input-field">
                <i style='background-color: whitesmoke;' class="fas fa-lock"></i>
                <input style='background-color: whitesmoke;' type="password" placeholder="Password" name="AdminPassword">
            </div>
            
            <button type="submit" name="Signin">Sign In</button>

            <div class="extra">
                <a href="#">Forgot Password ?</a>
                <a href="#">Create an Account</a>
            </div>
        </form>
</div>


<?php
if(isset($_POST['Signin']))
{
    $query="SELECT * FROM `admin_login` WHERE `Admin_Name`='$_POST[AdminName]' AND `Admin_Password`='$_POST[AdminPassword]'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION["AdminLoginId"]=$_POST['AdminName'];
        header("location: adminhome.php");
    }
    else
    {
        echo"<script>alert('Invalid username or password');</script>";
    }
    
}

?>

</body>
</html>

