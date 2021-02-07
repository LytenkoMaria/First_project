<?php
session_start();

require('Header.php');

?>

      <div  class="sign-in-form" >

              <form action="./SignInForm.php" id="sign-in-form" method="post" class="tab-form">
                 
                 <lable class="sign-in">Sign in</lable>
                   <div class="content">
                       <input required type="email" class=" form-control mt-4" name="email"  autocomplete="email" placeholder="Email">
                       <input required type="password" class=" form-control mt-4" name="password"  placeholder="password">
                       <a href="./Registration.php" class="reg">Don't have an account?</a>
                       <button  type="submit" name="submit" class="sign-in btn btn-primary"><strong>Sign in</strong></button>
                  </div>
             </form>
    

<?php require('Footer.php') ?>