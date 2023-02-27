<?php
 $servername = "localhost";
 $username = "jasmine";
 $password = "JP@ssw0rd";
 $database = "librarysystem";
 
 // Create connection
 $con = new mysqli($servername,$username,$password,$database);




$category_name = "";
$errorMessage = "";
$successMessage = "";

if ($_POST){
    if(isset($_POST["category_name"])){
    $category_name = $_POST["category_name"];
    }
    do { # we did do loop for the instruction or group of instructions to be executed repeatedly.
        if (empty($category_name)){
            $errorMessage = "Category name is required";
            break;
        }

        //Add new category to the database
        $sql = "INSERT INTO categories (category_name, created_at, modified_at) " . "VALUES ('$category_name', now(),now())";
        $result = $con->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $successMessage = "Category added successfully";

        header("location: /NewUsingPHP/admin/categories/categories.php");
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
    <title>New Category</title>
</head>
<body>
    <div class="container my-5"> 
        <h2>New Category</h2>

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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-6"> 
                    <input type="text" class="form-control" name="category_name" value="<?php echo $category_name; ?>">
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
                    <a class="btn btn-outline-primary" href="/NewUsingPHP/admin/categories/categories.php" role="button"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>