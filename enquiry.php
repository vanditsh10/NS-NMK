<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	
		$form_error = false;
		$referer = $_SERVER['HTTP_REFERER'];
			
		require_once __DIR__ . '/secrets.php';
		$secretKey = RECAPTCHA_SECRET;
		$captcha = $_POST['g-recaptcha-response'];
			
		if(!$captcha){
			echo '<meta http-equiv="refresh" content="3;URL=\'/enquiry.html\'">';
			echo '<p class="alert alert-warning" align="center"><strong>Please check the the captcha form.</strong></p>';
			exit;
		}
				
		$ip = $_SERVER["REMOTE_ADDR"];
			
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response,true);
			
		if(intval($responseKeys["success"]) !== 1) {
			echo '<meta http-equiv="refresh" content="3;URL=\'/enquiry.html\'">';
			echo '<p class="alert alert-warning" align="center"><strong>Please check the the captcha form.</strong></p>';
			exit;
		} else {
	
	
	
			$timezone = "Asia/Calcutta";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$datetime = date("Y-m-d H:i:s");
		
			$form_error = false;
			$send_status = false;
			
			if(isset($_POST['formtype']) && $_POST['formtype'] == "enquiry"){
				
				
					$msg = "Enquiry Details \n\n";
					
					$msg .= "Name: ".$_POST['name']." \n\n";
					$msg .= "Email: ".$_POST['email']." \n\n";
					$msg .= "Phone (Landline / Mobile): ".$_POST['phone']." \n\n";
					$msg .= "Location : ".$_POST['location']." \n\n";
					$msg .= "Reason for Contacting : ".$_POST['reason']." \n\n";
					$msg .= "Additional Description : ".$_POST['message'];
				
				
			}else if(isset($_POST['formtype']) && $_POST['formtype'] == "contact"){
				
				//if(  $_POST['captchakey'] == "5" ){
				
					$msg = "Query Details \n\n";
					$msg .= "Name: ".$_POST['name']." \n\n";
					$msg .= "Email: ".$_POST['email']." \n\n";
					$msg .= "Phone (Landline / Mobile): ".$_POST['phone']." \n\n";
					$msg .= "Additional Description : ".$_POST['message'];
				//}else{
				//	$error_msg = "<p style='color: red; font-weight:bold'>Invalid Anti Spam Code: </p>";
					
				//	$form_error = true;
				//}
			
			}else{
				$form_error = true;
			}
			
			if(!$form_error){
				$send_status = MySendMail($_POST['email'], "Website Enquiry $datetime", $msg);
			}
			
			if($send_status){
					$dmsg =  "<strong>Email Sent Successfully... We will get back to you soon...</strong><br><br>";
			}else{
					$dmsg =  "<strong style='color:red'>Error Sending Email... Please Try again...</strong><br><br>";
					//if($captcha_error) $dmsg .= "<strong style='color:red'>Wrong Anti Spam Code..</strong><br>";
			}
		}
	}
	
	function MySendMail($from, $subject, $msg){
		 $headers = "MIME-Version: 1.0\r\n";
		 $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		 //$headers .= "X-Priority: 1\r\n";
		 //$headers .= "X-MSMail-Priority: High\r\n";
		 //$headers .= "X-Mailer: DCS\r\n";
		 $headers .= "Reply-To: $from\r\n";
		 $headers .= "From: \"$from\" <info@nayasavera.org>\r\n";
		 //$headers .= "From: $from\r\n";

		  //if (@mail("tenzin007@gmail.com", $subject, $msg, $headers)){
		if (@mail("info@nayasavera.org", $subject, $msg, $headers)){
			return true;
		 }else{
			return false;
		 }
   }
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Enquire Now | Naya Savera Rehab Centre | Delhi & Noida</title>
<meta name="description" content="Reach out to Naya Savera for information on our drug and alcohol rehabilitation services in Delhi, Noida, and Himachal. We're here to support your recovery journey."/>
<meta name="keywords" content="Rehab in Delhi, Drug De-addiction centre in Delhi, Alcohol De-addiction Center in Delhi, Best Rehab in Delhi, Nasha Mukti  Kendra, Alcohlism Treatment, psychiatrist in India, psychiatric treatment Delhi, Psychiatric rehabilitation centre Delhi, Psychiatric rehab centre Delhi, senior psychiatrist consultant in Delhi, Psychiatrist in Delhi, Best psychiatrist in India, top five psychiatrist in Delhi,  Best psychiatrist in Delhi, Top psychiatrist in Delhi, Best psychiatrist for depression, Best child psychiatrist, Best psychiatrist for Obsessive compulsive disorder "/>
<link href="https://nayasavera.org/enquiry.html" rel="canonical" />
<?php include("header-includes.php"); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="campers-theme">
<div id="wrapper">
  <?php include("header.php"); ?>
  <div id="banner">
    <div id="inner-banner" class="enquiry-banner">
      <h1>Enquiry for Drug De addiction &  Alcohol Rehabilitation Centre Delhi</h1>
      <div class="breadcrumb-area">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li class="active">Enquiry</li>
        </ol>
      </div>
    </div>
  </div>
  <div id="main">
    <section class="contact-page blog-larg tips-detail">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="post-box">
              <div class="text-box">
                <h2 class="title">Enquire for Best rehab in Delhi, Noida & Himachal</h2>
                <?php
						if(isset($send_status) && $send_status){
							
							echo '<p>&nbsp;</p><p><strong>'.$dmsg.'</strong></p>';
							
						}else{
							
							if(isset($send_status) && !$send_status) echo '<p>&nbsp;</p><p><strong>'.$dmsg.'</strong></p>';
							
   ?>
                
                <form action="/enquiry.php" method="post" class="row">
                  <div class="col-md-6">
                    <label>Your Name</label>
                    <input name="name" required pattern="[a-zA-Z ]+" type="text" placeholder="Enter your name ">
                  </div>
                  <div class="col-md-6">
                    <label>Your Email</label>
                    <input name="email" required pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$" type="text" placeholder="Enter your email ">
                  </div>
                  <div class="col-md-6">
                    <label>Phone</label>
                    <input name="phone" required type="text" placeholder="Enter your Phone No">
                  </div>
                  <div class="col-md-6">
                    <label>Location</label>
                    <input name="location" required type="text" placeholder="Enter your Location">
                  </div>
                  <div class="col-md-12">
                    <label>Reason for Contacting</label>
                    <input name="reason" required type="text" placeholder="Reason for Contacting">
                  </div>
                  <div class="col-md-12">
                    <label>Message</label>
                    <textarea name="message" required cols="10" rows="10" placeholder="Please Write your Message here"></textarea>
                  </div>
                  <div class="col-md-12" style="margin-bottom:40px; clear:both">
                    <div class="g-recaptcha" data-sitekey="6LdMh64qAAAAAB83rlTvDyG09XY9OPqKNJcSRnoi" ></div>
                  </div>
                  <div class="col-md-12 clearfix">
                    <input type="submit" value="Contact us Now" style="float:left">
                    <input type="hidden" name="formtype" value="enquiry" />
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include("footer.php"); ?>
</div>
<script src="js/jquery-1.12.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.noconflict.js"></script>
<script src="js/theme-scripts.js"></script>
<script src="js/zebra_datepicker.js"></script>
<script src="js/function.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>