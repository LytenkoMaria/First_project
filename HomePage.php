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
       <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./resources/css/main.css">
    <?php require('HomePageForm.php') ?>
    <script src="./resources/js/Script.js"></script>

    <title>Form</title>
</head>
<body>

            <div class="menu">
                   <ul class="list-navigation">
                        <li class="nav-item"><a href="./HomePage.php" class="nav-link">Profile</a></li>
                        <li class="nav-item"><a href="./Coments.php" class="nav-link">Coment</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Home page3</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Home page4</a></li>
                   </ul>
            </div>


      <div  class="home-page" >

              
                 <lable class="home">HOME PAGE</lable>
                      <img src="<?php echo $_SESSION["image"]?>" class="home-img">
                                <div class="users-data-form">
                                      
                                   <textarea name="name" class="users-data" readonly=""><?php echo $_SESSION["date-user"]["name"]?></textarea>
                                      <lable class="user-date">Name</lable>
                                   <textarea name="surname" class="users-data" readonly=""><?php echo $_SESSION["date-user"]["surname"]?></textarea>
                                      <lable class="user-date">Surname</lable>
                                   <textarea name="email" class="users-data" readonly=""><?php echo $_SESSION["date-user"]["email"]?></textarea>
                                      <lable class="user-date">Email</lable>
                                   <textarea name="tel" class="users-data" readonly=""><?php echo $_SESSION["date-user"]["phone"]?></textarea>
                                      <lable class="user-date">Phone number</lable>
                                   <textarea name="data" class="users-data" readonly=""><?php echo $_SESSION["date-user"]["date"]?></textarea>
                                      <lable class="user-date">Date of Birth</lable>

                                  <button  type="submit" name="submit" class=" home change-baton btn btn-primary"><strong>Change</strong></button>
         
                               </div>
                              
                            
                               <div class="change-data-form">
                                     <form action="./HomePageForm.php" id="sign-in-form" method="post" enctype="multipart/form-data" class="tab-form"> 
                                         <div class="change"> 
                                           <input type="file" name="picture" class="users-picture" ></input>
                                           <input required type="email" class=" form-control mt-4" name="email"  autocomplete="email" placeholder="Email" 
                                           value="<?php echo $_SESSION["date-user"]["email"]?>">
                                           <input required type="text" class=" form-control mt-4" name="name"  autocomplete="name" placeholder="Name" 
                                           value="<?php echo $_SESSION["date-user"]["name"]?>">
                                           <input required type="text" class=" form-control mt-4" name="surname"  autocomplete="surname" placeholder="Surname"value="<?php echo $_SESSION["date-user"]["surname"]?>">
                                           <input name="tel" type="tel"  class="mt-4 form-control " value="+(380)" maxlength="15" 
                                           value="<?php echo $_SESSION["date-user"]["phone"]?>">
                                           <input required type="date" class=" mt-4 form-control " name="date" 
                                           value="<?php echo $_SESSION["date-user"]["date"]?>">

                                            <button  type="submit" name="submit" class=" save-change btn btn-primary"><strong>Save hanges</strong></button>
                                        </div>
                                      </form>
                                </div>
                             
     </div>           
                 
         
    

</body>

</html>