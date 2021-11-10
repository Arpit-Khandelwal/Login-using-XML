<?php 
session_start();
if (isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $xml=new SimpleXMLElement('users/'.$user.'.xml', 0,true);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="templates/style.css">
</head>
<body class="bluebg">
    <nav class="black z-depth-0">
        <div class="container">
            <a href="#" class="brand-logo brand-text">Home Page</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="logout.php" class="btn brand z-depth-0">Logout</a></li>
            </ul>
        </div>
    </nav>
    <h1 class="center">THIS IS CONFIDENTIAL INFO THAT IS ONLY ACCESSABLE IF DETAILS PROVIDED IS VALID</h1>

    <div class="container">
        <div class="grey lighten-4 container z-depth-3">
            <h4 class="center white-text">
                Personal Details
            </h4>
            <div class="container">
                <table>
                    <th>Field</th>
                    <th>Details</th>

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
                        <td>Mobile Number: </td>
                        <td><?php echo $xml->mobile; ?></td>
                    </tr>
                </table>
                <div class="blbox"></div>
            </div>
        </div>
    </div>
</body>
</html>