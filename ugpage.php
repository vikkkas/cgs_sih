<?php
@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name']))
{
    header('location:loginform.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UG page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="content">
        <h3>Hi, <span>UG</span></h3>
        <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
        <p>This is an UG page</p>
        <a href="complain.php" class="btn">Complain Now</a>
        <a href="logout.php" class="btn">Logout</a> 
    </div>
</div>
    
</body>
</html>