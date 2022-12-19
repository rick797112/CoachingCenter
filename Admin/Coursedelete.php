<?php
    session_start();
    if(isset($_SESSION["username"])){
      
    }else{
        header("Location: index.php");
    }
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../Include/cdn.php");  ?>
</head>
<body>

<?php include("../Include/navbar.php"); ?>

<?php include("../Include/Title.php"); ?> 

<?php
    $result="";
        $course = $_GET["course"];

        if(isset($_GET['crse'])){
            if($_GET['course']=="cancel")
                header('location: courses.php');
            else if($_GET['course']=="delete"){
                    include('../Include/database.php');

                    $sql="delete from courses where Course='".$_GET["crse"]."'";

                    if(mysqli_query($con,$sql))
                        header('location: courses.php');
                    else
                        $result="Somrthing Went Wrong..";
                }
        }
?>

<div class="container">
        <b>NOTE:</b>   This will delete the course from everywhere but it will not effect the data of any X-Student<br>
        who had completed the course or the students who are currently involved in the course.<br>
        <label class="font"><h3>Are you sure you want to delete (<?php  echo $course ?>)?</h3></label><br>
        <a href="?course=delete&crse=<?php echo $course ?>"><button style="width:20%;" class="btn btn-danger">DELETE</button></a>
        <a href="?course=cancel&crse=<?php echo $course ?>"><button style="width:20%;" class="btn btn-success">CANCEL</button></a><br>
        <label class="font"><h3><?php  echo $result ?></h3></label><br>
</div>
</body>
</html>