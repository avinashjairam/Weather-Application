<?php

	//$city="seattle";
	$city=$_POST['city'];

	$request="http://api.openweathermap.org/data/2.5/weather?APPID=8f7dcad34954743aefc85f3a8c8eb847&q=".$city."&units=imperial";
	
	//$request="http://api.openweathermap.org/data/2.5/find?weather?APPID=8f7dcad34954743aefc85f3a8c8eb847&q=".$city."&units=imperial";

	$response=file_get_contents($request);
	$jsonData = json_decode($response, true);

	// var_dump($jsonData);
	
 	// echo "Description".$jsonData['weather'][0]['description']."<br>";

 	

 	// echo "CurrentTemp".$jsonData['main']['temp']."<br>";

 	// echo "MaxTemp".$jsonData['main']['temp_max']."<br>";

 	// echo "MinTemp".$jsonData['main']['temp_min']."<br>";

 	// echo "Humidity".$jsonData['main']['humidity']."<br>";

 	print json_encode(array("Description" => "{$jsonData['weather'][0]['description']}"));
 


?>