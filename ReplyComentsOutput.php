<?php
session_start();
require('ConnectionDb.php');
$child=0;

$stmt = $conn->prepare("SELECT coments.id, coments.id_parent_coment, coments.date_coment, coments.coment, users.name, users.picture FROM coments JOIN users on users.id = coments.user_id WHERE coments.id_parent_coment!=:child ");
$stmt->bindParam(':child',$child);
    $stmt->execute();

$d=[];
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {  

$d[]= array( "name" => $row["name"], "picture" => $row["picture"], "id" => $row["id"], "date_coment" => $row["date_coment"], "user_id" => $row["user_id"], "id_parent_coment" => $row["id_parent_coment"], "text" => $row["coment"],  "status" => "succes"); 

  }  

echo json_encode($d);

?>