<?php
session_start();
require('ConnectionDb.php');

if(!empty($_POST)) {

$data_user =  $_SESSION["date-user"];
$user_name =  $_SESSION["date-user"]["name"];
$picture =  $_SESSION["date-user"]["picture"];
$date_comments =  date('Y-m-d H:i:s'); 

$text  = $_POST["comments"];
$parent  = $_POST["parent_id"];

$stmt = $conn->prepare("INSERT INTO comments (user_id,id_parent_comments,comments,date_comments) VALUES (:user_id,:id_parent_comments,:comments,:date_comments)");

    $stmt->bindParam(':user_id', $data_user["id"]);
    $stmt->bindParam(':id_parent_comments', $parent);
    $stmt->bindParam(':comments', $text);
    $stmt->bindParam(':date_comments', $date_comments);
    $stmt->execute();
    $last = $conn->lastInsertId();
}   

echo json_encode(array( "id" => $last, "picture" => $picture, "date_comments" => $date_comments, "user_name" => $user_name, "user_id" => $data_user["id"], "id_parent_comments" => $parent, "text" => $text, "status" => "succes"));
?>