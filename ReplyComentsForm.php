<?php
session_start();
require('ConnectionDb.php');

if(!empty($_POST)) {

$data_user =  $_SESSION["date-user"];
$user_name =  $_SESSION["date-user"]["name"];
$picture =  $_SESSION["date-user"]["picture"];
$date_coment =  date('Y-d-m H:i:s'); 

$text  = $_POST["coments"];
$parent  = $_POST["parent_id"];

$stmt = $conn->prepare("INSERT INTO coments (user_id,id_parent_coment,coment,date_coment) VALUES (:user_id,:id_parent_coment,:coment,:date_coment)");

    $stmt->bindParam(':user_id', $data_user["id"]);
    $stmt->bindParam(':id_parent_coment', $parent);
    $stmt->bindParam(':coment', $text);
    $stmt->bindParam(':date_coment', $date_coment);
    $stmt->execute();
    $last = $conn->lastInsertId(); 
    
}   


echo json_encode(array( "id" => $last, "picture" => $picture, "date_coment" => $date_coment, "user_name" => $user_name, "user_id" => $data_user["id"], "id_parent_coment" => $parent, "text" => $text, "status" => "succes"));
?>