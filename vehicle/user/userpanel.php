<?php
session_start();
if(!isset($_SESSION['user_name']))
{
    header("location: user_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="userpanel.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body id="bro" style='background-image:url(https://png.pngtree.com/background/20220721/original/pngtree-composite-drawing-of-automobile-glare-technology-picture-image_1695395.jpg);image-width:100%;image-height:100%;'>
    <nav>
        
        
        <label class="logo">User - <?php echo $_SESSION['user_name']?></label>
        <ul>
            <li><a style='text-decoration:none;' class="active" href="userhome.php">Home</a></li>
            <li><a style='text-decoration:none;' href="user_about.php">About Us</a></li>
            <li><a style='text-decoration:none;' href="user_service_request_index.php">Display</a></li>
            <li><a style='text-decoration:none;' class="logout" href="user_login.php" >LOG OUT</a></li>
</ul>
</nav>

<?php
/*if(isset($_POST['Logout']))
{
    session_destroy();
    header("location: admin_login.php");
}*/

?>

</body>
</html>