<?php 
session_start();
if (isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $xml=new SimpleXMLElement($user.'.xml', 0,true);
}
else{
    session_start();
    session_destroy();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
     <link rel="stylesheet" href="style1.css">
</head>
<body class="box">
    
   <h1>Personal Details </h1>
         <table>
                <tr>
                    <td>Name: </td>
                    <td><?php echo $xml->name;?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?php echo $xml->email;?></td>
                </tr>
                <tr>
                    <td>Date of Birth: </td>
                    <td><?php echo $xml->date; ?></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><?php echo $xml->username; ?></td>
                </tr>
            </table>
           <form action="logout.php"><input type="submit" value="Logout" /></form>
</body>
</html>