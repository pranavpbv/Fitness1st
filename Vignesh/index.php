<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$sql1 = "SELECT * FROM tbl_info WHERE addhar='".$_POST['addhar']."'";
	$result = $conn->query($sql1);
	if($result->num_rows>0)
	{
		echo"<script>alert('Sorry!!! This aadhar card number Is Already Exist!');</script>";
	}
	else
	{
        $query = "INSERT INTO  tbl_info (addhar,name,email,contact,password,age,weight,height) VALUES
		('" . $_POST["addhar"] ."','" . $_POST["name"] ."','" . $_POST["email"] ."','" . $_POST["contact"] ."','" . $_POST["password"] ."','" . $_POST["age"] ."','" . $_POST["weight"] ."','" . $_POST["height"] ."')";
		if(mysqli_query($conn,$query)){
			 echo "<script>alert('Registration Successful!');</script>";
            echo "<script>window.location = 'login.php';</script>";;
		}
		else
		{
			echo"<script>alert('Account Not Created Successfull Try Again......');</script>";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style>
		p{
			font-size: 18px;
			color: black;
			text-align: left;
		}
		.error{
			color:red;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
    window.onscroll = function() {myFunction1()};
    var myTopnav = document.getElementById("myTopnav");
    var sticky = myTopnav.offsetTop;
    
    function myFunction1() {
      if (window.pageYOffset >= sticky) {
        myTopnav.classList.add("sticky")
      } else {
        myTopnav.classList.remove("sticky");
      }
    }
</script>
<link rel="stylesheet" href="navstyle.css">
<body>
<h1 style="text-align: center;font-style: oblique;font-family: 'Franklin Gothic Medium';">Fitness1st</h1>
    <div class="topnav" id="myTopnav">
    <a href="../Pranav/review2_homepage.html">Home</a>
    <a href="../Niranjan/FDCMP.html" >Food</a>
    <a href="../Priya/1.Page1.html">Workout</a>
    <div class="dropdown">
        <button class="dropbtn">Fitness Calculator 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="../Bhuvi/bmi.html">BMI Calculator</a>
            <a href="../Bhuvi/bmr.html">Steps to Calories</a>
            <a href="../Bhuvi/cal.html">Body Metabolism Calculator</a>
            <a href='../Niranjan/Calories.php'>Calorie Calculator</a>
        </div>
    </div> 
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    <a href="../Vignesh/myinfo.php" >Profile</a>
    <a href="../Pranav/Forum/login.php">Forum</a>
    <a href="../Vignesh/login.php" class="active">Login</a>
    <a href="logout.php"></b>Logout</a>
    </div>
    <br><br>
<form name="registerform" onsubmit="return validateForm()" method="post" action="#">
<div class="signup">
            <div class="signup_head">
                <img src="image/user.png" alt="user">
                <h1>Register Form</h1>
            </div>
	<div class="input_control">
	<label><div class="lbl">Name</label></div>
		<input type="text" name="name" placeholder="Enter Name">
		<div class="error" id="nameErr"></div>
    </div>

    <div class="input_control">
		<label><div class="lbl">Email</label></div>
		<input type="text" placeholder="Enter Email" name="email"  >
		<div class="error" id="emailErr"></div>
    </div>
    
    <div class="input_control">
		<label><div class="lbl">Contact</label></div>
		<input type="text" placeholder="Enter Contact"  name="contact">
		<div class="error" id="mobileErr"></div>
    </div>
    <div class="input_control">
		<label><div class="lbl">Password</label></div>
        <input type="Password" placeholder="Enter Password"  name="password" >
		<div class="error" id="passwordErrr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">Age</label></div>
		<input type="text" name="age" placeholder="Enter Age">
		<div class="error" id="ageErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">Aadhar Card</label></div>
		<input type="text" name="addhar" placeholder="Aadhar Card Number">
		<div class="error" id="addharErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">Weight</label></div>
		<input type="text" name="weight" placeholder="Enter Weight">
		<div class="error" id="weightErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">Height</label></div>
		<input type="text" name="height" placeholder="Enter height">
		<div class="error" id="heightErr"></div>
    </div>
    
	<div class="input_btn">
			<input type="submit" name="submit" value="Register">
	</div>
	<p>Already a member? <a href="login.php"> <font color="#394b75">Sign In</font></a></p>
	</div>
</form>
<br>
<br>
<br>
<script>
// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.registerform.name.value;
    var email = document.registerform.email.value;
    var contact = document.registerform.contact.value;
	var password = document.registerform.password.value;
	var age = document.registerform.age.value; 
	var addhar = document.registerform.addhar.value; 
	var weight = document.registerform.weight.value; 
	var height = document.registerform.height.value; 

	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = passwordErrr= addressErr = ageErr = blooddErr = addharErr = weightErr= heightErr=true;
     
    // Validate name
    if(name == "" || name.replace(/\s/g,"").length <=0 ) {
        printError("nameErr", "Please enter your name");
		document.registerform.name.focus();
		return false;
    } else {
		if(name.length <3 ){
            printError("nameErr", "Name Must Be 3 Character Long");
		document.registerform.name.focus();
		return false;
        }else{
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
			document.registerform.name.focus();
		return false;
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
		}
    }
    
    // Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
		document.registerform.email.focus();
		return false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
			document.registerform.email.focus();
		return false;
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(contact == "") {
        printError("mobileErr", "Please enter your mobile number");
		document.registerform.contact.focus();
		return false;
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(contact) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
			document.registerform.contact.focus();
		return false;
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
	// Validate Password
    if(password == "" || password.replace(/\s/g,"").length <=0 ) {
        printError("passwordErrr", "Please enter your Password");
		document.registerform.password.focus();
		return false;
    } else {
        if((password.length < 6)) {
            printError("passwordErrr", "Password Must Be 6 Character Long");
			document.registerform.password.focus();
		return false;
        } else{
            printError("passwordErrr", "");
            passwordErrr = false;
        }
    }
	// Validate Age
	if(age == "") {
        printError("ageErr", "Please Enter Your Age");
		document.registerform.age.focus();
		return false;
    } else {              
        if(isNaN(age) || age<1 || age>100) {
            printError("ageErr", "Please Enter Age Between 1 To 100");
			document.registerform.age.focus();
			return false;
        } else {
            printError("ageErr", "");
			document.registerform.age.focus();
            ageErr = false;
        }
    }
	// Validate addhar number
    if(addhar == "") {
        printError("addharErr", "Please enter your addhar number");
		document.registerform.addhar.focus();
		return false;
    } else {
        var regex = /^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if(regex.test(addhar) === false) {
            printError("addharErr", "Please enter a valid 12 digit addhar number");
			document.registerform.addhar.focus();
		return false;
        } else{
            printError("addharErr", "");
            addharErr = false;
        }
    }
	// Validate weight
	if(weight == "") {
        printError("weightErr", "Please Enter Your weight");
		document.registerform.weight.focus();
		return false;
    } else {              
        if(isNaN(weight) || weight<1 || weight>100) {
            printError("weightErr", "Please Enter weight Between 1 To 100");
			document.registerform.weight.focus();
			return false;
        } else {
            printError("weightErr", "");
			document.registerform.weight.focus();
            weightErr = false;
        }
    }
	
	// Validate height
	if(height == "") {
        printError("heightErr", "Please Enter Your height");
		document.registerform.height.focus();
		return false;
    } else {              
        if(isNaN(height) || height<1 || height>200) {
            printError("heightErr", "Please Enter height Between 1 To 100");
			document.registerform.height.focus();
			return false;
        } else {
            printError("heightErr", "");
			document.registerform.height.focus();
            heightErr = false;
        }
    }
	
    
};
</script>
<div class="bottomnav" id="bn">
        <a href="../Pranav/contactus.html">Contact Us</a>
        <a href="../Pranav/FAQ.html">FAQ</a>
</div>
</body>
</html>