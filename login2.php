<?php 
    require "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SQL Injection</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
<style>
  
h1{
	text-align:center; 
	color:Tomato;
	font-size=50px;
}
 </style>
  <body>
       	        <h1 class="text-muted"><a href="index.php">SQL Injection</a></h1>
	<br/>
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
    
      
      <h3 class="text-center"><span class="label label-success">
Secure Standard Login</span></h3><br>
      
      <?php
	   error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
        if ($_GET['attempt'] != 1)
        {
      ?>
      
      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="login2.php?attempt=1" method="POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-8">
                <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-8">
                <input name="password" type="text" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
              </div>
            </div>
          </form>
        </div>  
      </div>
      
      <?php
	   error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
        }
        else
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
                             mysqli_real_escape_string($connection, $username),
                             mysqli_real_escape_string($connection, $password));
          
            $result = mysqli_query($connection, $query);
          
            if ($result->num_rows > 0)
            {
                echo "<p class=\"text-center\">Authenticated as <strong>" . $username . "</strong></p>";
              
                // ...
                // $_SESSION['logged_user'] = $username;
                // ...
            }
            else
            {
                echo "<p class=\"text-center\">Wrong username/password combination.</p>";
            }
			 error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
      ?>
      
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>Query Executed:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre><?= $query ?></pre>
          </div>
        </div>
      </div>
      
      <?php } ?>
      
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>PHP Code:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre>
$username = $_POST['username'];
$password = $_POST['password'];

$query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
                 mysqli_real_escape_string($connection, $username),
                 mysqli_real_escape_string($connection, $password));

$result = mysqli_query($connection, $query);

if ($result->num_rows > 0)
{
    echo "Authenticated as " . $username;

    // ...
    // $_SESSION['logged_user'] = $username;
    // ...
}
else
{
    echo "Wrong username/password combination.";
}
            </pre>
          </div>
        </div>
      </div>
      
      <br>


    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
