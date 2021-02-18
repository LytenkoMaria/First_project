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

  <div  class="home-page" >     
    <lable class="olx">OLX announcements</lable>
      <div class="announcements">        
         <?php

require('ConnectionDb.php');

$html = curl_get('https://www.olx.ua/transport/legkovye-avtomobili/daewoo/');
$dom = phpQuery::newDocument($html);

$hentry = $dom->find('.offer-wrapper');

    foreach ($hentry as $el) {

				 $pq = pq($el); 
				 $p= $pq->find('a')->attr('href');
				 //echo ( $p);

				 $html2  = curl_get($p);
				 $dom2 = phpQuery::newDocument($html2);

				  $div_image = $dom2->find('div.descgallery__image');
				  $images_url = $div_image->find('img')->attr('src');
				  $price = $dom2->find('.pricelabel__value')->text();
				  $a = $dom2->find('.offer-titlebox h1')->text();
				  $advertisements_name=trim ( $a ," \n\r\t\v\0" );
                  $d = $dom2->find('#textContent')->text();
                  $description=trim ( $d ," \n\r\t\v\0" );

						$offer_details = $dom2->find('.offer-details__item');
						foreach ($offer_details as $elem) {    
                                $pq = pq($elem);

 								if( $pq->find(".offer-details__name")->text() == 'Год выпуска') {
                                    $year = $pq->find(".offer-details__value")->text();
 								}
								if($pq->find(".offer-details__name")->text() == 'Вид топлива') {
								    $type_of_fuel = $pq->find(".offer-details__value")->text();
								}
								if($pq->find(".offer-details__name")->text() == 'Пробег') {
								    $mileage = $pq->find(".offer-details__value")->text();								                        
								}
                        }
 
		  $stmt = $conn->prepare("INSERT INTO announcements (price,images_url,advertisements_name,year,type_of_fuel,mileage,description) VALUES (:price,:images_url,:advertisements_name,:year,:type_of_fuel,:mileage,:description) ");
		        $stmt->bindParam(':price',$price);
		        $stmt->bindParam(':images_url',$images_url);
		        $stmt->bindParam(':advertisements_name',$advertisements_name);
		        $stmt->bindParam(':year',$year);
		        $stmt->bindParam(':type_of_fuel',$type_of_fuel);
		        $stmt->bindParam(':mileage', $mileage);
		        $stmt->bindParam(':description', $description);
		        $stmt->execute();
		               	
    }
 

function curl_get($url, $referer = 'https://www.google.com/'){

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		$data = curl_exec($curl);
		if(curl_errno($curl)){
		    echo 'Curl error: ' . curl_error($curl);
		}
		//echo $data;
		curl_close($curl);
		return $data;
}



?>             
          
      </div>                               
  </div> 
            
    <script src="./resources/js/ScriptComments.js"></script>
    <script src="./resources/js/ScriptReply.js"></script> 

<?php require('Footer.php') ?>



