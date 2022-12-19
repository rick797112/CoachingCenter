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
    <title>COURSE EDIT</title>
    <?php include("../Include/cdn.php");  ?>
</head>
<body>

<?php include("../Include/navbar.php"); ?>

<?php include("../Include/Title.php"); ?> 

<?php
     $result="";
    if(isset($_GET["course"])){
        $date=date("y-m-d");
        if(isset($_GET["cancel"])){
               header("Location: courses.php");
        }else if(isset($_GET["update"])){
             include("../Include/database.php");

             $sql2 = "select course from courses where Course='".$_GET['courseedit']."'";

             $sql1 = "update courses set Course='".strtoupper($_GET['courseedit'])."',Fee='".$_GET['feeedit']."', Updatedate='".$date."' where Course='".$_GET['course']."'";

             $res = mysqli_query($con,$sql2);
                if($res)
                    $row = mysqli_num_rows($res);
                 
            if($row > 0){
                $result="Course Already Exits";
             }else if(mysqli_query($con,$sql1)){
                header('Location:courses.php');
            }else{
                $result="Something Went Wrong...";
            }
        }
    }
?>
    <form action="" method="get">
        <div class="container">
                <?php
                    echo"<h3 class='font'>UPDATE COURSE </h3>";

                    include("../Include/database.php");

                    $sql="select Course, Fee from courses where Course='".$_GET['course']."'";
            
                    if ($res = mysqli_query($con, $sql)) 
                        while ($row = mysqli_fetch_assoc($res)) {
                            echo"<input  name='courseedit' style='width:40%;' class='form-control' value='".$row['Course']."'> </input><br>";
                            echo"<input  name='feeedit' style='width:40%;' class='form-control' value='".$row['Fee']."'> </input><br>";
                            echo"<input style='display:none' name='course' value='".$row['Course']."'></input>";
                        }else{
                         $result="Something Went Wrong";}

                    mysqli_close($con);

                ?>
                <button style="width:20%;" name="update" class="btn btn-success">UPDATE</button>
                <button style="width:20%;" name="cancel" class="btn btn-danger">CANCEL</button><br><br>
                <label style="color:red;" class="font"><h4><?php  echo $result ?></h4></label><br>
        </div>
    </form>
</body>
</html>