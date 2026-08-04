<?php
	foreach($_REQUEST as $varname=>$varval){
		${$varname} = $varval;
	}
    include("connect.php");
	//include("config.php");
	 if(isset($action) && $action == "Submit"){
		/*session_start();
		$captcha_error = false;
		$captchakey = isset($_POST['captchakey']) ? $_POST['captchakey'] : "";*/
		if(!isset($_POST['anti_spam']) || empty($_POST['anti_spam']) || $_POST['anti_spam'] != "4" ){
			$error = true;
			$captcha_error = true;
			$_POST['anti_spam'] = "";
			$t='Submit';
		}else{
			$timezone = "Asia/Calcutta";
			if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			
			$user_ip = $_SERVER["REMOTE_ADDR"];
					
			
			$site_url = "http://www.nayasavera.org/";
			//valid entry
			$submitted_on = date ("Y-m-d H:i:s",time());
			$comments = addslashes($comments);
			$email = trim($email);
			 // Check if its submitted from Flash
			// if($submit == 'Yes'){
			 // Insert the data into the mysql table
			$sql = "INSERT INTO guestbook ( `name`, `place`, `comments`, `time`, `status`) VALUES  ('$name', '$place', '$comments',  '$submitted_on', 'P' )";
			 $insert = mysql_query($sql, $link) or die("Error in GuestBook Application: " . mysql_error());
			 $t = "Success";
			 $feedback_id = mysql_insert_id();
			 
			 $approve_website_url = $site_url."processfeedback.php?action=approve&id=".$feedback_id;
			 $delete_website_url = $site_url."processfeedback.php?action=delete&id=".$feedback_id;
			 
			 //email to admin for testimonial
			 
			$msg = "Testimonial Details\n";
			$msg .= "Name: ".$_POST['name']."\n";
			$msg .= "Place: ".$_POST['place']."\n";
			$msg .= "Comment/Feedback: \n".stripslashes($_POST['comments'])."\n\n\n\n";
			$msg .= "Approve the Feedback by clicking the link below or just copy/paste the link in browser\n";
			$msg .= $approve_website_url;
			$msg .= "\n\n\n\n";
			$msg .= "Delete the Feedback by clicking the link below or just copy/paste the link in browser\n";
			$msg .= $delete_website_url;
			$msg .= "\n\n\n\n";
			
			MySendMail("info@nayasavera.org", "www.nayasavera.org - New Feedback submitted on website - ip - $user_ip", $msg);
			//echo $msg;
		}
	}
	 
	  function MySendMail($from, $subject, $msg){
		 
		 $headers = "MIME-Version: 1.0\r\n";
		 $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		 $headers .= "X-Priority: 1\r\n";
		 $headers .= "X-MSMail-Priority: High\r\n";
		 $headers .= "X-Mailer: DCS\r\n";
		 $headers .= "From: \"Feedback - Online Server\" <info@nayasavera.org>\r\n";

		 if(@mail("info@nayasavera.org", $subject, $msg, $headers)){
		  //if (@mail("tenzin@dotcomsolutions.in", $subject, $msg, $headers)){
			return true;
		 }else{
			return false;
		 }
	 }
 ?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Feedback and comments for NayaSavera - Best Rehab in Delhi, Nasha Mukti  Kendra </title>
<meta name="description" content="Feedback and comments for NayaSavera - Rehab in Delhi, Drug De-addiction centre in Delhi, Alcohol De-addiction Center in Delhi, Best Rehab in Delhi, Nasha Mukti  Kendra, Alcohlism Treatment "/>
<meta name="keywords" content="Rehab in Delhi, Drug De-addiction centre in Delhi, Alcohol De-addiction Center in Delhi, Best Rehab in Delhi, Nasha Mukti  Kendra, Alcohlism Treatment, psychiatrist in India, psychiatric treatment Delhi, Psychiatric rehabilitation centre Delhi, Psychiatric rehab centre Delhi, senior psychiatrist consultant in Delhi, Psychiatrist in Delhi, Best psychiatrist in India, top five psychiatrist in Delhi,  Best psychiatrist in Delhi, Top psychiatrist in Delhi, Best psychiatrist for depression, Best child psychiatrist, Best psychiatrist for Obsessive compulsive disorder "/>
<?php include("header-includes.php"); ?>
</head>
<body class="campers-theme">
 
<div id="wrapper">
 
<?php include("header.php"); ?>
 
 
 
<div id="banner">
<div id="inner-banner" class="faq-banner">
<h1>Feedback / Comments</h1>
<div class="breadcrumb-area">
<ol class="breadcrumb">
<li><a href="/">Home</a></li>
<li class="active">Feedback / Comments</li>
</ol>
</div>
</div>
</div>
 
<div id="main">
 
<section class="blog-post-section blog-larg tips-detail">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-8">
<div class="post-box">
<div class="frame">
<img src="images/banner5.jpg" alt="FAQs for Treatment by Naya Savera, Alcohol De-addiction Center in Delhi, Drug De-addiction centre in Delhi, Best Rehab in Delhi, Nasha Mukti  Kendra">

