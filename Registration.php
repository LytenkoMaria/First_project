<?php
session_start();

if(isset($_SESSION["auth"]))
{
    header("Location:/HomePage.php");
}

require('Header.php');

?>

      <div  class="registration-form" >
            <div  class="sign-in-image" > <lable class="sign-up-height">Welcome Back!</lable>
              <lable class="sign-up-text">To keep connected whith us please login whith your personal info</lable></div>
             <img  class="sign-in-image" src="./resources/images/fon.jpg" >
             <button  type="button" class="reg" disabled><a href="./index.php" class="reg">Sign in</a></button>
              <form action="./RegistrationForm.php" id="RegistrationForm" method="post" class="sign-up-form">
                                           
                  <p class="<?php echo $_SESSION['alertClass']; ?>" role="alert"> <?php echo $_SESSION["SignUpError"]; unset($_SESSION["SignUpError"]); unset($_SESSION["alertClass"]); ?> </p> 

                 <lable class="registration">Registration</lable>
                   <div class="reg-content">

                       <input required type="email" class=" form-control mt-4" name="email"  autocomplete="email" placeholder="Email">
                       <input required type="text" class=" form-control mt-4" name="name"  autocomplete="name" placeholder="Name">
                       <input required type="text" class=" form-control mt-4" name="surname"  autocomplete="surname" placeholder="Surname">
                       <input required type="password" class=" form-control mt-4" name="password"  placeholder="Password">
                       <input name="tel" type="tel"  class="mt-4 form-control " value="+(380)" maxlength="15">
                       <input required type="date" class=" mt-4 form-control " name="date">
                       <button  type="submit" name="submit" class="registration btn btn-input"><strong>Register</strong></button>

                  </div>
             </form>
    

<?php require('Footer.php') ?>