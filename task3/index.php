<?php

require_once 'config.php';

 // initialize errors variable
 $errors = "";

	// insert a task if submit button is clicked
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
            $sql = "INSERT INTO todo(task) VALUES ('$task')";
            $result = $conn->query($sql);
		}  
        
	}


// UPDATE
     if (isset($_GET['update_task'])) {
        $id = $_GET['update_task'];
        $errors = "Update " .  $id;
        $sql = "UPDATE todo SET task =''  WHERE id =  $id";
        $result = $conn->query($sql);
        if (empty($_POST['task'])) {
            $errors = "Update " .  $id;
        } else{
            $sql = "UPDATE todo SET task ='$task' WHERE id =  $id";
            $result = $conn->query($sql);
             header("Location:index.php");
            
        }
       
    }




    // delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        $sql = "DELETE FROM todo WHERE id = '$id'";
       $result = $conn->query($sql);

       //To chhange the numbers when deleted
           $sql_alter = "ALTER TABLE todo AUTO_INCREMENT= 1";
            $result_alter = $conn->query($sql_alter);


            header("Location:index.php");
    }


   
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
     
     body{
        background-image: linear-gradient(to right,#ccc , #666);       
     }

     .wrapper{
         margin: 120px auto;
         border-radius:10px;
         box-shadow: 10px 10px 8px 10px #888888;
         max-width: 500px;
         width:100%;
         padding: 25px;
         background:#fff;
     }

     .header{
        font-size:30px;
        font-weight: bold;
        text-align: center;
     }

     .todo{
         list-style-type:none;
        
     }

     li{
        height: 45px;
        line-height: 45px;
        background-color: #f2f2f2;
        margin-bottom: 8px;;
        padding: 0 15px;
        margin-left:-40px;
        width:95%;
        position: relative;
       
     }

     
     input[type="text"]{
         height: 45px;
         margin:20px auto;
         outline:none;
         width:70%;
         padding: 0 20px;
         border:1px solid #ccc;
         border-radius:5px;
       
     }

     .add{
        height:45px;
         border:none;
        width:60px;
        background-color: #8e49e8;
        color:white;
        cursor: pointer;
        margin-left:5px;
        border-radius:3px;
        font-size: 22px;
     }

     .update{
       background-color: #5FCBD4;
       height:45px;
        border:none;
        width:60px;
        color:white;
        cursor: pointer;
        margin-left:5px;
        border-radius:3px;
        font-size: 22px;
        position: absolute;
        right:70px;
     }

    a{
        text-decoration:none;
        
    }

    .btn{
        position: absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
    }

    .delete{
        background-color: #e74c3c;
        height:45px;
        border:none;
        width:60px;
        color:white;
        cursor: pointer;
        margin-left:5px;
        border-radius:3px;
        font-size: 22px;
        position: absolute;
        right:0;
    }
    .error{
        color:red;
        font-size: 20px;
        font-weight: bold;
        margin-bottom:-10px;
        }
        

    </style>

</head>
<body>

 <div class="wrapper">
    <p class="header">ToDo App</p>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php if (isset($errors)) { ?>
	<p class = "error"><?php echo $errors; ?></p>
     <?php } ?>
     <!-- hidden -->
     <input type="hidden" name="id" value="<?php echo $id; ?> ">
    <input type="text" name="task" placeholder ="Add your new todo">
    <button type="submit" name = "add" class = "add"><i class="fa fa-plus"> </i></button>

    <?php 
    $sql =  "SELECT * FROM todo";
    $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $task = $row['task'];
     ?>

    <ul class = 'todo'>
        <li> <?php echo $row["id"]."."  ." "." ". $row["task"]?> 
        <a href="index.php?update_task=<?php echo $row['id'] ?>" class='update'><i class='fa fa-edit btn'></i> </a>
        <a href="index.php?del_task=<?php echo $row['id'] ?>" class='delete'><i class='fa fa-trash btn' ></i> </a>
        </li>
    </ul>
    
     <?php
                }
            }else{
                    echo " <p style = 'text-align:center; font-weight:bold; font-size:48px'> 0 results </p>";
                }
    ?>

    </form>

 </div>

</body>
</html>

