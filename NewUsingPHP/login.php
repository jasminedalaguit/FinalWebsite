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
<h1> LOG IN TO YOUR ACCOUNT </h1> 
    <div class="form-container">
        <form action="process1.php" method="post">
            <div class="form-group input-element">
                <input type="text" class="form-control" name="username" placeholder="Enter Username">
            </div>
            <div class="input-element form-group">
                <input type="text" class="form-control" name="password" placeholder="Enter Password">
            </div>
            <!-- <label> <div class="form-group input-element">
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </div> </label> -->
            <div class="container" style="background-color:#f1f1f1">
            <!--<button type="button" class="cancelbtn">Cancel</button> 
            <span class="psw"> Forgot <a href="#">password? </a></span>-->
            </div>
            <div class="input-element form-group">
                <input type="submit" value="Login" name="submit" class="form-control btn btn-warning">
            </div>
        </form>
    </div>
</body>
</html>
