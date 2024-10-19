<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicle";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM mechanic_list WHERE id=$id";
    $conn->query($sql);

}

echo"<script> alert('Mechanic Deleted Successfully!');
window.location.replace('mechanic_index.php');
</script>";

//header("location: /vehicle/index.php");
exit;
?>