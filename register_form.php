<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $Name = mysqli_real_escape_string($conn, $_POST['name']);
   $Email = mysqli_real_escape_string($conn, $_POST['email']);
   $Password = md5($_POST['password']);
   $ConfirmPass = md5($_POST['cpassword']);
   $Type = $_POST['type'];

   $select = " SELECT * FROM register WHERE email = '$Email' && password = '$Password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($Password != $ConfirmPass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO register (name, email, password, type) VALUES('$Name','$Email','$Password','$Type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>


   <link rel="stylesheet" href="css/register.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your Fullname">
      <input type="email" name="email" required placeholder="Enter your Email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="type">
         <option value="buyer">Buyer</option>
         <option value="seller">Seller</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login now</a></p>
   </form>

</div>

</body>
</html>