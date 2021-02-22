<?php
session_start();

if(!isset($_SESSION["auth"]))
{
    header("Location:/");
}

require ('./libreries/phpQuery/phpQuery/phpQuery.php');
require('ConnectionDb.php');

$id=$_GET["id"];

$stmt = $conn->prepare("SELECT * FROM announcements WHERE id=$id");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


require('Header.php');
require('Menu.php');
?>

  <div  class="home-page" >     
      <div class="announcement">  
				<img src='<?php echo $row["images_url"] ?>' class='big-img-offer'>
				<div class='big-price'><?php echo $row["price"] ?></div>
				<a class='big-offer' href='<?php echo $row["link"] ?>'><strong><?php echo $row["advertisements_name"] ?></strong></a>
				  <div class="offer-details">
					<div class='details'>Год выпуска: <?php echo $row["year"] ?></div>
					<div class='details'>Вид топлива: <?php echo $row["type_of_fuel"] ?></div>
					<div class='details'>Пробег: <?php echo $row["mileage"] ?></div>					
                  </div>
	                  <div class="description">
						<lable class='l-description'><strong>Описание</strong></lable>
						<lable class='big-offer-date'><strong>Опубликовано <?php echo $row["date_announcement"] ?></strong></lable>
						<output class='description'><?php echo $row["description"] ?></output>					
	                  </div>
                             <div class="comments-place offers-com"> 
                             	<div class="new-bar">
			                      <?php  require('OffersComments.php'); ?>
			                    </div>  
					                <div class="new-comments">
							              <form  id="create-new-comments" method="post" class="create-new-comments">
							                 <img  class="mr-3 image-new-comments" src="<?php echo $_SESSION["image"]?>" alt="Generic placeholder image">
							                 <textarea name="comments" data-value="$id" class="new-comments offers-left dinam-size"></textarea> 
							                 <button  type="submit" id="send" name="send" class="new-comments left send btn btn-primary"><strong>Send</strong></button>
							                 <input name='offers-id' type='hidden' value='<?php echo $_GET["id"] ?>'>
							              </form> 
							        </div>             
		                     </div>              
	      </div>          
      </div>                               
  </div> 
            
    <script src="./resources/js/ScriptAnnouncements.js"></script>
    <script src="./resources/js/OffersScriptComments.js"></script>
    <script src="./resources/js/ScriptReply.js"></script> 

<?php require('Footer.php') ?>



