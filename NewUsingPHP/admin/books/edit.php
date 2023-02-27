<?php
$servername = "localhost";
$username = "jasmine";
$password = "JP@ssw0rd";
$database = "librarysystem";

// Create connection
$con = new mysqli($servername,$username,$password,$database);


$id = "";
$book_title = "";
$author = "";
$category = "";
$pdf = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    // GET method: Show the data of the client

    if (!isset($_GET["id"])){
        header("location: /NewUsingPHP/admin/books/books.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the selected category from the database table
    $sql = "SELECT * FROM books WHERE id=$id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row){
        header("location: /NewUsingPHP/admin/books/books.php");
        exit;
    }

    $book_title = $row["book_title"];
    $author = $row["author"];
    $category = $row["category_id"];
    $pdf = $row["pdf"];

}
else {
    // POST method: Update the data of the client

    $id = $_POST['id'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $pdf = $_POST['pdf'];
 

    do {
        if ( empty($id) || empty($book_title) || empty($author) || empty($category) || empty($pdf)){
            $errorMessage = "All of the fields are required";
            break;
        }

        $sql = "UPDATE books SET book_title = '$book_title' , author = '$author' , category_id = '$category', modified_at = now(), pdf = '$pdf'" . "WHERE id = $id";


        $result = $con->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $successMessage = "Book updated successfully";

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
    <title>Update Book</title>
</head>
<body>
    <div class="container my-5"> 
        <h2>Update Book</h2>

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
                          echo "<option value='".$row['id']."'>".$row['category_name']."</option>";
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/NewUsingPHP/admin/books/books.php" role="button"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>