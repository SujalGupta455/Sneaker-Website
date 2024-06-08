<?php
session_start();

$name = $_POST["t1"];
$pass = $_POST["t2"];

$conn = new mysqli("localhost", "root", "", "practise");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM signup WHERE name = '$name' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, start session and redirect to index.html
    $_SESSION['username'] = $name;
    echo '<script>alert("Login Successfull ");</script>';
    echo '<script>window.open("index.html", "_self");</script>';
} else {
    echo '<script>
    alert("Please signup first before login redirecting to signup page..");
    window.open("signup.html","_self");</script>';
    
}

$conn->close();
?>
