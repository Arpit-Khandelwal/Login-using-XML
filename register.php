<?php
$error='';
    if(isset($_POST['submit'])){
        
        $user=$_POST['user'];
        $email=$_POST['user_email'];
        $name=$_POST['name'];
        $pass=$_POST['password'];
        $cpass=$_POST['c_password'];
        $dob=$_POST['dob'];
        $phone=$_POST['phone'];

        if($user=='' || $email =='' || $name=='' ||$pass=='' ||$dob=='')$error='All Fields are required <br>';
        else if(file_exists('users/'.$user.'.xml'))$error='User already exists';
        else if($pass!=$cpass)$error='Passwords dont match';
        else{
            $xml = new SimpleXMLElement("<user></user>");
            $xml->addChild('pass',$pass);
            $xml->addChild('email',$email);
            $xml->addChild('mobile',$phone);
            $xml->addChild('date',$dob);
            $xml->addChild('name',$name);

            $xml->asXML('users/'.$user.'.xml');
            session_start();
            $_SESSION['user']=$user;
            header('Location: home.php');

        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IWP LAB ASSESSMENT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="templates/style.css">
    <script defer src="templates/script.js"></script>
</head>
<body class="greenbg">
    <div class="container">
        <div class=" grey lighten-4 container z-depth-2">
            <h4 class="center white-text">
                Register Here
            </h4>
            <form id="form" method="POST" class="white" >
                <div>
                    <label  for="first_Name">Name</label>
                    <input placeholder="Eg: John" type="text" id="first_name" name="name">
                </div>
                <div>
                    <label  for="email">Email</label>
                    <input placeholder="Eg: abc@example.com" type="email" id="email" name="user_email">
                </div>
                <div>
                    <label  for="name">Username</label>
                    <input type="text" name="user" id="user">
                </div>
                <div>
                    <label  for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label  for="c_password">Confirm Password</label>
                    <input type="password" name="c_password" id="c_password">
                </div>
                <div>
                    <label  for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob">
                </div>
                <div>
                    <label  for="mobile">Phone Number</label>
                    <input type="number" name="phone" id="mobile">
                </div>
                <br>
                <div class="center">
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>
                <div id="error" style="color: red;"><?php echo $error;?></div>
            </form>
            <div class="center">
                <p>Already have an account?
                <a href="login.php">Login here</a></p>
            </div>
            <div class="blbox black"></div>
        </div>
    </div>
    
</body>
</html>