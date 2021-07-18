<?php







?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- Css -->
     <link rel="stylesheet" href="css/style.css">
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">


    <title>Login</title>
</head>
<body>

<div class="wrapper">



<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
<h2 class='heading'>Enter A New Password</h2>

<label for="password">
      <input type="password" name="password" id="password" placeholder="New Password">
</label>

    <label for="cpassword">
      <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
    </label>

  <input type="submit" value="Submit" name="submit">

  </form>

  

</div>
    
</body>
</html>