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

        $sql1 = "select * from student";
        echo"<br><h2 style='text-align:center;'class='font'>STUDENTS DETAILS</h2><br>";
        echo"<div class='container-fluid'  style='overflow-x:auto;'>";
        echo"<center><table id='usetTable' border='1' width='1200'>";
        echo"<thead><th>Operation</th><th>NAME</th><th>CONTACT</th><th>GMAIL</th><th>ADDRESS</th><th>COURSE</th><th>D.O.J.</th></thead><tbody>";
  
        if ($result = mysqli_query($con, $sql1)) 
          // Fetch one and one row
          while ($row = mysqli_fetch_assoc($result)) {
              echo"<tr>";
              echo"<td><a href='StudentEdit.php?Slno=".$row['Id']."'>Edit</a>/<a href='StudentDelete.php?Slno=".$row['Id']."'>Delete</a>/<a href='fees.php?contact=".$row['Contact']."'>Fees</a></td>";
              echo "<td>".$row["Name"]."</td>";
              echo "<td>".$row["Contact"]."</td>";
              echo "<td>".$row["Gmail"]."</td>";
              echo "<td>".$row["Address"]."</td>";
              echo "<td>".$row["Course"]."</td>";
              echo "<td>".$row["DOJ"]."</td>";
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