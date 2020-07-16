<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
    $available = mysqli_real_escape_string($mysqli, $_POST['available']);
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$author = mysqli_real_escape_string($mysqli, $_POST['author']);
	$isbn13 = mysqli_real_escape_string($mysqli, $_POST['isbn13']);
	$format = mysqli_real_escape_string($mysqli, $_POST['format']);		
	$publisher = mysqli_real_escape_string($mysqli, $_POST['publisher']);	
    $pages = mysqli_real_escape_string($mysqli, $_POST['pages']);	
    
	$dimensions = mysqli_real_escape_string($mysqli, $_POST['dimensions']);	
    $overview = mysqli_real_escape_string($mysqli, $_POST['overview']);		
    
	

				
		// checking empty fields
	if(empty($title) ||  empty($author) ||  empty($isbn13) || empty($format) || empty($publisher) || empty($pages) || empty($dimensions) || empty($overview)||  empty($id) || empty($available)) 
	{

        if(empty($title)) {
            echo "<font color='red'>title field is empty.</font><br/>";
        }

        if(empty($author)) {
            echo "<font color='red'>author field is empty.</font><br/>";
        }

        if(empty($isbn13)) {
            echo "<font color='red'>isbn13 field is empty.</font><br/>";
        }

        if(empty($format)) {
            echo "<font color='red'>format field is empty.</font><br/>";
        }

        if(empty($publisher)) {
            echo "<font color='red'>publisher field is empty.</font><br/>";
        }

        if(empty($pages)) {
            echo "<font color='red'>pages field is empty.</font><br/>";
        }

        if(empty($dimensions)) {
            echo "<font color='red'>dimensions field is empty.</font><br/>";
        }

        if(empty($overview)) {
            echo "<font color='red'>overview field is empty.</font><br/>";
        }
       if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }
        if(empty($available)) {
            echo "<font color='red'>available field is empty.</font><br/>";
        }
       
		//link to the previous page
		
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO books(title, author, isbn13, `format`, publisher, pages, dimensions, overview, id, available) VALUES ('$title','$author','$isbn13','$format','$publisher','$pages','$dimensions','$overview','$id','yes')");
		
		//display success message
		echo "<font color='green'>booksadded successfully.";
		echo "<br/><a href='home.php'>View Result</a>";
    }
    
}
?>

</body>
</html>
