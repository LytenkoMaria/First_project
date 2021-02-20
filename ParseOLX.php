<?php
session_start();

if(!isset($_SESSION["auth"]))
{
    header("Location:/");
}

require ('./libreries/phpQuery/phpQuery/phpQuery.php');
require('ConnectionDb.php');
require('Header.php');
require('Menu.php');
?>

  <div  class="announcements-page" >     
    <lable class="olx">OLX announcements</lable>
     <button  type="button" name="update" class="update btn "><strong>Update</strong></button>
      <div class="announcements">  

	      </div>          
      </div>                               
  </div> 
            
    <script src="./resources/js/ScriptAnnouncements.js"></script>

<?php require('Footer.php') ?>



