<?php
session_start();

require('HomePageForm.php');
require('Header.php');
require('Menu.php');

?>
<script src="./resources/js/Script.js"></script>

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
                                  <button  type="submit" name="submit" class=" home change-batton btn btn-primary"><strong>Change</strong></button>        
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

                                            <button  type="submit" name="submit" class=" save-change btn btn-primary"><strong>Save changes</strong></button>
                                        </div>
                                      </form>
                                </div>
                             
     </div>           
                 
         
    
<?php require('Footer.php') ?>