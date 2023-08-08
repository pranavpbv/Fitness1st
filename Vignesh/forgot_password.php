<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<style>
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.error{
			color:red;
		}
	</style>
</head>
<body>
<form name="fpasswordform" onsubmit="return validateForm()" action=""  method="POST">

<div class="signup">
            <div class="signup_head">
                <img src="image/changepass.png" alt="Forgot Password">
                <h1>Forgot Password</h1>
            </div>
			<div class="input_control">
                <label><div class="lbl">Enter Email</label></div>
				<input type="text" name="email" placeholder="Enter Email">
				<div class="error" id="emailErr"></div>
            </div>
			
			<div>
			<label><font color="black" size="3px">Login To Account ? </font></label><a href="login.php"> click here</a>
			</div>
            <div class="input_btn">
			<input type="submit" name="submit" value="Send Email">
			</div>
       </div>
	</form>
	<br><br><br>
<?php
include("connection.php");

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer/autoload.php';


if(isset($_POST['submit']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$query = "SELECT * FROM tbl_info WHERE email='$email'";
	$run = mysqli_query($conn,$query);
	if(mysqli_num_rows($run)>0){
		$row=mysqli_fetch_array($run);
		$db_email = $row['email'];
		$name = $row['name'];
		$db_id = $row['id'];
		$sendpass = $row['password'];
		if(mysqli_query($conn,$query)){
			$mail = new PHPMailer();

				$mail->IsSMTP();
				$mail->Host     = "smtp.gmail.com"; // SMTP server Gmail
				$mail->SMTPAuth = true; // turn on SMTP authentication
				$mail->SMTPSecure = 'tls'; 
				$mail->Port = 587; 
				$mail->SMTPDebug = true;  


				$mail->Username = "vikeylakshmiselva@gmail.com"; // 
				$mail->Password = "9092331487"; // SMTP password
				$webmaster_email = "vikeylakshmiselva@gmail.com"; //Reply to this email ID
				$uemail = "$db_email"; // Recipients email ID
				$uname = "$name"; // Recipient's name
				$mail->From = $webmaster_email;
				$mail->FromName = "Vickey";
				$mail->AddAddress($uemail,$uname);
				$mail->AddReplyTo($webmaster_email,"Vickey");
				$mail->WordWrap = 50; // set word wrap

				$mail->IsHTML(true); // send as HTML
				$mail->Subject = "You Just Requested For Forgot Password ";
				$mail->Body = "<h2>Your Email : $db_email <br> Your Password Is : $sendpass <br>"; //HTML Body
				if(!$mail->Send())
				{
				echo "Mailer Error: " . $mail->ErrorInfo;
				}
				else
				{
				echo "<script>alert('Email has been sent to You Plase Check Your Email');</script>";
				//echo"<script>alert('Student Record Inserted Successfully!!!!');</script>";
				echo"<script>location.replace('login.php');</script>";
				}
		}
	}else{
		echo"<script>alert('User Not Found');</script>";
	}
}
?>
<script>
// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var email = document.fpasswordform.email.value;
    
	// Defining error variables with a default value
    var emailErr = true;
    
	// Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
		document.fpasswordform.email.focus();
		return false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
			document.fpasswordform.email.focus();
			return false;
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
};
</script>
</body>
</html>
