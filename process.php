<?php
if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $last_name  = $_POST["last_name"];
    $username  = $_POST["username"];
    $email  = $_POST["email"];
    $password = $_POST["password"];
   
    if (!empty($first_name) && !empty($last_name) && !empty($username) && !empty($email) && !empty($password)) {
        
        /*host, username, password, dbname*/
        $link = mysqli_connect("localhost", "jasmine", "JP@ssw0rd", "librarysystem");
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt insert query execution
        $sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES ('$first_name', '$last_name', '$username', '$email', '$password')";
        if(mysqli_query($link, $sql)){
          echo "You are now signed up!";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        // Close connection
        mysqli_close($link);

    }else{
        echo "Please provide all information";
    }
}
else {
    echo "hello world";
}

?>