<?php
require('ConnectionDb.php');

$token = $_GET["token"];
$stmt = $conn->prepare("SELECT * FROM users WHERE token=:token ");
$stmt->bindParam(':token',$token);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$verificated_token = 1;

$date_verificate = date('Y-m-d H:i:s'); 

    $stm = $conn->prepare("UPDATE users SET token=:token, verified_at=:date_verificate  WHERE id=:id ");
    $stm->bindParam(':token', $verificated_token );
    $stm->bindParam(':date_verificate', $date_verificate );
    $stm->bindParam(':id',$row["id"]);
    $stm->execute();

$_SESSION["auth"]=$row["id"];
header("Location:/HomePage.php");

?>