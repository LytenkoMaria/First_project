<?php
session_start();
require('ConnectionDb.php');

if(!empty($_POST)) {

$data_user =  $_SESSION["date-user"];
$user_name =  $_SESSION["date-user"]["name"];
$picture_path = $_SESSION["date-user"]["picture"];
$date_comments =  date('Y-m-d H:i:s'); 
$parent = 0;
$text  = $_POST["comments"];

	$stmt = $conn->prepare("INSERT INTO comments (user_id,id_parent_comments,comments,date_comments) VALUES (:user_id,:id_parent_comments,:comments,:date_comments)");
    $stmt->bindParam(':user_id', $data_user["id"]);
    $stmt->bindParam(':id_parent_comments',$parent);
    $stmt->bindParam(':comments', $text);
    $stmt->bindParam(':date_comments', $date_comments);

    $stmt->execute();

    $last_id=$conn->lastInsertId();
}   

echo json_encode(array( "id" => $last_id, "date_comments" => $date_comments, "user_name" => $user_name, "picture_path" => $picture_path, "user_id" => $data_user["id"], "id_parent_comments" => $parent, "text" => $text, "status" => "succes"));
?>