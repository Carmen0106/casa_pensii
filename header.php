<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php'; ?>
<?php session_start(); ?>
<?php
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/typeahead.js"></script>
    <script type="text/javascript" src="js/searchuser.js"></script>
    <title>Aplicatie pensii</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>
  
  <body>
 <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bine ai venit, <?php echo $_SESSION['user'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Acasa</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
                <form class="form-inline" style="padding-top: 10px" method="POST" action="dosar_rezultat.php">
                    <div class="form-group">
                      <label for="dosar">Cauta dosar</label>
                      <input type="search" class="form-control input-sm dosar" id="dosar" name="dosar" placeholder="numar dosar">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                 </form>
            </li>
                    
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
