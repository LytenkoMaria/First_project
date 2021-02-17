<?php
session_start();
require('ConnectionDb.php');

$path_image_standart ='/resources/images/Standart.png';
$error="";

if(!empty($_POST)) {

$token = sha1(uniqid($_POST["name"], true));

$stm = $conn->prepare("SELECT * FROM users WHERE email=:email ");
    $stm->bindParam(':email', $_POST["email"]);
    $stm->execute();

if($stm->rowCount()>0)
{ 
  $emailExist="Email already exist";
  $alertClass="alert alert-danger";
  $_SESSION['SignUpError'] = $emailExist;
  $_SESSION['alertClass'] = $alertClass;
  header("Location:/Registration.php"); 
}
else{

$stmt = $conn->prepare("INSERT INTO users (email,password,name,surname,phone,date,picture,token) VALUES (:email,:password,:name,:surname,:phone,:date,:picture,:token)");

    $hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':password', $hash);
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':phone', $_POST["tel"]);
    $stmt->bindParam(':picture', $path_image_standart);
    $stmt->bindParam(':token', $token);

    $stmt->execute();
    $verifNone="Please verificated your email";
    $alertClass="alert alert-primary";
    $_SESSION['SignUpError'] = $verifNone;
    $_SESSION['alertClass'] = $alertClass;
    header("Location:/Registration.php");  
    }

$url="http:http://first/Activate.php?token=$token";
mail($_POST["email"],'Workproject3006@gmail.com',"Thank you for signing up at our site.  Please go to $url to activate your account.
");

}

   ?>