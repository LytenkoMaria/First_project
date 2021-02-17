<?php
session_start();
require('ConnectionDb.php');

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

    if(($row["token"]==1)&&($row["verified_at"]!=NULL)){
        

        if(password_verify($password,$row["password"])>0)
        {
            $_SESSION["auth"]=$row["id"];
            header("Location:/HomePage.php");
        }
        else{
            $error="Incorrect Email or Password";
            $alertClass="alert alert-danger";
            $_SESSION['SignInError'] = $error;
            $_SESSION['alertClass'] = $alertClass;
            header("Location:/");
            }
    }
    else{
            $error="You haven't passed email verificated";
            $alertClass="alert alert-danger";
            $_SESSION['SignInError'] = $error;
            $_SESSION['alertClass'] = $alertClass;
            header("Location:/");
            }


}
    ?>

  