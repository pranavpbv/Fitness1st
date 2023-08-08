<?php
$conn=new mysqli("localhost","root","","iwp project");
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$a=$_POST['food'];
$x="rakesh";
// $sql = (" DELETE FROM $x WHERE `Item Names`= '$a'");
$stmt=$conn->prepare("DELETE FROM $x WHERE `Item Names`= ?");
$stmt->bind_param("s",$a);
$stmt->execute();
$conn->close();
header("Location: Calories2.php");
exit;
?>
   