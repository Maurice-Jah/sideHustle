<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <style>
      body{
          background-color:powderblue;
          text-align:center;
      }


        

    </style>
</head>
<body>

<h1>You have successfuly logged in</h1>
<h2>Below are your details:</h2>

<h3>FirstName: <?php echo $_SESSION['firstname'] ?> </h3>
<h3>LastName:<?php echo $_SESSION['lastname'] ?> </h3>
<h3>Email Address: <?php echo $_SESSION['email'] ?></h3>
<h3>Password: <?php echo $_SESSION['password'] ?> </h3>
    
</body>
</html>