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
        $result="";
            if(isset($_GET["course"])){
                header("Location: ViewStudent.php");
            }else if(isset($_GET['save'])){               
                        $con=$nameEdit=$phoneEdit=$addressEdit=$gmailEdit=$nameError=$contactError=$addressError=$gmailError="";
                        $course=$_GET["courseEdit"];
                        $id=$_GET["Slno"];
                        $flag=0;
                        if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$_GET["nameEdit"])){
                            $nameError="* Only characters are allowed";
                            $flag=1;
                        }else if(strlen($_GET["nameEdit"]) > 30){
                            $nameError = "* Only 30 characters accepted";
                            $flag=1;}
                        else
                            $name=$_GET["nameEdit"];



                        if(strlen($_GET["addressEdit"]) > 50){
                            $addressError = "* Only 50 characters accepted";
                            $flag=1;}
                        else
                            $address=$_GET["addressEdit"];

                            
                        $phonevalidation="/^[0-9]{10}$/";

                        if(!is_numeric($_GET["contactEdit"])){
                            $contactError="* Please enter a valid number";
                            $flag=1;
                        }else if(!preg_match($phonevalidation,$_GET["contactEdit"])){
                            $contactError = "* Invalid Number";
                            $flag=1;}
                        else
                            $phone=$_GET["contactEdit"];


                        $validEmail = "^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$^";

                        if(!preg_match($validEmail,$_GET["gmailEdit"])){
                            $gmailError="* Please enter a valid Email";
                            $flag=1;}
                        else
                            $gmail = $_GET["gmailEdit"];

                    if($flag==0){
                        include("../Include/database.php");

                        $check = "select Gmail,Contact from student WHERE (Gmail='".$gmail."' || Contact='".$phone."') && !(Id='".$id."')";
      
                        $res=mysqli_query($con,$check);

                        if($res)
                            $row = mysqli_num_rows($res);

                        if($row > 0){
                            echo"<script>alert('Record Already Exist...');</script>";
                        }else{
                            $sql1 = "update student set Name='".$name."',Contact='".$phone."', Address='".$address."',Gmail='".$gmail."', Course='".$course."'where Id='".$id."'";

                            if(mysqli_query($con,$sql1)){
                                header("Location:ViewStudent.php");
                            }else{
                                $result="Something Went Wrong";
                            }
                    }
                    mysqli_close($con);
                }
            }
            
        ?>

    <form action="?" method="GET">
        <div class="container">
                <?php
                    echo"<h3 class='font'>UPDATE STUDENT DETAILS </h3>";
                    include("../Include/database.php");

                    $sql="select * from student where Id='".$_GET['Slno']."'";
            
                    if ($res = mysqli_query($con, $sql)) 
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo"<input  name='nameEdit' style='width:40%;' class='form-control' value='".$row['Name']."'> </input><br>";
                        if(isset($_GET["save"])) echo "<span style='color:red'>".$nameError."</span>";
                        echo"<input readonly name='contactEdit' style='width:40%;' class='form-control' value='".$row['Contact']."'> </input><br>";
                        if(isset($_GET["save"])) echo "<span style='color:red'>".$contactError."</span>";
                        echo"<input  name='gmailEdit' style='width:40%;' class='form-control' value='".$row['Gmail']."'> </input><br>";
                        if(isset($_GET["save"])) echo "<span style='color:red'>".$gmailError."</span>";
                        echo"<input  name='addressEdit' style='width:40%;' class='form-control' value='".$row['Address']."'></input><br>";
                        if(isset($_GET["save"])) echo "<span style='color:red'>".$addressError."</span>";
                        echo"<input readonly name='courseEdit' style='width:40%;' class='form-control' value='".$row['Course']."'></input><br>";                     
                        echo"<input  style='display:none' name='Slno' value='".$_GET['Slno']."'></input>";
                    }

                    mysqli_close($con);
                ?>
                <button name="save" style="width:20%;" class="btn btn-success">UPDATE</button>
                <button name="course" style="width:20%;" class="btn btn-danger">CANCEL</button><br><br>
                <label style="color:red; " class="font"><h4><?php echo $result ?></h4></label><br>
        </div>
    </form>

</body>
</html>