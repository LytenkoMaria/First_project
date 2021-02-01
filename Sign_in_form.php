<?php

if(!empty($_POST)) {


$conn= new PDO("mysql:host=localhost; dbname=first", "root","root");

    $stmt = $conn->prepare("SELECT * FROM user WHERE Email=:Email");
    $stmt->bindParam(':Email', $_POST["Email"]);
    $Password=$_POST["Password"];
    $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if(password_verify($Password,$row["Password"])>0)
        {
            $_SESSION["auth"]=$row["id"];
            header("Location:/Home_page.php");
        }
        else{
            $eroo="Incorrect Email or Password";
            $_SESSION['Email_ex']=$eroo;
            header("Location:/");
            }
}
    ?>

  