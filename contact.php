<?php include 'inc/header.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $fm->validation($_POST['name']);
	$email = $fm->validation($_POST['email']);
	$contact = $fm->validation($_POST['contact']);
	$message = $fm->validation($_POST['message']);
	

	$name = mysqli_real_escape_string($db->link, $name);
	$email = mysqli_real_escape_string($db->link, $email);
	$contact = mysqli_real_escape_string($db->link, $contact);
	$message = mysqli_real_escape_string($db->link, $message);

	$error = "";

	if (empty($name)) {
		$error = "Name must not be empty !";
	} elseif (empty($email)) {
		$error = "Email must not be empty !";
	} elseif (empty($contact)) {
		$error = "Contact field must not be empty !";

	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = "Invalid Email Address !";
	} elseif (empty($message)) {
		$error = "Subject field not be empty !";

	} else {
 $query = "INSERT INTO tbl_contact(name,email,contact,message) VALUES('$name','$email','$contact','$message')";

    $inserted_rows = $db->insert($query);

    if ($inserted_rows) {
     $msg = "Message Sent Successfully.";

    }else {
    $error = "Message not sent!";
    }
	}

	}

	?>





 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> With our loyal established help desk team consisting of Juliana, Hilda and Tobby, <a href="./">G2 Online Shop</a> is and will always be there for you in all situations of need. In case of any queries about how to place an order, how to make payments, or how to sign up, feel free to contact our help desk, which is always willing and more than ready to help you out. The customer is our boss, and therefore you are our priority! Please contact our help desk for any form of help and support. You may also send your reviews to us because that helps us to improve on our services and improve our performance. Thank you.</p>
  			</div>
  				<img src="images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>

				  <?php 
				if (isset($error)) {
					echo "<span style = 'color:red'>$error</span>";
				}

				if (isset($msg)) {
					echo "<span style = 'color:green'>$msg</span>";
				}


				?>
					    <form action="" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" name="name" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" name="email" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="contact" maxlength="10" placeholder="e.g 0784xxxxxx" value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea name="message"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p>Plot 3, Republic Street,</p>
						   		<p>Mbale City, Mbale,</p>
						   		<p>Uganda</p>
				   		<p>Mobile: <a href="tel:+256392500911">0392500911</a></p>
				   		<p>Phone: <a href="tel:+256200657998">0200657998</a></p>
				 	 	<p>Email: <span><a href="mailto:G2onlineshop@gmail.com">G2onlineshoppers@gmail.com</a></span></p>
				   		<p>Follow on: <span><a href="https://www.facebook.com">Facebook</a></span>, <span><a href="https://www.twitter.com">Twitter</a></span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php include 'inc/footer.php';?>