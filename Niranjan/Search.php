<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calories</title>
</head>
<script>
    function createCell(cell, text,style) {
    var div = document.createElement('div'), 
        txt = document.createTextNode(text); 
    div.setAttribute('class', style);
    div.appendChild(txt);          
    cell.appendChild(div);
    }   
    function login() {
        var tbl = document.getElementById('tbl'),
        i;
    for (i = 1; i < tbl.rows.length; i++) {
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), 'Add','added');
    }
    }
    
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
    <a href="#home">Home</a>
    <a href="#" class="active">Food</a>
    <a href="#">Workout</a>
    
    <div class="dropdown">
        <button class="dropbtn">Fitness Calculator 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">BMI Calculator</a>
            <a href="#">Steps to Calories</a>
            <a href="#">Body Metabolism Calculator</a>
            <a href='#'>Calorie Calculator</a>
        </div>
        
    </div> 
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    <a href="#">Profile</a>
    <a href="#" onclick="location.href='Calories2.html'">Login</a>
    </div>
    <br><br>
    <!-- <input id="search" type="text" name="search" id="search">
    
    <input type="button" value="Search" id="button" onclick="location.href='Caloriess.html'"> -->
    <form action="Select.php" name="f1" method="post">
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
    $x1=$_POST['food'];
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    // $sql="Select * from calories where `Item Names`='$x1'";
    // $result=$conn->query($sql);
    $stmt=$conn->prepare("Select * from calories where `Item Names`=?");
    $stmt->bind_param("s",$x1);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo "<tr><td>". $row["S.No"]. "</td><td>" . $row["Item Names"] . " </td><td>". $row["Quantity"]. "</td><td>" . $row["Carbohydrates"]. "</td><td>" . $row["Proteins"]. "</td><td>" . $row["Fats"]. "</td><td>" . $row["Calories"]. "</td></tr>";
            }}
        else{
            echo "0 results";
            }
    $conn->close();
    ?>
    </table>
    <br><br>
    <button id="button" style="margin-left : 85%" onclick="history.back()">Go Back</button> 
    <br><br>
    <div class="bottomnav" id="bn">
        <a href="#0">Contact Us</a>
        <a href="#0">FAQ</a>
    </div>
</body>
</html>
