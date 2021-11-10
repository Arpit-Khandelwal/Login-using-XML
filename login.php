<?php
$user=$pass=$msg='';
    if(isset($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if(file_exists('users/'.$user.'.xml')){
            $xml= new SimpleXMLElement('users/'.$user.'.xml', 0,true);
            if($pass==$xml->pass){
                session_start();
                $_SESSION['user']=$user;
                header('Location: home.php');
            }
            else $msg="incorrect details";
        }
        else $msg="incorrect details";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="templates/style.css">
    <script defer src="templates/script.js"></script>
</head>

<body class="greenbg">
    <nav class="black z-depth-0">
        <div class="container">
            <a href="#" class="brand-logo brand-text">XML lab DA 4</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="logout.php" class="btn brand z-depth-0">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="grey lighten-4 container z-depth-2">
            <h4 class="center white-text">
                Sign up
            </h4>
            <form id="form" method="POST" class="white">
                <div>
                    <label for="name">Username</label>
                    <input type="text" name="user" id="user" value='<?php echo $user;?>'>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="pass" id="pass" value='<?php echo $pass;?>'>
                </div>
                <div class="center">
                    <button class="btn btn-primary" type="submit" value="Login" name="login">Submit</button>
                </div>
                <div class="red"><?php echo $msg;?></div>
            </form>
            <div class="blbox"></div>
            <div class="center">
                
                <p>Dont have an account?
                <a href="register.php">Create here</a></p>
            </div>
            <div class="blbox"></div>
        </div>
    </div>
</body>
<!-- <body>
    <h1>Login</h1>
    <form method="post" action="">
        <p>Username &nbsp;<input type="text" name="user" id="user" value='<?php echo $user;?>'></p>
        <p>Pass &nbsp;<input type="password" name="pass" id="pass" value='<?php echo $pass;?>'></p>
        <p class="red"><?php echo $msg?></p>
        <p><input type="submit" value="Login" name="login"></p>
    </form>
    <a href="register.php">Register Here</a>    
</body> -->
</html>