<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <title>Form</title>
    <style>
        h1{
            margin-top: 50px;
            text-align: center;
            font-family: times new roman;
            font-weight: bold;
        }
        .form-container{
            max-width: 500px;
            margin:0 auto;
            background-color: #034684;
            margin-top: 40px;
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
    </style>
</head>
<body>
<h1> CREATE AN ACCOUNT </h1>
<!-- <div id="id01" class="modal"> -->
 <!-- <form class="modal-content" action="/action_page.php"> -->
    <div class="form-container">
        <form action="process.php" method="post">
            <div class="form-group input-element">
                <input type="text" class="form-control" name="first_name" placeholder="First Name">
            </div>
            <div class="input-element form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
            </div>
            <div class="form-group input-element">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="input-element form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group input-element">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="input-element form-group">
                <input type="submit" value="Sign up" name="submit" class="form-control btn btn-warning">
            </div>
        </form>
    </div>
</body>
</html>