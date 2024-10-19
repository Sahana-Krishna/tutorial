
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
    <title>vehicle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body style='background-image:url(https://png.pngtree.com/background/20210710/original/pngtree-racing-club-recruitment-poster-picture-image_1017180.jpg);'>


    <div class="container my-5">
    <div class="row mb-3">
                <div class="offset-sm-10 col-sm-2 d-grid ">
                    <a class="btn btn-primary" href="userpanel.php" role="button">Go Back</a>
                </div>
            </div>
    <h1 style='color:white;font-size:45px;'><center> Vehicle Service Management System </center></h1>

        <h2 style='color: white;'>List of service request under <?php echo $_SESSION['user_name']?></h2>
        <a class="btn btn-primary" href="user_service_request_create.php" role="buttom">Create New</a>
        <br>
        <table class="table">
            <thead>
                <tr style='color: white;'>
                    <th>id</th>
                    <th>Date Created</th>
                    <th>Owner Name</th>
                    <th>Services</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
<tbody>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicle";

    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$uname= $_SESSION['user_name'];
//read all row from database table
$sql = "SELECT S.* From service_requests S where S.uid = (SELECT U.id From user_login U where name = '$uname')";
$res = $conn->query($sql);

if (!$res) {
    die("Invalid query: " . $conn->error);
}

//read data of each row
$num=1;
while($row = $res->fetch_assoc()) {
    echo "
    <tr style='color: white;'>
        <td>$num</td>
        <td>$row[date_created]</td>
        <td>$row[owner_name]</td>
        <td>$row[services]</td>
        <td>$row[status]</td>
        
        <td>
            <a class='btn btn-primary btn-sm' href='user_service_request_edit.php?id=$row[id]'>Edit</a>
            <a class='btn btn-danger btn-sm' href='user_service_request_delete.php?id=$row[id]'>Delete</a>
</td>
</tr>
    ";
    $num++;
}

    ?>
    
</tbody>
</table>
</div>
</body>
</html>