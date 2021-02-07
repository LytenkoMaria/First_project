<?php

require('Header.php');

?>

      <div  class="registration-form" >

              <form action="./RegistrationForm.php" id="RegistrationForm" method="post" class="tab-form">
                 
                 <lable class="registration">Registration</lable>
                   <div class="content">
                       <input required type="email" class=" form-control mt-4" name="email"  autocomplete="email" placeholder="Email">
                       <input required type="text" class=" form-control mt-4" name="name"  autocomplete="name" placeholder="Name">
                       <input required type="text" class=" form-control mt-4" name="surname"  autocomplete="surname" placeholder="Surname">
                       <input required type="password" class=" form-control mt-4" name="password"  placeholder="Password">
                       <input name="tel" type="tel"  class="mt-4 form-control " value="+(380)" maxlength="15">
                       <input required type="date" class=" mt-4 form-control " name="date">

                       <a href="./index.html" class="reg">Already have an account?</a>
                       <button  type="submit" name="submit" class="registration btn btn-primary"><strong>Register</strong></button>

                  </div>
             </form>
    

<?php require('Footer.php') ?>