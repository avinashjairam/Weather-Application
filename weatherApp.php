<?php
	$request="http://api.openweathermap.org/data/2.5/weather?APPID=8f7dcad34954743aefc85f3a8c8eb847&q=Boston";
	$response=file_get_contents($request);
	$jsonData = json_decode($response, true);

	var_dump($jsonData);

	//description
 echo $jsonData['weather'][0]['description'];
 //temperature
 echo $jsonData['main']['temp'];

	// print_r($jsonData);

	// print $jsonData->{'coord'};

	// $min_1 = $jsonData['list'][0]['temp']['min'];
	// $max_1 = $jsonData['list'][0]['temp']['max'];
	// $min_2 = $jsonData['list'][1]['temp']['min'];
	// $max_2 = $jsonData['list'][1]['temp']['max'];
	// echo $min_1.' - '.$max_1.'<br><br>';
	// echo $min_2.' - '.$max_2.'<br><br>';

	// $response=file_get_contents($request);
	// $jsonobj=json_decode($response);
	// print_r($jsonobj);

	// echo "<br><br>";
	// print $jsonobj->{'temp_min'};
	 




?>