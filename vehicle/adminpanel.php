<?php
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
    header("location: admin_login.php");
}
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
<body id="bro" style='background-image:url(https://png.pngtree.com/background/20220721/original/pngtree-composite-drawing-of-automobile-glare-technology-picture-image_1695395.jpg);background-size:cover;'>
    <nav>
        
        
        <label class="logo">Admin - <?php echo $_SESSION['AdminLoginId']?></label>
        <ul>
            <li><a style='text-decoration:none;' class="active" href="adminhome.php">Home</a></li>
            <li><a style='text-decoration:none;' href="about.php">About Us</a></li>
            <li><a style='text-decoration:none;' href="mechanic_index.php">Mechanic List</a></li>
            <li><a style='text-decoration:none;' href="service_request_index.php">Service Request</a></li>
            <li><a style='text-decoration:none;' href="category_index.php">Category List</a></li>
            <li><a style='text-decoration:none;' href="service_list_index.php">Service List</a></li>
            <li><a style='text-decoration:none;' class="logout" href="admin_login.php" >LOG OUT</a></li>
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