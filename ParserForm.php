<?php
require('ConnectionDb.php');
require ('./libreries/phpQuery/phpQuery/phpQuery.php');

$stmt = $conn->prepare("SELECT * FROM announcements ORDER BY date_announcement DESC LIMIT 1");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$last_date_bd = $row["date_announcement"];

 
$html = curl_get('https://www.olx.ua/transport/legkovye-avtomobili/daewoo/?search%5Border%5D=created_at%3Adesc');
$dom = phpQuery::newDocument($html);

$hentry2 = $dom->find('#offers_table');
$hentry = $hentry2->find('.offer-wrapper');

$count=0;
    foreach ($hentry as $el) {
				 $pq = pq($el); 
				 $p= $pq->find('a')->attr('href');

				 $html2  = curl_get($p);
				 $dom2 = phpQuery::newDocument($html2);

				 $en_months = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
                  $ru_months = array( 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря' );
                  $date = $dom2->find('.offer-bottombar__item em')->text();
                  $date=trim ( $date ," в");                 
                  $date2=str_replace($ru_months, $en_months, $date);
                  $date=date("Y-m-d H:i:s",strtotime($date2));

                if($date>$last_date_bd){                  	


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
                             
		  $stmt = $conn->prepare("INSERT INTO announcements (price,images_url,advertisements_name,year,type_of_fuel,mileage,description,date_announcement,link) VALUES (:price,:images_url,:advertisements_name,:year,:type_of_fuel,:mileage,:description,:date_announcement,:link) ");
		        $stmt->bindParam(':price',$price);
		        $stmt->bindParam(':images_url',$images_url);
		        $stmt->bindParam(':advertisements_name',$advertisements_name);
		        $stmt->bindParam(':year',$year);
		        $stmt->bindParam(':type_of_fuel',$type_of_fuel);
		        $stmt->bindParam(':mileage', $mileage);
		        $stmt->bindParam(':description', $description);
		        $stmt->bindParam(':date_announcement', $date);
		        $stmt->bindParam(':link', $p);
		        $stmt->execute();


				$stm2 = $conn->prepare("SELECT webhook FROM users WHERE  webhook IS NOT NULL ");
				 $stm2->execute();

				  while($row2 = $stm2->fetch(PDO::FETCH_ASSOC))
				    {                                                       
				      $webhook = $row2["webhook"];
				       $message = "$advertisements_name 
				       Выставлено $date ,
				       Вид топлива: $type_of_fuel,
				       Год выпуска: $year
				       $p";   
				       $msg = array('text' => $message);
				       $c = curl_init($webhook);
					    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
					    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
					    curl_setopt($c, CURLOPT_POST, true);
					    curl_setopt($c, CURLOPT_POSTFIELDS, array('payload' => json_encode($msg)));
					    curl_exec($c);
					    curl_close($c);          
				    }


echo json_encode(array( "price" => $price, "images_url" => $images_url,  "advertisements_name" => $advertisements_name, "date" => $date, "link" => $p ,"last_date_bd" => $last_date_bd)); 
   }
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
		curl_close($curl);
		return $data;
}



?>             
          



