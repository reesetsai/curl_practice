<?php
	$toURL = "http://realtek.accu-weather.com/widget/realtek/weather-data.asp?location=cityId:315078";
	$post = array();
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL , $toURL);
	curl_setopt($ch, CURLOPT_HEADER , 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
	
	curl_setopt($ch, CURLOPT_POST , true);
	curl_setopt($ch, CURLOPT_POSTFIELDS , $cityId);
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("text/html"));

	$result = curl_exec($ch);

	curl_close($ch);
	preg_match('~<temperature>(.*?)</temperature>~',$result , $temperature);
	preg_match('~<weathertext>(.*?)</weathertext>~',$result , $weathertext);
	preg_match('~<weathericon>(.*?)</weathericon>~',$result , $weathericon);

	echo 'TAIPEI : CURRENT WEATHER<br>';
	echo 'temperature :' .$temperature[0].'F'.'<br>';
	echo 'weathericon :'.'<img src="http://api.accuweather.com/developers/Media/Default/WeatherIcons/'.strip_tags($weathericon[0]).'-s.png">'.'<br>';
	echo 'weathertext :' .$weathertext[0].'<br>';
?>