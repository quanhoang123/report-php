<?php

session_start();
$_SESSION['message'] = "";
$mysqli = new mysqli('localhost', 'root', '', 'database_restaurant');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
   $username = $mysqli->real_escape_string($_POST['username']);
   $password = $mysqli->real_escape_string($_POST['password']);
   $sql = "SELECT * FROM users WHERE `user_name` = '$username' AND `password` = '$password' limit 1   ";

   $result = mysqli_query($mysqli, $sql);
   if ($result) {
      $user = mysqli_fetch_array($result);
      if ($user) {
         $_SESSION['isAuthenticated'] = true;   
         $_SESSION['user'] = $user;
         echo json_encode(['isError' => false, 'message' => "Login successfully!", 'user' => $user]);
      } else {
         echo json_encode(['isError' => true, 'message' => "Invalid credentials!"]);
      }
   } else {
      echo json_encode(['isError' => true, 'message' => "Something went wrong!"]);
    
   }
}
