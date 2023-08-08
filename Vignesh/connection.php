<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_master";
//create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check Connection
if ($conn->connect_error)
{
    die("Connection Failed : " . $conn->connect_error);
}
?>

<?php
/*$servername = "sql301.byetcluster.com";
$username = "epiz_26816237";
$password = "wAIdjbXrFGuryeX";
$dbname = "epiz_26816237_db_master";
//create Connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check Connection
if ($conn->connect_error)
{
    die("Connection Failed : " . $conn->connect_error);
}*/
?>
