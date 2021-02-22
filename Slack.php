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


  <div  class="slack-form" >     
    <lable class="slack">SMS to Slack</lable>
      <div class="send-slack">
      	<form method='post' id='send-slack'>
       		<textarea name='sms-to-slack'  id='text-slack' class='sms-to-slack  dinam-size'></textarea>
       		<button  type="submit" id="sms-to-slack" name="submit" class="registration sms-to-slack btn btn-input"><strong>Register</strong></button>
        </form>
      </div> 		
  </div> 
    
<script >


$(document).on("submit","#send-slack", function(e) {
         e.preventDefault();
        var form = $(this);
        $.ajax({
          type: "post",
          dataType: 'json',
          url: "./SendSlack.php",
          data: form.serialize(),
          success: function(result) { 
                           console.log(result); 
                                   },
        error: function (data) {
        console.log('Error', data);
    },        
        })
      });

</script>


    <script src="./resources/js/ScriptAnnouncements.js"></script>
    <script src="./resources/js/ScriptComments.js"></script>

<?php require('Footer.php') ?>



