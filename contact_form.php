<!DOCTYPE html>
<html>
<head>
    <title>Application Form</title> 
    <link href="css/contact_form.css" rel="stylesheet">
    <link rel="stylesheet" href="css/contact_form.css">
</head>
<body background="photos/food.jpg">
	<div class="format">
    <center>
	<h1>Thank You</h1>
	<?php
 
        $conn = mysqli_connect("localhost", "root", "", "food");
        $sql = "SELECT * FROM `contact_form`;";
        if($conn === false){
            die("INVALID "
                . mysqli_connect_error());
        }
        
		$Type_Query =  $_REQUEST['myQuery'];
        $Name = $_REQUEST['myName'];
        $Email = $_REQUEST['myEmail'];
        $Phone_Number =  $_REQUEST['myPhone'];
        $Message =  ($_REQUEST['mesg']);
        $Date_Time = $_REQUEST['date_time'];
        
        
	
	$sql = "INSERT INTO contact_form (type_query, name, email, phone_number, message, date_time) VALUES ('$Type_Query', '$Name', 
	'$Email', '$Phone_Number', '$Message', '$Date_Time')";
         
		  
		 
		 if(mysqli_query($conn, $sql)){
            echo "<h2>Submitted to DATABASE</h2>";
 
        } else{
            echo "INVALID $sql. "
                . mysqli_error($conn);
        }
         
     
        mysqli_close($conn);
        ?>
        <button type="submit"><a href="Homepage.html">Home</button></a>
    </center>
</div>	
</body>
</html>

