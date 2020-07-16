<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$title = mysqli_real_escape_string($mysqli, $_POST['title']);
	$author = mysqli_real_escape_string($mysqli, $_POST['author']);
	$isbn13 = mysqli_real_escape_string($mysqli, $_POST['isbn13']);
	$format = mysqli_real_escape_string($mysqli, $_POST['format']);		
	$publisher = mysqli_real_escape_string($mysqli, $_POST['publisher']);	
	$pages = mysqli_real_escape_string($mysqli, $_POST['pages']);	
	$dimensions = mysqli_real_escape_string($mysqli, $_POST['dimensions']);	
	$overview = mysqli_real_escape_string($mysqli, $_POST['overview']);			
    $available = mysqli_real_escape_string($mysqli, $_POST['available']);
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	// checking empty fields
	if(empty($title) ||  empty($author) ||  empty($isbn13) || empty($format) || empty($publisher) || empty($pages) || empty($dimensions) || empty($overview) || empty($id)) 
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
        if(empty($available)) {
            echo "<font color='red'>availble field is empty.</font><br/>";
        }

        if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }
        
       


    } else {
        //updating the table
        $sql2 = "UPDATE books SET title='$title',author='$author',isbn13='$isbn13',`format`='$format',publisher='$publisher',pages='$pages',dimensions='$dimensions',overview='$overview',available='$available' WHERE id=$id";
        
		$result = mysqli_query($mysqli, $sql2);
      //echo $sql2;
        header("Location: home.php");
    }
}
?>
<?php
//getting id from url
$id = $_REQUEST['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM books WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $author = $res['author'];
    $isbn13 = $res['isbn13'];
    $format = $res['format'];
    $publisher = $res['publisher'];
    $pages = $res['pages'];
    $dimensions = $res['dimensions'];
    $overview = $res['overview'];
    $available = $res['available'];
    $id = $res['id'];
   
}
?>
<html>
<head>
    <title>Edit Book </title>
</head>

<body>
    <a href="home.php">Home</a>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>title</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr> 
                <td>author</td>
                <td><input type="text" name="author" value="<?php echo $author;?>"></td>
            </tr>
            <tr> 
                <td>isbn13</td>
                <td><input type="text" name="isbn13" value="<?php echo $isbn13;?>"></td>
            </tr>
            <tr> 
                <td>format</td>
                <td><input type="text" name="format" value="<?php echo $format;?>"></td>
            </tr>
            <tr> 
                <td>publisher</td>
                <td><input type="text" name="publisher" value="<?php echo $publisher;?>"></td>
            </tr>
			<tr> 
                <td>pages</td>
                <td><input type="text" name="pages" value="<?php echo $pages;?>"></td>
            </tr>
            <tr> 
                <td>dimensions</td>
                <td><input type="text" name="dimensions" value="<?php echo $dimensions;?>"></td>
            </tr>
            <tr> 
                <td>overview</td>
                <td><input type="text" name="overview" value="<?php echo $overview;?>"></td>
            </tr>
            <tr> 
                <td>available</td>
                <td><input type="text" name="available" value="<?php echo $available;?>"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_REQUEST['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
