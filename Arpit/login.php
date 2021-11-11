<?php
$user=$pass=$msg='';
    if(isset($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if(file_exists($user.'.xml')){
            $xml= new SimpleXMLElement($user.'.xml', 0,true);
            if($pass==$xml->pass){
                session_start();
                $_SESSION['user']=$user;
                header('Location: feed.php');
            }
            else $msg="incorrect details";
        }
        else $msg="incorrect details";
    }
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title> Login Form</title>

    <link rel="stylesheet" href="style.css">

  </head>

  <body>

<form class="box" action="feed.php" method="post">

  <h1>Login</h1>

  <input type="text" name="username" placeholder="Username">

  <input type="password" name="pass" placeholder="Password">

  <input type="submit" name="" value="login">
  <div class="center">          
    <p> Dont have an account? <a href="register.php">Create here</a> </p>

  </div>
</form>

  </body>

</html>