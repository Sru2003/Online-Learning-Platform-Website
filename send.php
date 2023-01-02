<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];
    $sql = "INSERT INTO `test1`.`test1` (`name`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$email', '$phone', '$comments', current_timestamp());";
    
    // Execute the query
    if($con->query($sql) == true){
      

        // Flag for successful insertion
        $insert = true;
		header("Location: feedback.html");
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>