<?php 
session_start();
include("connection.php");
if(count($_POST)>0) {
	$sql = "UPDATE tbl_info set addhar='" . $_POST["addhar"] . "',name='" . $_POST["name"] . "', email='" . $_POST["email"] ."', contact='" . $_POST["contact"] . "',age='" . $_POST["age"] . "',weight='" . $_POST["weight"] . "' ,height='" . $_POST["height"] . "' WHERE id='" . $_POST["uid"] . "'";
	mysqli_query($conn,$sql);
	if($conn->query($sql) === TRUE)
		{
			echo"<script>alert('Information Update Successfully!!!!');</script>";
			echo"<script>location.replace('myinfo.php');</script>";
		}
		else
		{
			echo"<script>alert('Information Not Updated Try Again......');</script>";
		}
}
$select_query="SELECT * FROM tbl_info where email='" . $_SESSION["userlogin"] . "'";
$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
	<style>
		.headd
		{
			 font-size: 30px;
			 text-align:right;
			
			 text-decoration:none;
			  color:white;
		}
		.error{
			color:red;
		}
		
	</style>
    <link rel="stylesheet" href="style.css">
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
    <a href="../Vignesh/myinfo.php" class="active">Profile</a>
    <a href="../Pranav/Forum/login.php">Forum</a>
    <a href="../Vignesh/login.php" >Login</a>
    <a href="logout.php"></b>Logout</a>
    </div>
    <br><br>
<!--<?php echo $_SESSION["userlogin"];?>-->
<form action="" method="POST" name="infoupdateform" onsubmit="return validateForm()">
<div class="signup">
            <div class="signup_head">
                <img src="image/user.png" alt="doctor">
                <h1>My Information</h1>
            </div>
    <div class="input_control">
		<label><div class="lbl">Name</label></div>
        <input type="hidden" name="uid"  value="<?php echo $row['id']; ?>">
		<input type="text" name="name"  value="<?php echo $row['name']; ?>" placeholder="Enter Name" >
		<div class="error" id="nameErr"></div>
    </div>
    <div class="input_control">
		<label><div class="lbl">Email</label></div>
		<input type="text" value="<?php echo $row['email']; ?>" placeholder="Enter Email" name="email" readonly>
		<div class="error" id="emailErr"></div>
    </div>
    <div class="input_control">
		<label><div class="lbl">Contact</label></div>
		<input type="text" value="<?php echo $row['contact']; ?>" placeholder="Enter Contact" name="contact" >
		<div class="error" id="mobileErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">Aadhar</label></div>
		<input type="text" value="<?php echo $row['addhar']; ?>" placeholder="Enter Aadhar" name="addhar" >
		<div class="error" id="addharErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">Age</label></div>
		<input type="text" value="<?php echo $row['age']; ?>" placeholder="Enter Age" name="age" >
		<div class="error" id="ageErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">weight</label></div>
		<input type="text" value="<?php echo $row['weight']; ?>" placeholder="Enter weight" name="weight" >
		<div class="error" id="weightErr"></div>
    </div>
	<div class="input_control">
		<label><div class="lbl">height</label></div>
		<input type="text" value="<?php echo $row['height']; ?>" placeholder="Enter Height" name="height" >
		<div class="error" id="heightErr"></div>
    </div>
    
   <div class="input_btn">
			<input type="submit" name="submit" value="UPDATE" onclick='return checkupdate()'>
	</div>
</div>
</form>
<script>
// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var name = document.infoupdateform.name.value;
    var email = document.infoupdateform.email.value;
    var contact = document.infoupdateform.contact.value;
	var age = document.infoupdateform.age.value; 
	var addhar = document.infoupdateform.addhar.value; 
	var weight = document.infoupdateform.weight.value; 
	var height = document.infoupdateform.height.value; 

	// Defining error variables with a default value
    var nameErr = emailErr = mobileErr = addressErr = ageErr = blooddErr = addharErr = weightErr= heightErr=true;
     
    // Validate name
    if(name == "" || name.replace(/\s/g,"").length <=0 ) {
        printError("nameErr", "Please enter your name");
		document.infoupdateform.name.focus();
		return false;
    } else {
		if(name.length <3 ){
            printError("nameErr", "Name Must Be 3 Character Long");
		document.infoupdateform.name.focus();
		return false;
        }else{
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
			document.infoupdateform.name.focus();
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
		document.infoupdateform.email.focus();
		return false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
			document.infoupdateform.email.focus();
		return false;
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    
    // Validate mobile number
    if(contact == "") {
        printError("mobileErr", "Please enter your mobile number");
		document.infoupdateform.contact.focus();
		return false;
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(contact) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
			document.infoupdateform.contact.focus();
		return false;
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
	
	// Validate Age
	if(age == "") {
        printError("ageErr", "Please Enter Your Age");
		document.infoupdateform.age.focus();
		return false;
    } else {              
        if(isNaN(age) || age<1 || age>100) {
            printError("ageErr", "Please Enter Age Between 1 To 100");
			document.infoupdateform.age.focus();
			return false;
        } else {
            printError("ageErr", "");
			document.infoupdateform.age.focus();
            ageErr = false;
        }
    }
	// Validate addhar number
    if(addhar == "") {
        printError("addharErr", "Please enter your addhar number");
		document.infoupdateform.addhar.focus();
		return false;
    } else {
        var regex = /^\(?([0-9]{4})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if(regex.test(addhar) === false) {
            printError("addharErr", "Please enter a valid 12 digit addhar number");
			document.infoupdateform.addhar.focus();
		return false;
        } else{
            printError("addharErr", "");
            addharErr = false;
        }
    }
	
	// Validate weight
	if(weight == "") {
        printError("weightErr", "Please Enter Your weight");
		document.infoupdateform.weight.focus();
		return false;
    } else {              
        if(isNaN(weight) || weight<1 || weight>100) {
            printError("weightErr", "Please Enter weight Between 1 To 100");
			document.infoupdateform.weight.focus();
			return false;
        } else {
            printError("weightErr", "");
			document.infoupdateform.weight.focus();
            weightErr = false;
        }
    }
	// Validate height
	if(height == "") {
        printError("heightErr", "Please Enter Your height");
		document.infoupdateform.height.focus();
		return false;
    } else {              
        if(isNaN(height) || height<1 || height>200) {
            printError("heightErr", "Please Enter height Between 1 To 100");
			document.infoupdateform.height.focus();
			return false;
        } else {
            printError("heightErr", "");
			document.infoupdateform.height.focus();
            heightErr = false;
        }
    }
	
    
};
</script>
<br>
<div class="bottomnav" id="bn">
        <a href="../Pranav/contactus.html">Contact Us</a>
        <a href="../Pranav/FAQ.html">FAQ</a>
</div>

</body>
</html>