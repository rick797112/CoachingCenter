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
    <title>Courses</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <?php include("../Include/cdn.php"); ?>
</head>
<body>
        <?php include("../Include/navbar.php"); ?>

        <?php include("../Include/Title.php"); ?> 

        <h3 class="font col-sm-12 col-lg-12 col-md-12">ADD COURSE </h1> 

    <form action="?" method="post">
        <div class="row container ">
            <div class="col-sm-5 col-md-5 col-lg-5">
                <input required name="course" placeholder="ENTER COURSE NAME" class="form-control"></input> 
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5">
                <input required name="fee" placeholder="COURSE FEES" class="form-control"></input> 
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <button name="btn" class="btn btn-success" name="save">ADD</button>
            </div>
        </div>
    </form>

    <?php
      include("../Include/database.php"); 
      $result=$courses="";

      if(isset($_POST['btn'])){
        $course = $_POST["course"];
        $fee= $_POST["fee"];
        $date = date("y-m-d");

        $check = "select Course from courses WHERE Course='".$course."'";

        $res=mysqli_query($con,$check);
        if($res)
            $row = mysqli_num_rows($res);
  
        if($row > 0)
            $result = "**Course Already Exist..";
        else{
            $sql= "insert into Courses values(Slno,'".strtoupper($course)."','".$fee."','".$date."','".$date."',default)";

            if(mysqli_query($con,$sql))
                $result = "**Course Added..";
            else 
                $result = "**Something Went Wrong...";
        }
        
      }
 
       echo "<p style='color:red;' class='font col-sm-12 col-lg-12 col-md-12'>".$result."</p>";
       echo"<br><h3 class='font col-sm-12 col-lg-12 col-md-12'>CURRENTLY OFFERED COUSES </h3>";
  

       $sql1 = "select * from courses";
      echo"<br><h2 style='text-align:center;'class='font'>FEE STRUCTURE</h2><br>";
      echo"<div class='container-fluid' style='overflow-x:auto;'>";
      echo"<center><table id='usetTable' border='1' width='1000'>";
      echo"<thead><th>Operation</th><th>COURSES</th><th>FEES</th><th>LAST UPDATED</thead><tbody>";

      if ($result = mysqli_query($con, $sql1)) 
        // Fetch one and one row
        while ($row = mysqli_fetch_assoc($result)) {
            echo"<tr>";
            echo"<td><a href='courseEdit.php?course=".$row['Course']."'>Edit</a>/<a href='Coursedelete.php?course=".$row['Course']."'>Delete</td>";
            echo "<td>".$row["Course"]."</td>";
            echo "<td>".$row["Fee"]."</td>";
            echo "<td>".$row["Updatedate"]."</td>";
            echo"</tr>";
        }
    
      mysqli_close($con);
      echo"</table></tbody></center></div>";
        
    ?>
        <script>
            $(document).ready(function() {
                $('#usetTable').DataTable();
            } );
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <br><br><br>

     
</body>
</html>