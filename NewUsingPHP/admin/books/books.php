<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>BOOKS</title>
</head>
<body>
    <div class="container my-5">
    <h2>The Books</h2>
    <a class="btn btn-primary my-4" href="/NewUsingPHP/admin/books/create.php" role="button">Add Book</a>
    <a style="margin-left: 81%;" class="btn btn-danger" href="/NewUsingPHP/logout.php" role="button">Log out</a>
    <br>
        <table class="table my-1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Modified At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $servername = "localhost";
                $username = "jasmine";
                $password = "JP@ssw0rd";
                $database = "librarysystem";
                
                // Create connection
                $con = new mysqli($servername,$username,$password,$database);

                // Check connection
                if ($con->connect_error){
                    die("Failed to connect: " . $con->connect_error);
                }

                //read all row from database table 
                $sql = "SELECT books.*, categories.category_name FROM books JOIN categories ON categories.id=books.category_id"; // books = table name in the database
                $result = $con->query($sql);     # category_name is from categories table

                if (!$result){
                    die("Invalid query: " . $con->error);
                }

                //read data of each row 
                while($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[book_title]</td>
                        <td>$row[author]</td>
                        <td>$row[category_name]</td> 
                        <td>$row[created_at]</td>
                        <td>$row[modified_at]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/NewUsingPHP/admin/books/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/NewUsingPHP/admin/books/delete.php?id=$row[id]'>Delete</a> 
                        </td>
                    </tr>
                    ";
                }  # <td>$row[book_title]</td> --> could be a button to open the pdf, sample:  <td> <a class='btn btn-primary btn-sm'> $row[book_title] </a></td> 
                ?>
            </tbody>    
        </table>
    </div>
    <div class="container my-5">
        <a class="btn btn-danger" href="/NewUsingPHP/admin/categories/categories.php" role="button">Go Back</a>
    </div>
</body>
</html>