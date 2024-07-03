<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sudheer";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    echo "Error: " . mysqli_connect_error();
}

// Ensure all fields are present in the POST data
if (!isset($_POST['name'], $_POST['id'], $_POST['mail'], $_POST['username'], $_POST['pass'])) {
    echo '<script>alert("All fields are required.");</script>';
    echo '<script>window.history.go(-1);</script>';
    exit;
}

$name = $_POST['name'];
$id = $_POST['id'];
$email = $_POST['mail'];
$username = $_POST['username'];
$password = $_POST['pass'];
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo '<script>alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");</script>';
    echo '<script>window.history.go(-1);</script>';
} else {
     
    $sql = "INSERT INTO signup (name, id, email, username, password) VALUES ('$name', '$id', '$email', '$username', '$password')";

    if ($con->query($sql) === true) {
        echo '<script>alert("Registration Completed");</script>';
        echo '<script>window.location.href = "your_page.php";</script>'; // Replace "your_page.php" with the actual page you want to redirect to
    } else {
        echo '<script>alert("Error: ' . $con->error . '");</script>';
        echo '<script>window.history.go(-1);</script>';
    }
}

mysqli_close($con);
?>
