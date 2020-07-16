<?php 
include_once("config.php");
$id = $_GET['id'];
$sql = mysqli_query($mysqli, "UPDATE books SET available='no' WHERE id=$id");

header("Location:home.php");
?>
