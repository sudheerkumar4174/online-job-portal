<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sudheer";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    echo "Error: " . mysqli_connect_error();
}

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['text1'];
$mobileno = $_POST['mobileno'];
$experience = $_POST['exp'];

$sql = "INSERT INTO register (firstname, lastname, email, mobileno, exp) VALUES ('$firstname', '$lastname', '$email', '$mobileno', '$experience')";

if ($con->query($sql) === true)
{
    echo "<h1>Registration Completed</h1>";
}
else 
{
    echo "Error: " . $con->error;
}
mysqli_close($con);
?>
