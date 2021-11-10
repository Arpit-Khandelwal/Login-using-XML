<?php
$error='';
    if(isset($_POST['submit'])){
        
       
        $user=$_POST['user'];
        $email=$_POST['email'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $cpass=$_POST['c_password'];
        $dob=$_POST['dob'];

        if($user=='' || $email =='' || $name=='' ||$pass=='' ||$dob=='')$error='All Fields are required <br>';
        else if(file_exists('.xml'))$error='User already exists';
        else if($pass!=$cpass)$error='Passwords dont match';
        else{
            $xml = new SimpleXMLElement("<user></user>");
            $xml->addChild('pass',$pass);
            $xml->addChild('email',$email);
            $xml->addChild('date',$dob);
            $xml->addChild('name',$name);
            $xml->addChild('username',$user);
            $xml->asXML($user.'.xml');
            session_start();
            $_SESSION['user']=$user;
            header('Location: feed.php');
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div class="container">
        
        <form class="box" method="post" >
            
            <input placeholder= "Name" type="text" id="first_name" name="name">
            
            <input placeholder="Email" type="email" id="email" name="email">
        
            <input placeholder="Username" type="text" name="user" id="user">
        
            <input placeholder="Password" type="password" name="pass" id="password">
        
            <input placeholder="Confirm Password" type="password" name="c_password" id="c_password">
        
            <input placeholder="DD/MM/YY" type="text" name="dob" id="dob">

            <input type="submit" name="submit" >
           
            <p>Already have an account?
            <a href="login.php">Login here</a></p>
        </form>

    </div>
    
</body>
</html>