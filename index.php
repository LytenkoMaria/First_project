<?php
session_start();


if(isset($_SESSION["auth"]))
{
   header("Location:/HomePage.php");
}

require('Header.php');

?>

      <div  class="sign-in-form" >
             <div  class="sign-in-image" > <lable class="sign-up">Don't have an account?</lable>
              <lable class="sign-up-text">Enter your personal details and start work whith us</lable></div>
             <img  class="sign-in-image" src="./resources/images/fon.jpg" >
             <button  type="button" class="reg" disabled><a href="./Registration.php" class="reg">Sign Up</a></button>


              <form action="./SignInForm.php" id="sign-in-form" method="post" class="tab-form">
                 <p class="<?php echo $_SESSION['alertClass']; ?>" role="alert"> <?php echo $_SESSION["SignInError"]; unset($_SESSION["SignInError"]); unset($_SESSION["alertClass"]); ?> </p> 
                  
                 <lable class="sign-in">Sign in</lable></p>
                   <div class="content">
                       <input required type="email" class=" form-control mt-4" name="email"  autocomplete="email" placeholder="Email">
                       <input required type="password" class=" form-control mt-4" name="password"  placeholder="password">
                       <button  type="submit" name="submit" class="sign-in btn btn-input"><strong>Sign in</strong></button>
                  </div>
             </form>
    

<?php require('Footer.php') ?>