<?php 
// Function to sanitize input data
function sanitize($data, $conn) {
    return mysqli_real_escape_string($conn, trim($data));
}

$servername = "localhost";
$username = "root";
$password =  "";
$dbname = "Ecommerce_mgt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "<p>Connected to DB</p>";
}


    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["t1"];
    $phone = $_POST["t2"];
    $address = $_POST["t3"];
    $card = $_POST["t4"];
    $month = $_POST["t5"];
    $year = $_POST["t6"];
    $cvv = $_POST["t7"];
    $button = $_POST["t8"];
    $productname = $_POST["productName"];
    $color = $_POST["productColor"];
    $size = $_POST["productSize"];

    $isValid = true; // Flag to track if all fields are valid

    // Validate name
    if (!preg_match("/^[A-Za-z ]*$/", $name)) {
        echo "<p>Enter name with only characters</p>";
        $isValid = false;
    }

    // Validate phone number
    if (!preg_match("/^[9876][0-9]{9}$/", $phone)) {
        echo "<p>Phone number must contain 10 digits</p>";
        $isValid = false;
    }

    // else{
    //     $sql3 = "SELECT phone from purchase where phone = '".$phone."' ";
    //     if($conn->query($sql3)==TRUE){
    //         echo "Phone Number Cant Be Same";
    //         $isValid = false;
    //     }else $isValid = true;

    // }

    // Validate card number
    if (!preg_match("/^\d{12}$/", $card)) {
        echo "<p>Enter valid 12-digit card number</p>";
        $isValid = false;
    }

    // else{
    //     $sql2 = "SELECT cardno from purchase where cardno = '".$card."' ";
    //     if($conn->query($sql2)==TRUE){
    //         echo "Card Number Cant Be Same";
    //         $isValid = false;
    //     }else $isValid = true;

    // }

    // Validate month
    if (!preg_match("/^(0?[1-9]|1[0-2])$/", $month)) {
        echo "<p>Enter a valid month between 1 and 12</p>";
        $isValid = false;
    }

    // Validate year
    if (!preg_match("/^\d{4}$/", $year)) {
        echo "<p>Enter a valid 4-digit year</p>";
        $isValid = false;
    }
    
    else if($year<2024){
        echo "<p>Enter Future Year</p>";
        $isValid = false;
    }

    // Validate CVV
    if (!preg_match("/^\d{3}$/", $cvv)) {
        echo "<p>Enter valid 3-digit CVV</p>";
        $isValid = false;
    }

    // If all fields are valid, insert data into the SQL table
    if ($isValid) {
        // Sanitize input data before inserting into the database
        $name = sanitize($name, $conn);
        $phone = sanitize($phone, $conn);
        $address = sanitize($address,$conn);
        $card = sanitize($card, $conn);
        $month = sanitize($month, $conn);
        $year = sanitize($year, $conn);
        $cvv = sanitize($cvv, $conn);
        
        // Prepare and execute SQL insert statement
        $sql = "INSERT INTO purchase(name, phone,loc, cardno, months, years, cvv) VALUES ('".$name."', '".$phone."','".$address."','".$card."', ".$month.", ".$year.", '".$cvv."')";
        // $sql2 = "INSERT INTO sales(productname,color,size) VALUES('".$productname."','".$color."','".$size."')";
        if ($conn->query($sql) === TRUE) {
            header("Location: thank_you.php?name=" . urlencode($name));
            exit();
        } else {
            echo "Error: " . $conn->error;
        }

    }
}

$conn->close();
?>
