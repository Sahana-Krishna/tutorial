<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicle";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM service_list WHERE id=$id";
    $conn->query($sql);

}

echo"<script> alert('Service Deleted Successfully!');
window.location.replace('service_list_index.php');
</script>";

//header("location: /vehicle/service_list_index.php");
exit;
?>