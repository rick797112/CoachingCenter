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
<?php
        include("../Include/navbar.php");
        include("../Include/Title.php");
        include("../Include/database.php");

        $pendingtotal = 0;
        $todaysamount = 0;
        $date = date("Y-m-d");
        $sql1 = "select * from studentfees";
        $sql2 = "select Paid from studentfees where Date ='".$date."'";
        echo"<br><h2 style='text-align:center;'class='font'>Fee Analysis</h2><br>";
        echo"<div class='container-fluid'  style='overflow-x:auto;'>";
        echo"<center><table id='usetTable' border='1' width='1200'>";
        echo"<thead><th>Name</th><th>Contact</th><th>Date</th><th>Fee</th><th>Paid</th><th>ToBePaid</th><th>Paid Via</th></thead><tbody>";

        if ($res = mysqli_query($con, $sql2)) 
        // Fetch one and one row
        while ($r = mysqli_fetch_assoc($res)) {
            $todaysamount = $todaysamount + $r["Paid"];
        }

        if ($result = mysqli_query($con, $sql1)) 
        // Fetch one and one row
        while ($row = mysqli_fetch_assoc($result)) {
            echo"<tr>";
            echo "<td>".$row["Name"]."</td>";
            echo "<td>".$row["Contact"]."</td>";
            echo "<td>".$row["Date"]."</td>";
            echo "<td>".$row["Fee"]."</td>";
            echo "<td>".$row["Paid"]."</td>";
            $ToBePaid = $row["Fee"] - $row["Paid"];
            $pendingtotal = $pendingtotal + $ToBePaid;
            echo "<td>".$ToBePaid."</td>";
            echo "<td>".$row["PaidVia"]."</td>";
            echo"</tr>";
        }

        mysqli_close($con);
        echo"</table></tbody></center></div>";
        
        echo"<br><br><h4 class='container-fluid font'>Today's Collection : &nbsp;".$todaysamount."</h4>";
        echo"<h4 class='container-fluid font'>Total Pending Amount &nbsp;&nbsp;: &nbsp;".$pendingtotal." </h4><br>";
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