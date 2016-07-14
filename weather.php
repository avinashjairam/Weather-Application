<!DOCTYPE html>

<html>
<head>
	<title>Weather Forecast</title>
	<meta charset="utf-8">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
	
</head>



<body>

	<form id="weatherForm" method="post">
		<input id="weatherLocation" type="text" name="location">
		<input type="submit" value="Submit">
	</form>

	<div id="weatherDescription">
	</div>
	<div id="temp">
	</div>
	<div id="minTemp">
	</div>
	<div id="maxTemp">
	</div>
	<div id="humidity">
	</div>




<script>
	$(document).ready(function(){

	});

	$("#weatherForm").submit(function (event){
		var city=$("#weatherLocation").val();
		city=city.replace(" ","");

		event.preventDefault();
		//alert(city);

		$.ajax({
			url:'weatherApp.php',
			dataType:"json",
			data:{city:city},
			type:'POST',
			success:function(data){
				if(!data.error){
					alert(data.Description);
					$('#weatherDescription').html(data.Description);
					$('#temp').html(data.CurrentTemp);
					$('#minTemp').html(data.MinTemp);
					$('#maxTemp').html(data.maxTemp);
					$('#humidity').html(data.Humidity);

				}
			}
		});

	});




</script>




<body>






<html>