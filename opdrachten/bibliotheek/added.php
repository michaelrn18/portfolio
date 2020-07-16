<?php 
$result = mysqli_query($mysqli, "INSERT INTO books(title, author, isbn13, `format`, publisher, pages, dimensions, overview, id, available) VALUES ('$title','$author','$isbn13','$format','$publisher','$pages','$overview','$id','$available')");
$title = $_POST['title'];
$author= $_POST['author'];
$isbn13= $_POST['isbn13']; 
$format= $_POST['format'];
$publisher= $_POST['publisher']; 
$pages = $_POST['pages'];
$dimensions= $_POST['dimensions'];

?>