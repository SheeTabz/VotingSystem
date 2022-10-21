<?php
//connecting to the database
    // $dbconnect = mysqli_connect(server, username, password, database);
    $dbconnect = mysqli_connect('localhost', 'Brenda', 'vote@2022', 'voting');
    
    //check whether database connection is successful.
    if (!$dbconnect){
        echo "<p style = 'color:red;'>Database failed to connect</p>".mysqli_connect_error();
    }
    else{
        // echo "<p style = 'color:white;'> Database connected successfully</p>";
    }
    //check whether the user is logged in.

    if(!isset($_SESSION['firstname'])){
        echo ("<script>window.top.location='login.php'</script>");
    }
?>