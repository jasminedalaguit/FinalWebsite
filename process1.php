<?php
if (isset($_POST["submit"])) {
    $username  = $_POST["username"];
    $password = $_POST["password"];
   
    if (!empty($username) && !empty($password)) {
        
        /*host, username, password, dbname*/
        $link = mysqli_connect("localhost", "jasmine", "JP@ssw0rd", "hello");
        
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        // Attempt insert query execution
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
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