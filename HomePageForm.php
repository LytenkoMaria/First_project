<?php

session_start();
if(!isset($_SESSION["auth"]))
{
    header("Location:/");
    unset($_SESSION["auth"]);
}
else{
    if(isset($_POST["Exit"]))
    {
        unset($_SESSION["auth"]);
        header("Location:/");
    }
}

$conn= new PDO("mysql:host=localhost; dbname=first", "root","root");
$stm = $conn->prepare("SELECT * FROM users WHERE id=:id ");
$id=$_SESSION["auth"];
$stm->bindParam(':id', $id);
$stm->execute();


$row = $stm->fetch(PDO::FETCH_ASSOC);


$path_avatar = $_SERVER['DOCUMENT_ROOT'].'/resources/images/usersImg/'.$_FILES['picture']['name'];
if(move_uploaded_file($_FILES['picture']['tmp_name'], $path_avatar))
{
      $conn= new PDO("mysql:host=localhost; dbname=first", "root","root");
          $stmt = $conn->prepare("UPDATE users SET picture=:picture WHERE id=:id");
          $stmt->bindParam(':picture', $path_avatar);
          $stmt->bindParam(':id', $id);
          $stmt->execute();    

          $_SESSION["image"]=$path_avatar;
            header("Location:/HomePage.php");
 
    }
    else{echo 'errorrr'; }
   

    ?>
