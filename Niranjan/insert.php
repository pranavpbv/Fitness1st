<?php
$conn=new mysqli("localhost","root","","iwp project");
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$a=$_POST['food'];
$x="rakesh";
// $sql1="Select * from calories Where `Item Names` = '$a'";
$stmt=$conn->prepare("Select * from calories Where `Item Names` = ?");
$stmt->bind_param("s",$a);
$stmt->execute();
$result = $stmt->get_result();
    if ($result->num_rows > 0){ 
        $row = $result->fetch_assoc();
        $x1=$row["Item Names"];
        $x2=$row["Quantity"];
        $x3=$row["Calories"];
        // $sql2 = ("INSERT INTO $x VALUES ('$x1','$x2','$x3')");
        // $conn->query($sql2);
        $stmt2=$conn->prepare("INSERT INTO $x VALUES (?,?,?)");
        $stmt2->bind_param("ssi",$x1,$x2,$x3);
        $stmt2->execute();
        }
    else{
        echo "0 results";
        }
$conn->close();
header("Location: Calories2.php");
exit;
?>

   