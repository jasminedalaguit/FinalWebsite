<?php 

session_start();

	include("connection.php");
	include("functions.php");

    $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "SELECT * from users where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: /NewUsingPHP/admin/categories/categories.php");
						die;
					}
				}
			}

                $errorMessage = "Wrong username or password! " . $con->error;
            }
    
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Login</title>
    <style>
        body{
            background-color: #034684;
        }
        h1{
            margin-top: 150px;
            text-align: center;
            color: white;
            word-spacing: 10px;
            font-family: times new roman;
        }
        .form-container{
            max-width: 400px;
            margin:0 auto;
            background-color: white;
            margin-top: 4%;
            padding:50px;
        }
        .input-element{
            padding:20px;
        }
        .input-element input{
            width: 100%;
        }
        label{
            color:#ffffff;
        }
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        /* Add a hover effect for buttons */
        button:hover {
        opacity: 0.8;
        }
        /* Extra style for the cancel button*/
        .cancelbtn {
        width: auto;
        padding: 5px 5px;
        }
        span.psw{
        float: center;
        padding-top: 16px;
        }
</style>
</head>
<body>
<div class="container my-4">
    <h1> LOG IN TO YOUR ACCOUNT </h1> 
    <a class="btn btn-primary" href="/NewUsingPHP/index.php" role="button">Back to Homepage</a>
    <div class="form-container">
        <form method="post">
            <div class="form-group input-element">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="input-element form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="container" style="background-color:#f1f1f1">
            </div>
            <div class="input-element form-group">
                <input type="submit" value="Login" name="submit" class="form-control btn btn-warning">
            </div>
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
        </form>
    </div>
</body>
</html>

