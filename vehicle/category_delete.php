<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehicle";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM categories WHERE id=$id";
    $conn->query($sql);

}

echo"<script> alert('Category Deleted Successfully!');
window.location.replace('category_index.php');
</script>";

//header("location: /vehicle/category_index.php");
exit;
?>