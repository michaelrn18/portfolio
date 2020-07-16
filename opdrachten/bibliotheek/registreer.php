
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div id="frmRegistration">
<form class="form-horizontal" action="registreer_code.php" method="POST">
	<h1>Registreren</h1>
	<div class="form-group">
    <label class="control-label col-sm-2" for="username">username:</label>
    <div class="col-sm-6">
      <input type="text" name="username" class="form-control" id="firstname" placeholder="Enter voornaam">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="fullname">Volledige naam:</label>
    <div class="col-sm-6">
      <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter achternaam">
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6"> 
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="create" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>