<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
   $Email = mysqli_real_escape_string($conn, $_POST['email']);
   $Password = md5($_POST['password']);
   $Type = isset($_POST['type']) ? $_POST['type'] : '';

   $select = "SELECT * FROM register WHERE email = '$Email' AND password = '$Password' AND type = '$Type'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['Type']=='buyer'){
         header('Location:Homepage.html');
         exit();
      }
      elseif($row['Type']=='seller'){
         header('Location:Data.php');
         exit();
      }
   }
   else{
      $error = 'Incorrect Details';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link href="css/login_form.css" rel="stylesheet">
   <link rel="stylesheet" href="css/login_form.css">
</head>
<style>
   body {
      font-family: Arial, sans-serif;
      background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(227, 227, 227, 0.25)), url('Photos/food.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
   }
</style>
<body>
<div class="form-container">
   <form action="" method="post">
      <h3>Login Now</h3>
      <?php
      if(isset($error)){
         echo '<span class="error-msg">'.$error.'</span>';
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="radio" name="type" value="buyer" <?php if(isset($_POST['type']) && $_POST['type'] == 'buyer') echo 'checked'; ?>> Buyer
      <input type="radio" name="type" value="seller" <?php if(isset($_POST['type']) && $_POST['type'] == 'seller') echo 'checked'; ?>> Seller
      <input type="submit" name="submit" value="Login" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
      <center>
         <h4><a href="Homepage1.html">HOME</a></h4>
      </center>
   </form>
</div>
</body>
</html>
