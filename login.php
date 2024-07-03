<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sudheer";
$con = mysqli_connect($servername, $username, $password, $dbname);
$username = $_POST['username'];
$password = $_POST['pass'];
$sql = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);
if ($result) 
{
    $count = mysqli_num_rows($result);
    if ($count ) 
    {
        echo "<h1>Login Successful<h1>";
    } 
    else 
    {
        echo "Login Failed. Please check your username and password.";
    }
} 
else 
{
    echo "Error: " . mysqli_error($con);
}
mysqli_close($con);
?>
