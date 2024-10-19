<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "vehicle";

 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$service = "";
$description = "";
$status = "";

$errorMessage = "";
$successMessage ="";

if ( $_SERVER[ 'REQUEST_METHOD'] == 'POST') {
    $service = $_POST["service"];
    $description = $_POST["description"];
    $status = $_POST["status"];

    do {
        if ( empty($service) || empty($description) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new service to database

        // insert values to database
$sql = "INSERT INTO service_list (service, description, status)  
       VALUES ('$service','$description','$status')";

$res = $conn->query($sql);

if (!$res) {
    $errorMessage = "Invalid query: " . $conn->error;
    break;
}

        $service = "";
        $description = "";
        $status = "";

        $successMessage = "Service added correctly";
        echo"<script> alert('Service Created Successfully!');
window.location.replace('service_list_index.php');
</script>";
        //  echo"<script> alert('$successMessage');</script>";

        // header("location: /vehicle/service_list_create.php");
        exit;

    }while (false);

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
        <h2>Create New Service</h2>

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
                <label class="col-sm-3 col-form-label">Service Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="service" value="<?php echo $service; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
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
                    <a class="btn btn-outline-primary" href="service_list_index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>