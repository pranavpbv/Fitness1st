<?php 
  session_start();
  include('connection.php');
  if(isset($_SESSION['userlogin']))
  {
	  header("location:myinfo.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<style>
		p{
			font-size:18px;
			color: black;
			text-align: left;
		}
		.error{
			color:red;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form name="patloginform" onsubmit="return validateForm()" action=""  method="POST">

<div class="signup">
            <div class="signup_head">
                <img src="image/admin1.png" alt="patient">
                <h1>User Login</h1>
            </div>
			<div class="input_control">
                <label><div class="lbl">Email</label></div>
				<input type="text" name="email" placeholder="Enter Email">
				<div class="error" id="emailErr"></div>
            </div>
			<div class="input_control">
                <label for=""><div class="lbl">Password</label></div>
				<input type="Password" name="password" placeholder="Enter Password">
				<div class="error" id="passwordErr"></div>
			</div>
			<div><br
			<label><font color="black" size="3px">Forgot Your Password ? </font></label><a href="forgot_password.php"> click here</a>
			</div>
            <div class="input_btn">
			<input type="submit" name="submit" value="Login">
			</div>
			<p>Not a Member ? <a href="index.php"> <font color="#394b75">Sign Up</font></a></p>
       </div>
	</form>
	<br><br><br>
<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
	$sql = "SELECT * FROM tbl_info WHERE email='$email' and password='$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	
	if($row>0)
			{
				$_SESSION["userlogin"]= $_POST['email'];
				header('location:myinfo.php');
			}
			else
			{
				echo"<script>alert('Login Fail Try Again....')</script>";
			}
			
	
$conn->close();		
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
    var email = document.patloginform.email.value;
	var password = document.patloginform.password.value;
    
	// Defining error variables with a default value
    var emailErr = passwordErr = true;
    
	// Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
		document.patloginform.email.focus();
		return false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
			document.patloginform.email.focus();
			return false;
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
	 // Validate Password
	 if(password == "") {
        printError("passwordErr", "Please Enter Your Password");
		document.patloginform.password.focus();
		return false;
    } else {              
			if((password.length < 5)) {
            printError("passwordErr", "Password Must Be 5 Character Long");
			document.patloginform.password.focus();
		return false;

        } else {
            printError("passwordErr", "");
			document.patloginform.password.focus();
            passwordErr = false;
        }
    }
};
</script>
</body>
</html>
