<?php
$sql_retrieve = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($dbconnect, $sql_retrieve);
$user = mysqli_fetch_assoc($result);
// print_r($user);


?>