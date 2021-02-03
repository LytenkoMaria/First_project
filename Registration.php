<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/css/main.css">

    <title>Form</title>
</head>
<body>

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
    

</body>

</html>