<?php
session_start();
require('ConnectionDb.php');
$child=0;

$stmt = $conn->prepare("SELECT comments.id, comments.id_parent_comments, comments.date_comments, comments.comments, users.name, users.picture FROM comments JOIN users on users.id = comments.user_id WHERE comments.id_parent_comments!=:child ");
$stmt->bindParam(':child',$child);
    $stmt->execute();

$d=[];
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {  

$d[]= array( "name" => $row["name"], "picture" => $row["picture"], "id" => $row["id"], "date_comments" => $row["date_comments"], "user_id" => $row["user_id"], "id_parent_comments" => $row["id_parent_comments"], "text" => $row["comments"],  "status" => "succes"); 

  }  

echo json_encode($d);

?>