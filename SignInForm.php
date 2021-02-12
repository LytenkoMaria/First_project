<?php
session_start();
require('ConnectionDb.php');
$eroo="";

if(isset($_SESSION["auth"]))
{
    header("Location:/HomePage.php");
}


if(!empty($_POST)) {

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->bindParam(':email', $_POST["email"]);
    $password=$_POST["password"];
    $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if(password_verify($password,$row["password"])>0)
        {
            $_SESSION["auth"]=$row["id"];
            header("Location:/HomePage.php");
        }
        else{
            $eroo="Incorrect Email or Password";
            $_SESSION['Email_exist']=$eroo;
            header("Location:/");
            }
}
    ?>

  