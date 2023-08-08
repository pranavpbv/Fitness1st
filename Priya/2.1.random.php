<html>
<style>
    h4
    { 
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 250%;
        text-shadow: 2px 2px rgb(128, 126, 123);
    }
    
    body{background-color: peachpuff; font-size: 110%;}
    .container {
  display: flex;
  align-items: center;
  justify-content: center
}
.btns{
    border-color: brown;
    font-size: 15px; margin-left: 1%;
    background-color: orange;
    border-radius: 9px;
    padding:1%;
}
figure {
  max-width: 100%
}

.imageRight {
  flex-basis: 40%
}
.imageLeft{
flex-basis: 70%;
        order: 2;
}
.text {
    font-size: 20px;
    padding-left: 2%;
    padding-right: 3%;
    padding-bottom: 2%;
}
#showAni { text-align: center; animation-name: Ani; animation-duration:3s; animation-iteration-count:infinite; }
@keyframes Ani { from { font-size:100%; align: "center"; } to { font-size:150%; } }
</style>
<body><br>
<h2 style="background:orange;">The workouts chosen for you are:</h2>
    <?php
    $answer = $_POST['Duration']; 

    $conn=new mysqli("localhost","root","","jcomp");
    if($conn->connect_error)
    {
        die("Connection failed:".$conn->connect_error);
    }

if($answer==15)
{

    echo "Your regime for today consists of 4 exercises: 1 Yoga, 1 Strength Training and 2 Cardio";
    echo "<br><br>";

    $y1=rand(1,6);
    $s1=rand(1,6);
    $c1=rand(1,6);
    $c2=rand(1,6);

    $stmt=$conn->prepare("Select * from yoga where sno=?");
    $stmt->bind_param("i",$y1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 
    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 
    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 
    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 
    $conn->close();
}
else if($answer==30)
{

    echo "Your regime for today consists of 6 exercises: 2 Yoga, 2 Strength Training and 2 Cardio";
    echo "<br><br>";

    $y1=rand(1,6);
    $y2=rand(1,6);
    $s1=rand(1,6);
    $s2=rand(1,6);
    $c1=rand(1,6);
    $c2=rand(1,6);

    $stmt=$conn->prepare("Select * from yoga where sno=?");
    $stmt->bind_param("i",$y1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from yoga where sno=?");
    $stmt->bind_param("i",$y2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 
}
else if($answer==60)
{
    echo "Your regime for today consists of 11 exercises: 3 Yoga, 4 Strength Training and 4 Cardio";
    echo "<br><br>";
    $y1=rand(1,6);
    $y2=rand(1,6);
    $y3=rand(1,6);
    $s1=rand(1,6);
    $s2=rand(1,6);
    $s3=rand(1,6);
    $s4=rand(1,6);
    $c1=rand(1,6);
    $c2=rand(1,6);
    $c3=rand(1,6);
    $c4=rand(1,6);

    $stmt=$conn->prepare("Select * from yoga where sno=?");
    $stmt->bind_param("i",$y1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from yoga where sno=?");
    $stmt->bind_param("i",$y2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from yoga where sno=?");
    $stmt->bind_param("i",$y3);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s3);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from strength where sno=?");
    $stmt->bind_param("i",$s4);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c1);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c2);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c3);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 

    $stmt=$conn->prepare("Select * from cardio where sno=?");
    $stmt->bind_param("i",$c4);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        echo "Name: ".$row['name']."<br>";
        echo "Category: ".$row['category']."<br>"; 
        echo "Intensity: ".$row['intensity']."<br>"; 
        echo "reps: ".$row['reps']."<br>"; 
    }
    $stmt->close();
    echo "<br>"; 


}
?>
<p>To learn more about these exercises, <a href="3.0.Exercises.html">click here</a></p>
<h4 id="showAni" align="center">All the best!</h4>
<form name="f1">
        <p style="text-align: right;">
        <a href="2.RandomWorkoutGen.html"><input type="button" class="btns" style="background-color: orange" value="Back"></a><br></p>    </form>
</body>
</html>