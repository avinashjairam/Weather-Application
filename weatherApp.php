<?php

	if(ctype_digit($_POST['location'])){
		$zipcode=$_POST['location'];
		$request="http://api.openweathermap.org/data/2.5/weather?APPID=8f7dcad34954743aefc85f3a8c8eb847&zip=".$zipcode.",us&units=imperial";
	}
	else{
		$city=$_POST['location'];
		$request="http://api.openweathermap.org/data/2.5/weather?APPID=8f7dcad34954743aefc85f3a8c8eb847&q=".$city."&units=imperial";
	}
		

	$response=file_get_contents($request);
	$jsonData = json_decode($response, true);


 	print json_encode(array("Name"		  => "{$jsonData['name']}",
 							"Description" => "{$jsonData['weather'][0]['description']}",
 							"Icon" 		  => "{$jsonData['weather'][0]['icon']}",
 							"CurrentTemp" => "{$jsonData['main']['temp']}",
 							"MaxTemp"	  => "{$jsonData['main']['temp_max']}",
 							"MinTemp"	  => "{$jsonData['main']['temp_min']}",
 							"Humidity"	  => "{$jsonData['main']['humidity']}"
 							)
 					  );
 
?>