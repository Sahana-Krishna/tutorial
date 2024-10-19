<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$id = "";
$name = "";
$phone = "";
$email = "";
$address = "";
$status = "";

$errorMessage = "";
$successMessage ="";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    //GET method: Show the data of the Mechanic

    if ( !isset($_GET["id"]) ) {
        header("location: mechanic_index.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the selected Mechanic from database table
    $sql = "SELECT * From mechanic_list WHERE id=$id";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();

    if ( !$row) {
        header("location: mechanic_index.php");
        exit;
    }
 
    $name = $row["name"];
    $phone = $row["contact"];
    $email = $row["email"];
    $address = $row["address"];
    $status = $row["status"];

}
else {
    //POST method: Update the data of the Mechanic

    $id = $_POST["id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $status = $_POST["status"];

    do {

        if ( empty($id) || empty($name) || empty($phone) || empty($email) || empty($address) ) {
            $errorMessage = "All the fields are required";
            break;
        }


        $sql = "UPDATE mechanic_list 
               SET name = '$name', contact = '$phone', email = '$email', address = '$address', status ='$status'
               WHERE id = $id";

        $res = $conn->query($sql);

        if ( !$res) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $name = "";
        $phone = "";
        $email = "";
        $address = "";
        $status ="";

        $successMessage = "Mechanic updated correctly";

        echo"<script> alert('Mechanic Updated Successfully!');
window.location.replace('mechanic_index.php');
</script>";
        //header("location: /vehicle/index.php");
        exit;


    } while (true);

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Create New Mechanic</h2>


        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>



        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>" pattern="[6-9]{1}[0-9]{9}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <select name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
    </select>
                </div>
            </div>



            <?php
            if ( !empty($successMessage) ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }



            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="mechanic_index.php" role="button">Cancel</a>
                </div>
            </div>




        </form>

    </div>
</body>
</html>