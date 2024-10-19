<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vehicle";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$id = "";
$category_id = "";
$owner = "";
$phone = "";
$email = "";
$address = "";
$vname = "";
$regno = "";
$vmodel = "";
$service_id = "";
$service_type = "";
$pickup = "";
$mechanic_id = "";
$status = "";


$errorMessage = "";
$successMessage ="";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    //GET method: Show the data of the Service_request

    if ( !isset($_GET["id"]) ) {
        header("location: service_request_index.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the selected service_request from database table

    $sql = "SELECT S.id,S.category_id,S.owner_name,R.contact,R.email,R.address,R.vehicle_name,R.vehicle_regno,R.vehicle_model,S.services,R.service_type,R.pickup_address,S.mechanic_id,S.status From service_requests S,request_meta R WHERE S.id=$id AND S.id=R.sid";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();


    if ( !$row) {
        header("location: service_request_index.php");
        exit;
    }

    $category_id = $row["category_id"];
    $owner = $row["owner_name"];
    $phone = $row["contact"];
    $email = $row["email"];
    $address = $row["address"];
    $vname = $row["vehicle_name"];
    $regno = $row["vehicle_regno"];
    $vmodel = $row["vehicle_model"];
    $service_id = $row["services"];
    $service_type = $row["service_type"];
    $pickup = $row["pickup_address"];
    $mechanic_id = $row["mechanic_id"];
    $status = $row["status"];

}
else {
    //POST method: Update the data of the service_request

    $id = $_POST["id"];
    $category_id = $_POST["category_id"];
    $owner = $_POST["owner"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $vname = $_POST["vname"];
    $regno = $_POST["regno"];
    $vmodel = $_POST["vmodel"];
    $service_id = $_POST["service_id"];
    $service_type = $_POST["service_type"];
    $pickup = $_POST["pickup"];
    $mechanic_id = $_POST["mechanic_id"];
    $status = $_POST["status"];

    do {
        if ( empty($owner) || empty($phone) || empty($email) || empty($address) || empty($vname) || empty($regno) || empty($vmodel) || empty($service_id)) {
            $errorMessage = "All the fields are required";
            break;
        }


        $sql = "UPDATE service_requests S,request_meta R 
                SET service_type = '$service_type', services = '$service_id', mechanic_id = '$mechanic_id', status = '$status'
                WHERE S.id = $id AND S.id=R.sid";

        $res = $conn->query($sql);

        if ( !$res) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        
        $category_id = "";
        $owner = "";
        $phone = "";
        $email = "";
        $address = "";
        $vname = "";
        $regno = "";
        $vmodel = "";
        $service_id = "";
        $service_type = "";
        $pickup = "";
        $mechanic_id = "";
        $status = "";


$successMessage = "Service request updated correctly";

        echo"<script> alert('Service Request Updated Successfully!');
window.location.replace('service_request_index.php');
</script>";
        //header("location: /vehicle/service_request_index.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
</head>
<body>
    <div class="container my-5">
        <h2>Modify Service Request</h2>


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
                    <label for="category_id" class="col-sm-3 col-form-label">Vehicle Type</label>
                    <div class="col-sm-6">
                    <select name="category_id" id="category_id" class="form-select form-select-sm select2 rounded-0" required>
                        <option disabled selected></option>
                        <?php 
                        $category = $conn->query("SELECT * FROM categories where status = 'Active' order by category asc");
                        while($row = $category->fetch_assoc()):
                        ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($category_id) && $row['id'] == $category_id ? "selected" : "" ?>><?php echo  $row['category'] ?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                </div>




            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Owner Fullname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="owner" value="<?php echo $owner; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Owner Contact</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>" pattern="[6-9]{1}[0-9]{9}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Owner Email</label>
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
                <label class="col-sm-3 col-form-label">Vehicle Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="vname" value="<?php echo $vname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Vehicle Reg no</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="regno" value="<?php echo $regno; ?>" pattern="[A-Z]{2}-[0-9]{2}-[A-Z]{2}-[0-9]{4}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Vehicle Model</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="vmodel" value="<?php echo $vmodel; ?>">
                </div>
            </div>


            <div class="row mb-3">
                    <label for="service_id" class="col-sm-3 col-form-label">Services</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="service_id" placeholder="general check up" value="<?php echo $service_id; ?>">
                </div>
            </div>
                

            <div class="row mb-3">
                    <label for="service_type" class="col-sm-3 col-form-label">Request Type</label>
                    <div class="col-sm-6">
                    <select name="service_type" id="service_type" class="form-select form-select-sm select2 rounded-0" required>
                        <option <?php echo isset($service_type) && $service_type == 'Drop Off' ? 'selected' : '' ?>>Drop Off</option>
                        <option <?php echo isset($service_type) && $service_type == 'Pick Up' ? 'selected' : '' ?>>Pick Up</option>
                    </select>
                        </div>
                </div>
                
                <div class="row mb-3" <?php echo isset($service_type) && $service_type == 'Drop Off' ? 'style="display:none"' : '' ?>>
                    <label for="pickup" class="col-sm-3 col-form-label">Pick up Address</label>
                    <div class="col-sm-6">
                    <textarea rows="3" name="pickup" id="pickup" class="form-select form-select-sm select2 rounded-0" style="resize:none"><?php echo isset($pickup) ? $pickup : '' ?></textarea>
                    </div>
                </div>


            


            <div class="row mb-3">
                    <label for="mechanic_id" class="col-sm-3 col-form-label">Assigned To</label>
                    <div class="col-sm-6">
                    <select name="mechanic_id" id="mechanic_id" class="form-select form-select-sm select2 rounded-0" required>
                        <option disabled selected></option>
                        <?php 
                        $name = $conn->query("SELECT * FROM mechanic_list where status = 'Active' order by name asc");
                        while($row = $name->fetch_assoc()):
                        ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($mechanic_id) && $row['id'] == $mechanic_id ? "selected" : "" ?>><?php echo  $row['name'] ?></option>
                        <?php endwhile; ?>
                    </select>
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
                    <a class="btn btn-outline-primary" href="service_request_index.php" role="button">Cancel</a>
                </div>
            </div>




        </form>
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

        <script>
            new MultiSelectTag('service_id')  // id
        </script>
    </div>
</body>
</html>
<script>
    $(function(){  
            $('#service_type').change(function(){
                var type = $(this).val().toLowerCase()
                if(type == 'pick up'){
                    $('#pickup_address').parent().show()
                    $('#pickup_address').attr('required',true)
                }else{
                    $('#pickup_address').parent().hide()
                    $('#pickup_address').attr('required',false)
                }
            })
        })
        </script>

