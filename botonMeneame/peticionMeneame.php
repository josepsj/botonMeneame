<?php

    $url = $_POST['url'];
    $meneame = "http://www.meneame.net/api/url.php?url=";

if(ini_get('allow_url_fopen') != 'off')
{
    $fp=fopen($meneame.$url, "r");
    while(!feof($fp)) echo fgets($fp);
    fclose($fp);
}
else {
    
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch,CURLOPT_URL,$meneame.$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	echo $data;
}
?>