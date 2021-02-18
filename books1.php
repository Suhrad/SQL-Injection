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

      <h3 class="text-center"><span class="label label-danger">
Vulnerable Search</span></h3><br>
      
      <div class="row">
        <div class="col-sm-10">
          <form class="form-inline" role="form" action="books1.php" method="GET">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Book title</label>
              <input type="text" name="title" class="form-control" placeholder="Book title">
            </div>
            <div class="form-group">
              <label class="sr-only" for="exampleInputPassword2">Book author</label>
              <input type="text" name="author" class="form-control"placeholder="Book author">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
          </form>
        </div>
        <div class="col-sm-2">
          <span class="visible-xs">&nbsp;</span>
          <a href="books1.php?all=1"><button type="button" class="btn btn-info">All books</button></a>
        </div>
      </div>
      
      <br>
      
      <table class="table table-bordered">
        <tr>
          <th>#ID</th>
          <th>User</th>
          <th>Password</th>
        </tr>
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
        if ($_GET['all'] == 1)
        {
            $query = "SELECT * FROM books;";
        }
        else if ($_GET['title'] || $_GET['author'])
        {
            $query = sprintf("SELECT * FROM books WHERE title = '%s' OR author = '%s';",
                             $_GET['title'],
                             $_GET['author']);
        }
            
		if ($query != null)
		{
			$result = mysqli_query($connection, $query);

			while (($row = mysqli_fetch_row($result)) != null)
			{
				printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[1], $row[2]);
			}
		}
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
      </table>
      
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
if ($_GET['all'] == 1)
{
    $query = "SELECT * FROM books;";
}
else if ($_GET['title'] || $_GET['author'])
{
    $query = sprintf("SELECT * FROM books WHERE title = '%s' OR author = '%s';",
                             $_GET['title'],
                             $_GET['author']);
}

if ($query != null)
{
    $result = mysqli_query($connection, $query);

    while (($row = mysqli_fetch_row($result)) != null)
    {
        printf("&lt;tr&gt;&lt;td&gt;%s&lt;/td&gt;&lt;td&gt;%s&lt;/td&gt;&lt;td&gt;%s&lt;/td&gt;&lt;/tr&gt;", $row[0], $row[1], $row[2]);
    }
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
Pass <strong>' UNION SELECT * FROM users WHERE '1'='1</strong> as author to get all users data.<br>
The same result is obtained by using url <a href="books1.php?author='+UNION+SELECT+*+FROM+users+WHERE '1'='1"><strong>books1.php?author='+UNION+SELECT+*+FROM+users+WHERE '1'='1</strong></a>.
            </pre>
          </div>
        </div>
      </div>
      
      <br>


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
</html>
