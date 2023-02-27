<?php
 $servername = "localhost";
 $username = "jasmine";
 $password = "JP@ssw0rd";
 $database = "librarysystem";
 
//Create connection
$con = new mysqli($servername,$username,$password,$database); 


 $book_title = "";
 $author = "";
 $category = "";
 $pdf= "";

$errorMessage = "";
$successMessage = "";

if ($_POST){
    if(isset($_POST["book_title"]) && isset($_POST["author"]) && isset($_POST["category"]) && isset($_POST['submit'])){
        $book_title = $_POST["book_title"];
        $author = $_POST["author"];
        $category = $_POST["category"];
        $pdf=$_FILES['pdf']['name'];
        $pdf_type=$_FILES['pdf']['type'];
        $pdf_size=$_FILES['pdf']['size'];
        $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
        $pdf_store="pdf/".$pdf;

        move_uploaded_file($pdf_tem_loc,$pdf_store);  
    }

    do {
        if (empty($book_title) || empty($author) || empty($category)){
            $errorMessage = "All of the fields are required";
            break;
        }

        //Add new category to the database
        $sql = "INSERT INTO books (book_title, author, category_id, created_at, modified_at, pdf) VALUES ('$book_title', '$author', '$category', now(),now(), '$pdf')";
        $result = $con->query($sql);
       

        if (!$result){
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $successMessage = "Book added successfully";

        header("location: /NewUsingPHP/admin/books/books.php");
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
    <title>New Book</title>
</head>
<body>
    <div class="container my-5"> 
        <h2>New Book</h2>

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
        
        <form method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Book Title</label>
                <div class="col-sm-6"> 
                    <input type="text" class="form-control" name="book_title" value="<?php echo $book_title; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Author</label>
                <div class="col-sm-6"> 
                    <input type="text" class="form-control" name="author" value="<?php echo $author; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-6"> 
                    <select name="category" class="form-control">
                    <?php 
                      $sql = "SELECT * FROM categories"; // categories = table name in the database
                      $result = $con->query($sql);
      
                      if (!$result){
                          die("Invalid query: " . $con->error);
                      }
      
                      //read data of each row 
                      while($row = $result->fetch_assoc()){
                          echo "<option value=''></option>
                          <option value='".$row['id']."'>".$row['category_name']."</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Upload Book</label>
                <div class="col-sm-6"> 
                    <input id="pdf" type="file" class="form-control" name="pdf" value="" required>
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
                    <button id="upload" type="submit" name="submit" class="btn btn-primary" value="Submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/NewUsingPHP/admin/books/books.php" role="button"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>