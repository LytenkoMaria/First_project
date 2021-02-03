<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/css/main.css">
    <?php require('ComentsPage.php') ?>

    <title>Form</title>
</head>
<body>

            <div class="menu">
                   <ul class="list-navigation">
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Profile</a></li>
                        <li class="nav-item"><a href="/Coments.php" class="nav-link">Coment</a></li>
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Home page3</a></li>
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Home page4</a></li>
                   </ul>
            </div>


      <div  class="home-page" >

              <form action="./ComentsPage.php" id="sign-in-form" method="post" enctype="multipart/form-data" class="tab-form">

                 <lable class="home">Coments</lable>

                    <div class="coment-place">  
                        <input required type="text" class="coment-box" name="coment"> 
                        <button  type="submit" name="submit" class=" send btn btn-primary"><strong>Send</strong></button>
                    </div> 
             </form>
    

</body>

</html>