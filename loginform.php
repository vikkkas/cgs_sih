<?php
@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=md5($_POST['password']);
    
    
    $select="SELECT * FROM  user_info WHERE email = '$email' && password ='$password' ";
    $result = mysqli_query($conn,$select);
    if (mysqli_num_rows($result)>0){
       $row=mysqli_fetch_array($result);

       if($row['ugpg']=='UG')
       {
           $_SESSION['admin_name']=$row['name'];
           header('location:ugpage.php');
       }
       elseif($row['ugpg']=='PG')
       {
           $_SESSION['user_name']=$row['name'];
           header('location:pgpage.php');
       }
    }
    else
    {
        $error[]='inncorrect email or password';
    }
    
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>Login Now</h3>
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        }
        ?>
        <input type="email" name="email" required placeholder="Enter your E-Mail">
        <input type="password" name="password" required placeholder="Enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>Don't have an account? <a href="registerform.php">Register Now</a></p>

    </form>
</div>
    
</body>
</html>