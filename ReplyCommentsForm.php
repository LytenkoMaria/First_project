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
//echo json_encode("aaaaaaaa");

$stmt = $conn->prepare("INSERT INTO comments (user_id,id_parent_comments,comments,date_comments) VALUES (:user_id,:id_parent_comments,:comments,:date_comments)");

    $stmt->bindParam(':user_id', $data_user["id"]);
    $stmt->bindParam(':id_parent_comments', $parent);
    $stmt->bindParam(':comments', $text);
    $stmt->bindParam(':date_comments', $date_comments);
    $stmt->execute();
    $last = $conn->lastInsertId();
   
echo json_encode(array( "id" => $last, "picture" => $picture, "date_comments" => $date_comments, "user_name" => $user_name, "user_id" => $data_user["id"], "id_parent_comments" => $parent, "text" => $text, "status" => "succes"));


$stm = $conn->prepare("SELECT comments.comments, users.email FROM comments JOIN users on users.id = comments.user_id WHERE comments.id = $parent ");
$stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
$user_mail = $row["email"];
$yours_comment = $row["comments"];

mail($user_mail,'Workproject3006@gmail.com',"User: $user_name \nReplied to your comment: $yours_comment\nText: $text\n http://first/HomePage.php\n $date_comments");
}

?>