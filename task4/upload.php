<?php


//Connection to DB
require_once 'config.php';
$table = 'post';


  if(isset($_POST['submit'])){
      $file = $_FILES['file'];
    

      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['name'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];
  }

  //Type of files to be allowed
  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');
  if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
        //   if($fileSize < 1000000000){
              //unique name
              $fileNameNew = uniqid('', true) . "." .$fileActualExt;
              $fileDestination = 'uploads/' .$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);


              $sql = "INSERT IGNORE INTO $table (name, uploads,price) VALUES ('rice', '$fileDestination', '$34.00')";
                $conn->query($sql) or die($conn->error);

                // $result = $conn->query($sql)  or die($conn->mysqli->error);
              
            //   header("Location:login.php?uploadsucss");
			
            echo "<script> alert('Your products were uploaded') </script>";

            header("Refresh:0; url= users/dashboard.php");



        //   } else{
        //       echo "You file is to big";
        //   }

            
      }else{
         echo "There was an error uploading your file!";
      }

  }else{
      echo "You cannot upload files of this type";
  }
 

?>