<h3 style="color:red;" class="font"> CONFIRM STUDENT DETAILS</h3><br>
<?php
    $pending=0;
  if(isset($_POST["phone"])){
    $contact = $_POST["phone"];

    include("../Include/database.php");

    $sql="select Name,Course,Fee,Paid,Gmail from studentfees where Contact='".$contact."'";

    $res=mysqli_query($con,$sql);

    if($res)
        $row = mysqli_num_rows($res);
 
    if($row > 0){
        while ($row = mysqli_fetch_assoc($res)){
            echo"<table>";
            echo"<tr><td><h4>NAME</td><td>:</td><td>".$row['Name']."</h4></td></tr>";
            echo"<tr><td><h4>GMAIL</td><td>:</td><td>".$row['Gmail']."</h4></td></tr>";
            echo"<tr><td><h4>COURSE</td><td>:</td><td>".$row['Course']."</h4></td></tr>";
            echo"<tr><td><h4>COURSE FEE</td><td>:</td><td>".$row['Fee']."</h4></td></tr>";
            echo"<tr><td><h4>TOTAL AMOUNT PAID</td><td>:</td><td>".$row['Paid']."</h4></td></tr>";
            $pending = $row["Fee"] - $row["Paid"];
            echo"<tr><td><h4 style='color:red;'>AMOUNT PENDING</td><td>:</td><td> $pending</h4></td></tr>";
            echo"</table>";
        }
    }else{
            echo"<h4 style='color:red;'>No Record </h4>";
        }

        
}
?>