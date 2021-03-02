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
button {
  margin:auto;
  display:block;
}
.wrapper {
    text-align: center;
}

 </style>
 <body>
   	        <h1 class="text-muted"><a href="index.php">SQL Injection</a></h1>
	<br/>
<hr style="height:2px;border-width:0;color:gray;background-color:gray">

      <h3 class="text-center"><span class="label label-danger">
Vulnerable Search</span></h3><br>

<p class="text-center">Enter the Mail Address - </p>
<form action="show.php" method="post">
<p class="text-center">
Email address: <input type="text" name="email" size="40">
</p>
<div class="wrapper">
<button type="submit" class="btn btn-success">Search</button>
</div>
</form>

<hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>Query Executed:</h4>
        </div>
      </div>
	  
	  <?php
// Turn off error reporting
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
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre><?= $query ?></pre>
          </div>
        </div>
      </div>
      
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
  $sql = "SELECT user_email, display_name FROM my_users WHERE user_email = \"" . $_POST['email'] . "\"";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        echo $row['user_email'] . ": " . $row['display_name'] . " <br>";
    }
	 </pre>
          </div>
        </div>
      </div>
      
       <hr>
      

 <div class="row">
        <div class="col-sm-12">
          <h4>Vulnerability:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre>
Pass <strong>a" UNION ALL SELECT TABLE_SCHEMA,TABLE_NAME from information_schema.TABLES; -- 
</strong> <br/> OR <br/><strong> <br/>a" UNION ALL SELECT COLUMN_NAME,COLUMN_TYPE from information_schema.COLUMNS where TABLE_NAME = "my_users"; -- </strong>in author field.<br>
            </pre>
          </div>
        </div>
      </div>
      
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
<?php
// Turn off error reporting
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
</body>
