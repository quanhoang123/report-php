<?php
session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'root', '', 'database_restaurant');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $mysqli->real_escape_string($_POST['fullname']);
    $username = $mysqli->real_escape_string($_POST['username']);
    $password =  md5($mysqli->real_escape_string($_POST['password']));
    $gender = $mysqli->real_escape_string($_POST['gender']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $address = $mysqli->real_escape_string($_POST['address']);

    $sql = "INSERT INTO users(`fullname`,`user_name`,`password`,`gender`,`email`,`phone`,`address`) values ('$name','$username','$password','$gender','$email','$phone','$address')";
    $result = $mysqli->query($sql);
   
if ($result) {
    $sql = "SELECT * FROM users WHERE `id_user` = $mysqli->insert_id LIMIT 1";
    $result = $mysqli->query($sql);
    $user = mysqli_fetch_array($result);
    if ($user) {
        $_SESSION['isAuthenticated'] = true;
        $_SESSION['user'] = $user;
        echo json_encode(['isError' => false, 'message' => "Register successfully!", 'user' => $user]);
    }else{
        echo json_encode(['isError' => true, 'message' => "Something went wrong22!"]);
    }
}
}
