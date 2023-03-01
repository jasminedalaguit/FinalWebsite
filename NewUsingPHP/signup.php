<?php 
session_start();

	include("connection.php");

    $firstname = "";
    $lastname = "";
    $email = "";
    $username = "";
    $password = "";
    $errorMessage = "";
    $successMessage = "";

	if($_POST){
        if(isset($_POST["firstname"]) && isset($_POST ["lastname"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST['password'];
        }
        do { # we did do loop for the instruction or group of instructions to be executed repeatedly once true 
            if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)){
                $errorMessage = "All of the fields are required";
                break;
            }
            // save to database

            $sql = "INSERT into users (firstname, lastname, email, username, password, created_at) values ('$firstname', '$lastname', '$email', '$username', MD5('".$password."'), now())";
            $result = $con->query($sql);
            if (!$result){
                $errorMessage = "Invalid query: " . $con->error;
                break;
            }
    
            $successMessage = "You are now signed up!";
    
            //header("location: /NewUsingPHP/signup.php");
            //exit;
    
        } while (false); 
    }	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Sign Up</title>
    <style>
        body{
            background-color: #034684;
        }
        h1{
            margin-top: 50px;
            text-align: center;
            color: white;
            word-spacing: 10px;
            font-family: times new roman;
        }
        .form-container{
            max-width: 450px;
            margin:0 auto;
            background-color: white;
            margin-top: 3%;
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
    <h1>SIGN UP</h1>
    <a class="btn btn-primary" href="/NewUsingPHP/index.php" role="button">Back to Homepage</a>
    <a style="margin-left: 75%;" class="btn btn-primary" href="/NewUsingPHP/login.php" role="button">Login</a>
    <div class="form-container">
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
            <div class="form-group input-element">
                <input type="text" class="form-control" name="firstname" placeholder="First Name">
            </div>
            <div class="input-element form-group">
                <input type="text" class="form-control" name="lastname" placeholder="Last Name">
            </div>
            <div class="input-element form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group input-element">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="input-element form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="container" style="background-color:#f1f1f1">
            </div>
            <div class="input-element form-group">
                <input type="submit" value="Sign Up" name="submit" class="form-control btn btn-warning">
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
        </form>
    </div>
</body>
</html>

