<?php include("connect.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Page not found - Best Drug and Alcohol Rehab in Delhi</title>
<meta name="description" content="Page not found on Naya Savera, best drug & alcohol rehab in Delhi."/>
<meta name="keywords" content="rehabs near me, nasha mukti kendra near me, rehab in Delhi, drug rehab in delhi, Drug De addiction centre in Delhi, Alcohol De addiction Center in Delhi, Best Alcohol Rehab in Delhi, Nasha Mukti  Kendra in delhi, Alcohlism Treatment, psychiatrist in India, psychiatric treatment Delhi, Alcohol De-addiction Center in Noida, Rehab in Noida,  Best Rehab in Noida, Nasha Mukti Kendra Noida, Psychiatric rehabilitation centre Delhi, Psychiatric rehab centre Delhi, senior psychiatrist consultant in Delhi, Psychiatrist in Delhi, Best psychiatrist in India, top five psychiatrist in Delhi,  Best psychiatrist in Delhi, Best psychiatrist for Obsessive compulsive disorder "/>
<meta property="og:title" content="Page not found on NayaSavera.org" />
<meta property="og:description" content="Page not found on Naya Savera, best drug & alcohol rehab centre in Delhi" />
<meta property="og:url" content="https://nayasavera.org/404.php" />
<meta property="og:site_name" content="Page not found on Best Drug and Alcohol Rehab in Delhi - NayaSavera.org" />
<meta property="og:image" content="https://nayasavera.org/images/banner-img-1.jpg" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="en_GB" />
<meta property="article:modified_time" content="2021-02-10T09:20:28+00:00" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:domain" content="nayasavera.org" />
<meta name="twitter:title" content="Page not found on Best Drug and Alcohol Rehab in Delhi, Best Alcohol Rehab in Noida NayaSavera.org" />
<?php include("header-includes.php"); ?>
<link href="/css/lx.css" rel="stylesheet" type="text/css">
<link rel="canonical" href="https://nayasavera.org/404.php" />
</head>
<body class="campers-theme ns-lx">
<div id="wrapper">

  <?php include("header-lx.php"); ?>

  <div id="main">

    <!-- The three banner images and the Owl carousel are kept exactly as they
         were, so owl.carousel + custom.js are still loaded below. No breadcrumb
         here: an error page sits nowhere in the hierarchy, and inventing a
         crumb label would mean inventing copy. -->
  <div id="banner">
    <div id="home-banner" class="owl-carousel owl-theme">
      <div class="item">
        <div class="caption">
          <div class="container"> </div>
        </div>
        <img src="images/banner-img-1.jpg" alt="Best Alcohol Rehab in Delhi, Nasha Mukti  Kendra Noida"> </div>
      <div class="item"> <img src="images/banner-img-2.jpg" alt="Nasha Mukti  Kendra, Alcohlism Treatment Delhi"> </div>
      <div class="item"> <img src="images/banner-img-3.jpg" alt="  Best Rehab in Delhi"> </div>
    </div>
  </div>

    <section class="lx-section lx-notfound">
      <div class="lx-wrap">
        <div class="lx-notfound__inner">
          <h1>Page not Found - on Nayasavera.org - Best Drug De addiction & Alcohol Rehab Centre Delhi, Noida & Himachal</span></h1>
          <div class="lx-prose"><h3 align="center"><br><br>That page doesn't exist!</h3>
                <p align="center">Sorry, the page you were looking for could not be found.</p>
                
                <p align="center">visit the  <a href="/" title="">Home Page </a></p></div>
        </div>
      </div>
    </section>

    <?php include("contact-lx.php"); ?>

  </div>
  <?php include("footer.php"); ?>
</div>

<!-- Sticky mobile action bar, as on the other redesigned pages -->
<div class="lx-callbar" role="complementary">
  <a href="tel:+91-9873290300" class="lx-callbar__call"><i class="fa fa-phone" aria-hidden="true"></i> CALL NOW +91-9873290300 </a>
  <a href="https://wa.me/919873290300" class="lx-callbar__wa" title="Message us on Whatsapp" target="_blank" rel="noopener"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
</div>

<script src="js/jquery-1.12.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.noconflict.js"></script>
<script src="js/theme-scripts.js"></script>
<script src="js/zebra_datepicker.js"></script>
<script src="js/function.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/lx-header.js"></script>
</body>
</html>
<?php

function lastcomments($link)	{
	return;
	$query ="SELECT * FROM `guestbook` WHERE `status` = 'V' ";
	$result = mysqli_query($link,$query) or die("Error: could not guestbook comments ". mysql_error());
	$maxrows = mysqli_num_rows($result);
	if( $maxrows > 0){
		if(!isset($pos) || $pos < 0) $pos = 0;
		$query1 ="SELECT * FROM `guestbook` WHERE `status` = 'V' ORDER BY time DESC LIMIT 5 ";
		$result1 = mysqli_query($link,$query1) or die("Error: could not guestbook comments ". mysql_error());
		$rows = mysqli_num_rows($result1);
		if($rows > 0){
			$script = "client-feedback.php";
			$sno = $pos+1;
			//echo "<ol start=\"$sno\"> \n";
			while($i = mysqli_fetch_array($result1)){
				
				echo '<div class="item">
    	<div class="inner-col">
    		<div class="right-col"> <em>'.stripslashes($i['comments']).'</em> 
    			<p align="right"><em>Name: '.$i['name'].'<br>Place: '.$i['place'].'</em></p>
    		</div>
    	</div>
    </div>';
				
				//echo "  <strong>Date:</strong> ".$i[4]."<br />";
				
				
				$sno++;
			}
			//echo "</ol> \n";
	
			
	
		}else{
				print "Review not found...";
		}
	}else{
				print "Review not found...";
	}
}
?>