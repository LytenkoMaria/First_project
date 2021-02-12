<?php
session_start();
require('ConnectionDb.php');

$path_image_standart ='/resources/images/Standart.png';
$error="";
if(!empty($_POST)) {



$stm = $conn->prepare("SELECT * FROM users WHERE email=:email ");
    $stm->bindParam(':email', $_POST["email"]);
    $stm->execute();

if($stm->rowCount()>0)
{
  $error="Email exist";
}
else{

$stmt = $conn->prepare("INSERT INTO users (email,password,name,surname,phone,date,picture) VALUES (:email,:password,:name,:surname,:phone,:date,:picture)");

    $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':password', $hash);
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':phone', $_POST["tel"]);
    $stmt->bindParam(':picture', $path_image_standart);

    $stmt->execute();
       
       $last_id=$conn->lastInsertId();
       $_SESSION["auth"]=$last_id;
       header("Location:/HomePage.php");
    }


}
   ?>