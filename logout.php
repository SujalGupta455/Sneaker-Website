<?php
session_start();
session_unset();
session_destroy();
echo '<script>alert("LogOut successfull ");</script>';
header("Location: index.html");
exit();
?>
