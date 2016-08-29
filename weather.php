
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
   <link href="./css/customCss.css" rel="stylesheet">
  <!--  <link href="./css/sticky-footer-navbar.css" rel="stylesheet"> -->

    <title>WEATHER APP</title>

   
   

 
    
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WEATHER APP</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="weather.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
     <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <h3>Find Your Local Weather!</h3>
       

        <div id="custom-search-input">
          <div class="input-group">
              <form id="weatherForm" method="post">
                 <input id="weatherLocation" name="location" type="text" class="search-query form-control" placeholder="Enter location or zipcode" />
               </form>
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit" form="weatherForm">
                        <span class=" glyphicon glyphicon-search"></span>
                    </button>
                </span>
          </div>

<div >
 
</div>




          <div id="WeatherInformation" class="alert alert-success">
            <div id="location">
              <strong>Location:</strong>
            </div>            
            <div id="weatherDescription">
              <strong>Description:</strong>
            </div>
            <div id="temp">
              <strong>Current Temp:</strong>
            </div>
            <div id="minTemp">
              <strong>Min Temp:</strong>
            </div>
            <div id="maxTemp">
              <strong>Max Temp:</strong>
            </div>
            <div id="humidity">
              <strong>Humidity:</strong>
            </div>
          </div>

          <br>

          <div id="error" class="alert alert-danger">
            <strong>Warning!</strong> Please enter a valid location name.
          </div>

        </div>
       </div>
     </div>
    </div>

    <footer class="footer">
      <div class="container">
        <a href="./termsAndConditions.php">Terms and Conditions</a>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
   
   

    <script>
      $(document).ready(function(){
        $("#WeatherInformation").css("display","none");
        $("#error").css("display","none");

      });

      $("#weatherForm").submit(function (event){
        var location=$("#weatherLocation").val();
        var weatherIcon;
        var weatherIconUrl;

        location=location.replace(" ","");

        event.preventDefault();
        //alert(location);

          $.ajax({
            url:'weatherApp.php',
            dataType:"json",
            data:{location:location},
            type:'POST',
            success:function(data){
              if(!data.error){

                if(!data.Name){
                  $('#error').css("display","block");
                   $("#WeatherInformation").css("display","none");
                }
                else{
                  $("#error").css("display","none");
                  
                  alert(data.Description);
          
                  weatherIcon=data.Icon;

                  weatherIconUrl="http://openweathermap.org/img/w/"+weatherIcon+".png";

                  $('#location').html(data.Name);
                  $('#weatherDescription').html(data.Description);
                  $('#weatherDescription').prepend('<img src='+weatherIconUrl +" alt=\"weather icon\"/><br>")
                  $('#temp').html("current temp: " + data.CurrentTemp+"&deg");
                  $('#minTemp').html("min temp: " + data.MinTemp+"&deg");
                  $('#maxTemp').html("max temp: " + data.MaxTemp+"&deg");
                  $('#humidity').html("humidity: " + data.Humidity+"&#37");

                  $("#WeatherInformation").css("display","block");
                }

             

              }
            }
          });

       });
    </script>

  </body>
</html>
