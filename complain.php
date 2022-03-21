<?php
$insert = false;
if(isset($_POST['complainttype'])){
    
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection to this database failed due to".mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    $complainttype=$_POST['complainttype'];
    $ugpg=$_POST['ugpg'];
    $complaint =$_POST['complaint'];
    $sql = "INSERT INTO `com`.`com` (`complainttype`,`ugpg`, `complaint`, `dt`) VALUES ('$complainttype','$ugpg','$complaint', current_timestamp());";
    //echo $sql;

    if($con->query($sql)== true){
        //echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "Error : $sql <br> $con->error";
    }

    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complain Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <form action="" method="post">
        <h3>Welcome to AICTE Grievance Portal Complain Page</h3>
        <?php
        if($insert == true){
        echo "<p class='error-msg'>Response submitted</p>";
        }
    ?>
        <select id="complainttype"name="complainttype" required>
            <option select hidden value="">Select your Complaint Type</option>
            <option value="Education Related">Education Related</option>
            <option value="Examination">Examination</option>
            <option value="Management Related">Management Related</option>
            <option value="Miscellaneous">Miscellaneous</option>
        </select>

        <select id="ugpg" name="ugpg">
            <option select hidden value="">Select your Graduation Level</option>
            <option value="UG">UG</option>
            <option value="PG">PG</option>
        </select>

        <textarea name="complaint" id="complaint" cols="30" rows="10" style="display: block; border: 2px solid black; border-radius: 6px; outline: none; font-size: 20px; width: 100%; margin: 11px 0px; padding: 10px;" placeholder="Brief your complain" required></textarea>

        <input type="submit" name="submit" value="Submit" class="form-btn">


    </form>
</div>
    
</body>
</html>