<?php
session_start();
require('ConnectionDb.php');

if(!isset($_SESSION["auth"]))
{
    header("Location:/");
}

$stm = $conn->prepare("SELECT * FROM users WHERE id=:id ");
$id=$_SESSION["auth"];
$stm->bindParam(':id', $id);
$stm->execute();

$row = $stm->fetch(PDO::FETCH_ASSOC);
$_SESSION["date-user"]=$row;
$_SESSION["image"]=$row["picture"];        


$path_avatar ='./resources/images/usersImg/'.$_FILES['picture']['name'];

if(!empty($_POST)) {
$stm = $conn->prepare("UPDATE users SET email=:email, name=:name, surname=:surname, phone=:phone, date=:date WHERE id=:id");
    $stm->bindParam(':email', $_POST["email"]);
    $stm->bindParam(':id', $id);
    $stm->bindParam(':name', $_POST["name"]);
    $stm->bindParam(':surname', $_POST["surname"]);
    $stm->bindParam(':date', $_POST["date"]);
    $stm->bindParam(':phone', $_POST["tel"]);
    $stm->execute();
    header("Location:/HomePage.php"); 

     if(move_uploaded_file($_FILES['picture']['tmp_name'], $path_avatar))
       {
          $stmt = $conn->prepare("UPDATE users SET picture=:picture WHERE id=:id");
          $stmt->bindParam(':picture', $path_avatar);
          $stmt->bindParam(':id', $id);
          $stmt->execute();    
          $_SESSION["image"]=$path_avatar;
      }
}


 
    ?>
