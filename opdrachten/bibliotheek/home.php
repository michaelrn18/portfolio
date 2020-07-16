<?php
//including the database connection file
include_once("config.php");


//if(!isset($_SESSION['username'])){
//	header('location:login.php');
//}
$result = mysqli_query($mysqli, "SELECT * FROM books"); // using mysqli_query instead

?>

<html>
<head>	
	<title>Boekenlijst</title>
	<style>
	<?php include('css/home.css'); ?>
	</style>
</head>


<body>
<a class="button" href="add.html">Add New book</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Title</td>
		<td>author</td>
		<td>isbn13</td>
		<td>format</td>
		<td>publisher</td>
		<td>pages</td>
		<td>Dimensions</td>
		<td>overview</td>
		<td>available</td>
		<td>ID</td>
	
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['title']."</td>";
		echo "<td>".$res['author']."</td>";
		echo "<td>".$res['isbn13']."</td>";	
		echo "<td>".$res['format']."</td>";
		echo "<td>".$res['publisher']."</td>";
		echo "<td>".$res['pages']."</td>";
		echo "<td>".$res['dimensions']."</td>";
		echo "<td>".$res['overview']."</td>";
		echo "<td>".$res['available']."</td>";
		echo "<td>".$res['id']."</td>";


		echo "<td>
		<a class='button'href=\"edit.php?id=$res[id]\">Edit</a>
		<a class='button' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
		<a class='button' href=\"borrow.php?id=$res[id]\">Borrow</a>
		</td>";		
	}
	?>
	</table>
	
</body>
</html>
