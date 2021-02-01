<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/css/Registration.css">

    <title>Form</title>
</head>
<body>

      <div  class="Registration_form" >

              <form action="./Registration_form.php" id="Registration_form" method="post" class="tab-form">
                 
                 <lable>Registration</lable>
                   <div class="content">
                       <input required type="text" class=" form-control mt-4" name="Email"  autocomplete="Email" placeholder="Email">
                       <input required type="text" class=" form-control mt-4" name="Name"  autocomplete="Name" placeholder="Name">
                       <input required type="text" class=" form-control mt-4" name="Surname"  autocomplete="Surname" placeholder="Surname">
                       <input required type="password" class=" form-control mt-4" name="Password"  placeholder="Password">
                       <input name="tel" type="tel"  class="mt-4 form-control " value="+(380)" maxlength="15">
                       <input required type="date" class=" mt-4 form-control " name="Date">

                       <a href="./index.html" class="reg">Already have an account?</a>
                       <button  type="submit" name="submit" class="btn btn-primary"><strong>Register</strong></button>

                  </div>
             </form>
    

</body>

</html>