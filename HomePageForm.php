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
$_SESSION["date-user"]=$row;
$_SESSION["image"]=$row["picture"];        


$path_avatar ='./resources/images/usersImg/'.$_FILES['picture']['name'];

if(!empty($_POST)) {
$stmt = $conn->prepare("UPDATE users SET email=:email, name=:name, surname=:surname, phone=:phone, date=:date WHERE id=:id");
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':name', $_POST["name"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':date', $_POST["date"]);
    $stmt->bindParam(':phone', $_POST["tel"]);
    $stmt->execute();
}

if(move_uploaded_file($_FILES['picture']['tmp_name'], $path_avatar))
{
          $stmt = $conn->prepare("UPDATE users SET picture=:picture WHERE id=:id");
          $stmt->bindParam(':picture', $path_avatar);
          $stmt->bindParam(':id', $id);
          $stmt->execute();    

          $_SESSION["image"]=$path_avatar;
          header("Location:/HomePage.php");   

    }


 
    ?>
