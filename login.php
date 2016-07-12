<?php include 'config/config.php'; ?>
<?php include 'libraries/Database.php';?>
<?php session_start();?>
<?php
$db = new Database();
    
if(isset($_POST['signin'])){
    $username = mysqli_real_escape_string($db->link, $_POST['username']);
    $password = mysqli_real_escape_string($db-> link, $_POST['password']);
    //creaza query
    $query = "SELECT * FROM useri WHERE username= '$username' AND parola='$password'";
    
    //ruleaza query
    $dosare = mysqli_query($db->link, $query);
    $row= $dosare->fetch_assoc();
    
    
    if($dosare->num_rows > 0){
        $_SESSION['id']= $row['id'];
        $_SESSION['tip']= $row['tip'];
        $_SESSION['user']= $username;
        header('Location: index.php');
        exit();    
    }else{
        $msg = "Username-ul sau parola sunt gresite.";
    }
}   
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <title>Signin</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
        <?php if(isset($msg)): ?>
        <div class="alert alert-danger"><?php echo $msg;?></div>
        <?php endif;?>
        <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input  name="username" type="text" class="form-control" placeholder="enter username" required>
        <label class="sr-only">Password</label>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


   <script src="js/bootstrap.js"></script>

</html>
