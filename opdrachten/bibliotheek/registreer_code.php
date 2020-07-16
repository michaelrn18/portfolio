<?php
require_once('conn.php');
$userid = $username = $pwd = $password = $pwd = $fullname = '';

$userid = $_POST['userid'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$fullname =  $_POST['fullname'];

$sql = "INSERT INTO user (userid,username,password,fullname) VALUES ('$userid','$username','$pwd','$fullname')";
$result = mysqli_query($conn, $sql);
if($result)
{
	header("Location: index.php");
}
else
{
	echo "Error :".$sql;
}
?>