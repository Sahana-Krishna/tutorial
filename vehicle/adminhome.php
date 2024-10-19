<?php
// session_start();
// if(!isset($_SESSION['AdminLoginId']))
// {
//     header("location: admin_login.php");
// }
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin_style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<?php require_once('adminpanel.php') ?>
<center style='color: white;font-size:25px;'>
    <h1> Vehicle Service Management System </h1>
</center>
<p style='color:white;line-height:1100px;float:right;margin-right:20px;'> @ RPS - PHP Developed By:<a href="#" style='color:blue;'> Rakshith</a></p>


<?php
/*if(isset($_POST['Logout']))
{
    session_destroy();
    header("location: admin_login.php");
}*/

?>

</body>
</html>