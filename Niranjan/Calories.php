<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calories</title>
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
<link rel="stylesheet" href="Styles.css">
<body> 
    <h1 style="text-align: center;font-style: oblique;font-family: 'Franklin Gothic Medium';">Fitness1st</h1>
    <div class="topnav" id="myTopnav">
    <a href="../Pranav/review2_homepage.html">Home</a>
    <a href="../Niranjan/FDCMP.html" >Food</a>
    <a href="../Priya/1.Page1.html">Workout</a>
    <div class="dropdown">
        <button class="dropbtn" class="active">Fitness Calculator 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="../Bhuvi/bmi.html">BMI Calculator</a>
            <a href="../Bhuvi/bmr.html">Steps to Calories</a>
            <a href="../Bhuvi/cal.html">Body Metabolism Calculator</a>
            <a href='../Niranjan/Calories.php' >Calorie Calculator</a>
        </div>
    </div> 
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    <a href="../Vignesh/myinfo.php">Profile</a>
    <a href="../Pranav/Forum/login.php">Forum</a>
    <a href="../Vignesh/login.php">Login</a>
    </div>
    <br><br>
    <form action="Search.php" name="f1" method="post">
        <input id="search" type="text" name="food">
        <input type="submit" value="Search" id="button"><br>
    </form>
    <br><br> 
    <h3><center>List of foods</center></h3>
    <table id="tbl" style="width: 90%;margin-left: 5%;">
        <tr>
            <th>S.no</th>
            <th>Item Names</th>
            <th>Quantity</th>
            <th>Carbohydrates</th>
            <th>Proteins</th>
            <th>Fats</th>
            <th>Calories</th>
        </tr>
    <?php
    $conn=new mysqli("localhost","root","","iwp project");
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    $stmt=$conn->prepare("Select * from calories");
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()){
        echo "<tr><td>". $row["S.No"]. "</td><td>" . $row["Item Names"] . " </td><td>". $row["Quantity"]. "</td><td>" . $row["Carbohydrates"]
        . "</td><td>" . $row["Proteins"]. "</td><td>" . $row["Fats"]. "</td><td>" . $row["Calories"]. "</td></tr>";
        }}
    else{
        echo "0 results";
        }
    $conn->close();
    ?>
    </table>
    <br><br><br><br>
    <div class="bottomnav" id="bn">
        <a href="../Pranav/contactus.html">Contact Us</a>
        <a href="../Pranav/FAQ.html">FAQ</a>
    </div>
</body>
</html>

