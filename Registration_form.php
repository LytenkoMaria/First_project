<?php

$error="";
if(!empty($_POST)) {

$conn= new PDO("mysql:host=localhost; dbname=first", "root","root");

$stm = $conn->prepare("SELECT * FROM user WHERE Email=:Email ");
    $stm->bindParam(':Email', $_POST["Email"]);
    $stm->execute();

if($stm->rowCount()>0)
{
  $error="Email exist";
}
else{

    $stmt = $conn->prepare("INSERT INTO user (Email,Password,Name,Surname,Phone,Date) VALUES (:Email,:Password,:Name,:Surname,:Phone,:Date)");

    $hash = password_hash($_POST["Password"],PASSWORD_DEFAULT);
    $stmt->bindParam(':Email', $_POST["Email"]);
    $stmt->bindParam(':Password', $hash);
    $stmt->bindParam(':Name', $_POST["Name"]);
    $stmt->bindParam(':Surname', $_POST["Surname"]);
    $stmt->bindParam(':Date', $_POST["Date"]);
    $stmt->bindParam(':Phone', $_POST["tel"]);
    $stmt->execute();
    }

    header("Location:/");
}
   ?>