<?php
$servername = "localhost";
$username = "jasmine";
$password = "JP@ssw0rd";
$database = "librarysystem";

// Create connection
$con = new mysqli($servername,$username,$password,$database);


$id = "";
$name = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // GET method: Show the data of the client

    if (!isset($_GET["id"])){
        header("location: /NewUsingPHP/ADMIN/CATEGORIES/categories.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the selected category from the database table
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: /NewUsingPHP/ADMIN/CATEGORIES/categories.php");
        exit;
    }

    $name = $row["name"];
}
else {
    // POST method: Update the data of the client

    $id = $_POST['id'];
    $name = $_POST['name'];

    do {
        if ( empty($id)|| empty($name)){
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE users " . "SET name = '$name' " . "WHERE id = $id";

        $result = $con->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $successMessage = "Category updated successfully";

        header("location: /NewUsingPHP/ADMIN/CATEGORIES/categories.php");
        exit;
         
    } while (false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>New Categories</title>
</head>
<body>
    <div class="container my-5"> 
        <h2>New Categories</h2>

        <?php 
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        
        <form method="post">
            <input type ="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-6"> 
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>


            <?php
                if (!empty($successMessage)){
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/NewUsingPHP/CATEGORIES/categories.php" role="button"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>