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
    <?php include("../Include/cdn.php"); ?>
</head>
<body>
        <?php include("../Include/navbar.php"); ?>

        <?php include("../Include/Title.php"); ?> 

        <?php 
         $phone=$phoneError=$amountError=$result=$course=$name=$gmail=$fees="";
         $amount=$amt=$total=0;
         $paidvia="--PAID VIA--";

            if(isset($_GET['paid'])){               
                $paidvia=$_GET["paidvia"];
                $date = date("Y-m-d");
                $flag=0;

                $phonevalidation="/^[0-9]{10}$/";

                if(!is_numeric($_GET["phone"])){
                    $phoneError="* Please enter a valid number";
                    $flag=1;
                }else if(!preg_match($phonevalidation,$_GET["phone"])){
                    $phoneError = "* Invalid Number";
                    $flag=1;}
                else
                    $phone=$_GET["phone"];


                if(!is_Numeric($_GET['amount'])){
                    $amountError="* Invalid Entry";
                    $flag=1;
                }else{
                    $amount = $_GET["amount"];
                }

                if($flag==0){
                    include("../Include/database.php");

                    $sql= "select Name,Gmail,Course from student where Contact='".$phone."'";

                    $res=mysqli_query($con,$sql);

                        if($res)
                            $row = mysqli_num_rows($res);
                         
                        if($row > 0){
                            while ($row = mysqli_fetch_assoc($res)) {
                                $name=$row["Name"];
                                $course=$row["Course"];
                                $gmail=$row["Gmail"];
                        
                        }

                        //$result="CONFIRM STUDENT NAME ".$name;

                        $sql1="select Fee from courses where Course='".$course."'";

                        if ($res = mysqli_query($con, $sql1)){ 
                            while ($row = mysqli_fetch_assoc($res)) {
                                $fees=$row["Fee"];
                            }

                            $check="select Paid from studentfees where Contact='".$phone."'";

                            $res=mysqli_query($con,$check);

                            if($res)
                                $row = mysqli_num_rows($res);
                               
                            if($row > 0){
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $amt=$row["Paid"];
                                }
                                $total = $amount + $amt;  

                                if($total > $fees){
                                    if($amt==$fees){
                                        $result="TOTAL AMOUNT ALREADY PAID BY THE STUDENT";
                                    }else{
                                        $result = "AMOUNT EXCEEDS";
                                    }                               
                                }else{
                                    $date = date("Y-m-d");                 
                                    $sql="update studentfees set Paid='".$total."', Date= '".$date."', PaidVia='".$paidvia."' where Contact='".$phone."'";
        
                                    if(mysqli_query($con,$sql))
                                        $result="FEES UPDATED";
                                    else
                                        $result="Something Went Wrong..";
                                }
                            }else{
                               
                                $sql2="insert into studentfees values(Slno,'".$name."','".$course."','".$gmail."','".$phone."','".$date."',default,'".$fees."','".$amount."','".$paidvia."')";
                     
                                if(mysqli_query($con,$sql2)){
                                    $result="FEES RECORDED";
                                }else{
                                    $result="Something Went Wrong ...";
                                }                       

                        }                       
                    }else{
                        $result="NO STUDENT REGISTERED WITH THIS NUMBER";
                    }
                }
            }

        }

        ?>

<form action="?" method="get">
<div class="container row">
    <div class="col-sm-6 col-md-6 col-lg-6">
        <h5 class="font"><b>NOTE:</b>Please be ensure that the student gives their own registered number and not others
        because fees are recorded based on their phone numbers </h5><br>
        <h3 class="font">STUDENT FEES </h1>
        <input id="details" required name="phone"  value="<?php if(isset($_GET['paid'])) echo $phone; if(isset($_GET['contact'])) echo $_GET['contact']; ?>" style="width:60%;" placeholder="ENTER REGISTERED PHONE NUMBER" class="form-control"></input>
        <?php if(isset($_GET["paid"])) echo "<h6 style='color:red'>".$phoneError."</h6>"; ?><br>
        <input required name="amount"  value="<?php if(isset($_GET['paid'])) echo $amount;?>" style="width:60%;" placeholder="ENTER AMOUNT" class="form-control"></input><br/>
        <?php if(isset($_GET["paid"])) echo "<h6 style='color:red'>".$amountError."</h6>"; ?>
        <select required name="paidvia" style="width:60%;" class="form-control" placeholder="PAID VIA">
            <option  value="<?php if(isset($_GET['paid'])) echo $paidvia;?>"><?php echo $paidvia; ?></option>
            <option value="CASH">CASH</option>
            <option value="CARD">CARD</option>
            <option value="UPI">UPI</option>
        </select><br>
        <button name="paid" style="width:10%;" class="btn btn-success">PAY</button>
        <br><br><h4 style="color:red;" class="font"><?php  echo $result;  ?></h4>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">
        <p id="para"></p>

    </div>
</div>
</form>
<script>
    $(document).ready(function(){
        $("#details").focus();
        $("#details").blur(function(){
            var value=$("#details").val();
            $("#para").load("feeDetails.php",{
            phone : value
            });
        });
    });
</script>

</body>
</html> 