</div>
<div class="text-box">
<h2 class="title">Feedback / Comments</h2>
<p align="center"><fieldset style="border:#3300FF 1px solid; padding:15px;">
<legend><strong>POST A REVIEW</strong></legend>
<br />
	      <?php if(@$_POST['action']!='Submit' || @$t=='Submit'){
		  		if(@$captcha_error){
				 echo "<p style=\"color:red\" align=\"center\">Error in <strong>Anti Spam Code</strong></p>"; 
				}
				 ?>
                 
                 <form action="" method="POST" class=" ct-u-marginBottom30 ct-form ct-form-grey">
                <div class="row" style="margin-bottom:10px">
                  <div class="col-md-6">
                    <input id="name" data-error-message="Name" placeholder="Name" type="text" required="" name="name" class="form-control input--withBorder ct-u-marginBottom10 input-focusMotive" value="<?php echo @$name; ?>">
                    <label for="name" class="sr-only"></label>
                  </div>
                  <div class="col-md-6">
                    <input id="place" data-error-message="Place" placeholder="Place" type="text" required="" name="place" class="form-control input--withBorder ct-u-marginBottom10 input-focusMotive" value="<?php echo @$email; ?>">
                    <label for="place" class="sr-only"></label>
                  </div>
                </div>
                <textarea id="contact_message" data-error-message="Message is required" placeholder="Review" rows="8" required="" name="comments" title="Review" class="form-control input--withBorder ct-u-marginBottom20 input-focusMotive ct-u-marginBottom20" style="margin-bottom:10px"><?php echo @$comments; ?></textarea>
                <input id="antispam" data-error-message="AntiSpam" placeholder="Anti Spam Code: What is 2+2= ?" type="text" required="" name="anti_spam" class="form-control input--withBorder ct-u-marginBottom10 input-focusMotive" style="margin-bottom:10px"> 
                <button class="btn btn-primary btn-lg text-uppercase">Submit</button>
                <input type="hidden" name="action" id="action" value="Submit" />
              </form>
                 
          
          
          
          
            <?php
			} else {
				echo "<p><strong>Thank You!<br>Review has been successfully submitted....  Waiting for approval.</strong></p>";
			}
			?>
            </fieldset></p>	     
             <p align="center">&nbsp;</p>
          <fieldset style="border:#3300FF 1px solid; padding:15px;">
<legend><strong>CLIENT REVIEWS</strong></legend>
             <?php

	if(isset($action)){
		switch($action){
			case "list":
				if(isset($pos) && $pos >= 0){
					listcomments($pos);
				}else{ 
					listcomments();
				}
				break;
			default:
				listcomments();
		}	
	}else{
		if(isset($pos) && $pos >= 0){
			listcomments($pos);
		}else{ 
			listcomments();
		}
	}	
	?>
        </fieldset>
<?php
function listcomments($pos=0)	{
	$query ="SELECT * FROM `guestbook` WHERE `status` = 'V' ";
	$result = mysql_query($query) or die("Error: could not guestbook comments ". mysql_error());
	$maxrows = mysql_num_rows($result);
	if( $maxrows > 0){
		if(!isset($pos) || $pos < 0) $pos = 0;
		$query1 ="SELECT * FROM `guestbook` WHERE `status` = 'V' ORDER BY time DESC LIMIT $pos, ". EntryPerPage;
		$result1 = mysql_query($query1) or die("Error: could not guestbook comments ". mysql_error());
		$rows = mysql_num_rows($result1);
		if($rows > 0){
			$script = "client-feedback.php";
			$sno = $pos+1;
			//echo "<ol start=\"$sno\"> \n";
			while($i = mysql_fetch_array($result1)){
				echo "<p class=\"fw_light m_bottom_12\"><strong>Name:</strong> ".$i['name']."<br />";
				echo "<strong>Place:</strong>  ".$i['place']."<br />";
				echo "<strong>Comments:</strong><br />  ".stripslashes($i['comments'])."</p>";
				echo "<hr />";
				//echo "  <strong>Date:</strong> ".$i[4]."<br />";
				
				
				$sno++;
			}
			//echo "</ol> \n";
	
			if($maxrows%EntryPerPage == 0){
				$totalpages = $maxrows/EntryPerPage;
			}else{
				$totalpages = ($maxrows + (EntryPerPage-($maxrows%EntryPerPage)))/EntryPerPage;
			}
			$pageno = 1;
			$links = "";
			$script = "$script?action=list&";
			if(!isset($pos)) $pos = 0;
			for($page = 0; $page < $totalpages ; $page++){
				if(($pos/EntryPerPage) == $page){
					$links .= "<b>".($page+1)."</b> ";
				}else{
					$links .= "<a href=\"".$script."pos=".($page*EntryPerPage)."\">".($page+1)."</a> ";
				}
			}
						
			if($pos<EntryPerPage){
				$previous="";
			}else{
				$previous="<a href=\"".$script."pos=".($pos-EntryPerPage)."\">&lt;&lt;Prev</a> ";
			}
					
			if($pos+EntryPerPage < $maxrows){
				$next="<a href=\"".$script."pos=".($pos+EntryPerPage)."\">Next&gt;&gt;</a>";
			}else{
				$next= "";
			}
			if($totalpages > 1) print "<div align=\"center\">".$previous." $links ".$next."<br>&nbsp;</div>";
	
		}else{
				print "Review not found...";
		}
	}else{
				print "Review not found...";
	}
}
?>

</div>
</div>
</div>
<?php include("sidebar.php"); ?>
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
