<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>CATEGORIES</title>
</head>
<body>
    <div class="container my-5">
    <h2>The Categories</h2>
    <a class="btn btn-primary" href="/NewUsingPHP/BOOKS/books.php" role="button">New Category</a>
    <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
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
                $sql = "SELECT * FROM users"; // users = table name in the database
                $result = $con->query($sql);

                if ($result){
                    die("Invalid query: " . $con->error);
                }

                //read data of each row 
                while($row = $result->fetch_assoc()){
                    echo"
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/NewUsingPHP/CATEGORIES/edit.php?id=$row[id]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/NewUsingPHP/CATEGORIES/delete.php?id=$row[id]'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
                
            </tbody>    
        </table>
    </div>
</body>
</html>