<?php
session_start();
require('ConnectionDb.php');

if(!empty($_POST)) {
$data_user =  $_SESSION["date-user"];
$user_name =  $_SESSION["date-user"]["name"];
$picture_path = $_SESSION["date-user"]["picture"];
$date_coment =  date('Y-d-m H:i:s'); 
$parent = 0;
$text  = $_POST["coments"];



$stmt = $conn->prepare("INSERT INTO coments (user_id,id_parent_coment,coment,date_coment) VALUES (:user_id,:id_parent_coment,:coment,:date_coment)");
    $stmt->bindParam(':user_id', $data_user["id"]);
    $stmt->bindParam(':id_parent_coment',$parent);
    $stmt->bindParam(':coment', $text);
    $stmt->bindParam(':date_coment', $date_coment);
    $stmt->execute();
    $last_id=$conn->lastInsertId();
}   

echo json_encode(array( "id" => $last_id, "date_coment" => $date_coment, "user_name" => $user_name, "picture_path" => $picture_path, "user_id" => $data_user["id"], "id_parent_coment" => $data_user["id"], "text" => $text, "status" => "succes"));
?>