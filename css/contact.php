<?php
// define variables and set to empty values
$to       = "avinash.jairam@gmail.com";
$nameErr  = $emailErr = $subjectErr = $messageErr = $captchaErr= "";
$name     = $email = $subject = $message = "";
$captcha;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
  } 
  else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
  if(isset($_POST['g-recaptcha-response'])){
      $captcha=$_POST['g-recaptcha-response'];
  }
  else{
      $captchaErr="Plese check the captcha form";
  }

  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret==".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

  if(empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr) && empty($captchaErr) && $response.success==true){
    $headers="From: ".$name . "via ".$email."\r\n"; 
    if(mail($to,$subject,$message,$headers)){
      echo "<script>alert('Message Sent');</script>";
    }
  }
 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact </title>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="weather app">
    <meta name="Avinash Jairam" content="weather app">
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
   <link href="./css/customCss.css" rel="stylesheet">    

    <script src='https://www.google.com/recaptcha/api.js'></script>
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
            <li><a href="weather.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li class="active"><a href="contact.php">Contact</a></li>           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->

      <div class="container contentContainer">
      <div class="row col-md-12 col-md-offset-3">
        <div class="col-md-6 box" >
          <form method="post">
                       <div class="form-group">                              
                             <label>Name</label><span class="error">*</span>
                            <input type="Name" class="form-control" placeholder="Name" name="name" value="<?php echo $_POST['name'];?>"/>
                      </div>
            
                     <div class="form-group">
                             <label>Email</label><span class="error">*</span>
                             <input type="Email" class="form-control" placeholder="Email" name="email" value="<?php echo $_POST['email'];?>"/>
                      </div>

                      <div class="form-group">
                             <label>Subject</label><span class="error">*</span>
                             <input type="Subject" class="form-control" placeholder="Subject" name="subject" value="<?php echo $_POST['subject'];?>"/>
                      </div>            
                              

                      <div class="form-group">
                               <label>Message</label> <span class="error">*</span>                      
                              <textarea class="form-control" name="message" value="<?php echo $_POST['message'];?>" /></textarea>                   
                      </div>

                      <div class="form-group">
                        <div class="g-recaptcha" data-sitekey=""></div>
                      </div>

                     <div class="form-group">
                             <input type="submit" class="btn btn-success" value="Send" name="submit" />
                             <input type="submit" class="btn btn-danger" value="Clear" />

                      </div>
                        <span class="error"><?php echo " * Field Required";?></span><br><br>
                        <span class="error"><?php echo $nameErr;?></span><br>
                        <span class="error"><?php echo $emailErr;?></span><br>
                        <span class="error"><?php echo $subjectErr;?></span><br>
                        <span class="error"><?php echo $messageErr;?></span><br>
                        <span class="error"><?php echo $captchaErr;?></span><br>
                    </form>
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
   
   

   

  </body>
</html>
