<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicle";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM service_requests WHERE id=$id";
    $conn->query($sql);

}

echo"<script> alert('Service Request Deleted Successfully!');
window.location.replace('service_request_index.php');
</script>";

//header("location: /vehicle/service_request_index.php");
exit;
?>