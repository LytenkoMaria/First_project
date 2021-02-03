<?php

$error="";
if(!empty($_POST)) {

$conn= new PDO("mysql:host=localhost; dbname=first", "root","root");

$stm = $conn->prepare("SELECT * FROM users WHERE email=:email ");
    $stm->bindParam(':email', $_POST["email"]);
    $stm->execute();

if($stm->rowCount()>0)
{
  $error="Email exist";
}
else{

    $stmt = $conn->prepare("INSERT INTO users (email,password,name,surname,phone,date) VALUES (:email,:password,:name,:surname,:phone,:date)");

    $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':password', $hash);
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':phone', $_POST["tel"]);
    $stmt->execute();
    }

    header("Location:/");
}
   ?>