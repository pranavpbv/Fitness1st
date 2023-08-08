<?php

    $answer = $_POST['NAME']; 
    $conn=new mysqli("localhost","root","","customer");
    if($conn->connect_error)
    {
        die("Connection failed:".$conn->connect_error);
    }
    $stmt=$conn->prepare("Select * from details where name=?"); 
    $stmt->bind_param("s",$answer);
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc())
    {
        $speed=(int)$row['Speed'];
        $gen=(int)$row['Gender'];
        $age=(int)$row['Age'];
        $ht=(int)$row['Height'];
        $wt=(int)$row['Weight'];
    }
    $ans=result;
    echo $ans;
    $stmt->close();
?>