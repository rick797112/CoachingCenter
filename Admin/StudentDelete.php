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
        $date=date("y-m-d");
        $id=$_GET['Slno'];
        if(isset($_GET['Slno']) && isset($_GET['student'])){
            if($_GET['student']=="cancel")
                header('location: ViewStudent.php');
            else if($_GET['student']=="delete"){
                    include('../Include/database.php');

                    $sql="select * from student where Id='".$_GET['Slno']."'";

                    $res=mysqli_query($con,$sql);
                    while ($row = mysqli_fetch_assoc($res)) {
                       $name=$row["Name"];
                       $contact=$row["Contact"];
                       $gmail=$row["Gmail"];
                       $address=$row["Address"];
                       $course=$row["Course"];
                    }

                    $sql1="insert into xstudent values(Id,'".$name."','".$contact."','".$gmail."','".$address."','".$course."','".$date."')";

                   if(mysqli_query($con,$sql1)){
                        $sql2="delete from student where Id='".$_GET['Slno']."'";

                        if(mysqli_query($con,$sql2))
                            header('location: ViewStudent.php');
                        else
                            $result="<br>Somrthing Went Wrong..";
                   }else{
                       $result = "<br>Something Went Wrong..";
                   }

                   mysqli_close($con);
                 
                }
        }
?>

<div class="container">
        <b>NOTE:</b>   This will delete the student from active list of students and will move to X-Student list.<br>
        It is recommended to delete a student only when the student completes a course and moved <br>
        out or if the student is <b style='color:red;'>Inactive</b>.<br> 
        <label class="font"><h3>Are you sure you want to delete the student?</h3></label><br>
        <?php
             include('../Include/database.php');

             $sql="select * from student where Id='".$_GET['Slno']."'";

             $res=mysqli_query($con,$sql);
             while ($row = mysqli_fetch_assoc($res)) {
                        echo"<input readonly style='width:40%;' class='form-control' value='".$row['Name']."'> </input><br>";
                       
                        echo"<input readonly style='width:40%;' class='form-control' value='".$row['Contact']."'> </input><br>";
                     
                        echo"<input readonly style='width:40%;' class='form-control' value='".$row['Gmail']."'> </input><br>";
                        
                        echo"<input  readonly style='width:40%;' class='form-control' value='".$row['Address']."'></input><br>";
                
                      
             }

             mysqli_close($con);
        ?>
        <a href="?student=delete&Slno=<?php echo $id; ?>"><button style="width:20%;" class="btn btn-danger">DELETE</button></a>
        <a href="?student=cancel&Slno=<?php echo $id; ?>"><button style="width:20%;" class="btn btn-success">CANCEL</button></a><br>
        <label class="font"><h3><?php  echo $result ?></h3></label><br>
</div>
</body>
</html>