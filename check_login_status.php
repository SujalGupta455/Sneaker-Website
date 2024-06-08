<?php
session_start();
$response = array();

if (isset($_SESSION['username'])) {
    $response['logged_in'] = true;
    $response['username'] = $_SESSION['username'];
} else {
    $response['logged_in'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
?>
