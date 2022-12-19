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
    <title>STUDENTS</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

    <?php  include("../Include/cdn.php");  ?>
</head>
<body>
    <?php
        include("../Include/navbar.php");
        include("../Include/Title.php");
        include("../Include/database.php");

        $sql1 = "select * from xstudent";
        echo"<br><h2 style='text-align:center;'class='font'>X-STUDENTS DETAILS</h2><br>";
        echo"<div class='container-fluid' overflow-x:auto;'>";
        echo"<center><table id='usetTable' border='1' width='1000'>";
        echo"<thead><th>NAME</th><th>CONTACT</th><th>GMAIL</th><th>ADDRESS</th><th>COURSE</th><th>D.O.L.</th></thead><tbody>";
  
        if ($result = mysqli_query($con, $sql1)) 
          // Fetch one and one row
          while ($row = mysqli_fetch_assoc($result)) {
              echo"<tr>";
              echo "<td>".$row["Name"]."</td>";
              echo "<td>".$row["Contact"]."</td>";
              echo "<td>".$row["Gmail"]."</td>";
              echo "<td>".$row["Address"]."</td>";
              echo "<td>".$row["Course"]."</td>";
              echo "<td>".$row["D.O.L."]."</td>";
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
</body>
</html>