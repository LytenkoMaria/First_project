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
                        
	      </div>          
      </div>                               
  </div> 
            
    <script src="./resources/js/ScriptAnnouncements.js"></script>

<?php require('Footer.php') ?>



