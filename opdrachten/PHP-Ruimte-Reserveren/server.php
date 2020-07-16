<?php
session_start();

$today = date("Y-m-d");
$username = "";
$title = "Ruimte Reserveren";

$errors = array(); 
$reservation_errors = array();

// db variables
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ruimte_reserveren";

$db = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

consolelog("test");

// register
if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // check of form goed is ingevuld
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  //check of username al bestaat
  $user_check_query = "SELECT * FROM account WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // als er geen errors zijn wordt de nieuwe user aangemaakt
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO account (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
    $_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// login
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM account WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      if(strpos($username, "lokaal") !== false) {
        header('location: classroom.php');
      } else {
        header('location: index.php');
      }
  	}else {
  		array_push($errors, "Wrong username/password");
  	}
  }
}

// reserveren
if (isset($_POST['r_time'])) {
  
  // variabelen
  $lokaal     = mysqli_real_escape_string($db, $_POST['room']);
  $date       = mysqli_real_escape_string($db, $_POST['date']);
  $time_start = mysqli_real_escape_string($db, $_POST['time_start']);
  $time_end   = mysqli_real_escape_string($db, $_POST['time_end']);
  $name       = mysqli_real_escape_string($db, $_SESSION['username']);

  // checkt of er geen errors zijn
  if (empty($lokaal))             { array_push($reservation_errors, "Room is required"); }
  if (empty($date))             { array_push($reservation_errors, "Date is required"); }
  if (empty($time_start))       { array_push($reservation_errors, "Time start is required"); }
  if (empty($time_end))         { array_push($reservation_errors, "Time end is required"); }
  if (empty($name))             { array_push($reservation_errors, "No user login"); }
  if ($time_start > $time_end)  { array_push($reservation_errors, "Start time can not be later than End time"); }

      
  $reservation_check_query = "SELECT * FROM reservaties WHERE date = '$date' AND lokaal = '$lokaal'";
  $result = mysqli_query($db, $reservation_check_query);
  
  if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
      if ($row['time_end'] > $time_start) {
        array_push($reservation_errors, "Time already ocupied");
      }
    }
  }

  // als er geen errors zijn, wordt het in de database gezet
  if (count($reservation_errors) == 0) {

    $query = "INSERT INTO reservaties (id, date, time_start, time_end, name, lokaal) 
          VALUES('', '$date', '$time_start', '$time_end', '$name', '$lokaal')";
    mysqli_query($db, $query);
    header('location: index.php?action=reserveren');
  }
}
// eind reserveren

// lokaal toevoegen
if (isset($_POST['add_room'])) {
  $room = mysqli_real_escape_string($db, $_POST['room']);

  $sql = "INSERT INTO lokalen (id, name) VALUES (NULL, '$room')";
  mysqli_query($db, $sql);
  header('location: index.php?action=lokalen');
}

// verander gebruikersnaam
if (isset($_POST['changeUsername'])) {
  $new = mysqli_real_escape_string($db, $_POST['new_username']);
  $old = $_SESSION['username'];

  $sql = "UPDATE account SET username = '$new' WHERE username='$old'";
  mysqli_query($db, $sql);
  $_SESSION['username'] = $new;
  header('location: index.php?action=instellingen');
}

// custom php-js functies voor debuggen
function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

function consolelog($msg) {
  echo "<script type='text/javascript'>console.log('$msg');</script>";
}

?>