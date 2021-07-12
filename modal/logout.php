<?php
session_start();
unset($_SESSION["isAuthenticated"]);
unset($_SESSION["password"]);
session_destroy();
header("Location: ../index.php");
?>