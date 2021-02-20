<?php
session_start();
require('ConnectionDb.php');

$stmt = $conn->prepare("SELECT * FROM announcements");
    $stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {  
      $masOffers[]=array("id" => $row["id"], "advertisements_name"=> $row["advertisements_name"], "price" => $row["price"], "images_url" => $row["images_url"], "date" => $row["date_announcement"], "link" =>$row["link"]); 
    }  
echo json_encode($masOffers);

?>