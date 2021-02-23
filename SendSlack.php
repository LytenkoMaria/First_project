<?php  
 
$text = $_POST["sms-to-slack"];
  $msg = array('text' => $text);
  $c = curl_init("https://hooks.slack.com/services/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");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_POST, true);
    curl_setopt($c, CURLOPT_POSTFIELDS, array('payload' => json_encode($msg)));
    curl_exec($c);
    curl_close($c);

echo json_encode($text);
?>


