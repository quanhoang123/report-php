<?php

include "connect.php";

$userid = 0;
if(isset($_POST['userid'])){
    $userid = mysqli_real_escape_string($con,$_POST['userid']);
}
$select_query = "SELECT * FROM room_restaurant WHERE id_room=".$userid;
$result = mysqli_query($con,$select_query);

$html = '<div>';
while($row = mysqli_fetch_array($result)){
    $nameroom = $row['name_room'];
    $price = $row['price'];
   
    $html .= "<span class='head'>Name : </span><span>".$nameroom."</span><br/>";
    $html .= "<span class='head'>Username : </span><span>".$price."</span><br/>";
 
$html .= '</div>';

echo $html;

