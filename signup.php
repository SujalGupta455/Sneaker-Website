<?php
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
    echo "User Already Exists";
} else {
    $sql2 = "INSERT INTO signup (name, password) VALUES ('$name', '$pass')";
    if ($conn->query($sql2) === TRUE) {
        echo '<script>
                alert("SignUp Successfull");
                window.open("index.html", "_self");
              </script>';
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
