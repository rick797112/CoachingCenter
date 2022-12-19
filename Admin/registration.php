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
    <title>Registration</title>
    <?php include("../Include/cdn.php"); ?>

</head>
<body>

<?php   
    $flag=0;
    $con=$name=$phone=$address=$gmail=$nameError=$phoneError=$addressError=$gmailError=$result="";
    $course="--SELECT COURSE--";
            
    if(isset($_GET["save"])){
        $course=$_GET["course"];
        $date = date("Y-m-d");
        $block = 1;

        if(!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$_GET["name"])){
            $nameError="* Only characters are allowed";
            $flag=1;
        }else if(strlen($_GET["name"]) > 30){
            $nameError = "* Only 30 characters accepted";
            $flag=1;}
        else
            $name=$_GET["name"];



        if(strlen($_GET["address"]) > 50){
            $addressError = "* Only 50 characters accepted";
            $flag=1;}
        else
            $address=$_GET["address"];

        	
        $phonevalidation="/^[0-9]{10}$/";

        if(!is_numeric($_GET["phone"])){
            $phoneError="* Please enter a valid number";
            $flag=1;
        }else if(!preg_match($phonevalidation,$_GET["phone"])){
            $phoneError = "* Invalid Number";
            $flag=1;}
        else
            $phone=$_GET["phone"];


        $validEmail = "^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$^";

        if(!preg_match($validEmail,$_GET["gmail"])){
            $gmailError="* Please enter a valid Email";
            $flag=1;}
        else
            $gmail = $_GET["gmail"];

        if($flag==0){
            include("../Include/database.php");

            $check = "select Gmail,Contact from student WHERE Gmail='".$gmail."' || Contact='".$phone."'";

            $res=mysqli_query($con,$check);
            if($res)
                $row = mysqli_num_rows($res);

            if($row > 0)
                $result = "** Mail or Phone Already Used **";
            else{
                $sql="insert into student values(Id,'".$name."','".$phone."','".$address."','".$gmail."','".$course."','".$date."','".$block."',default)";

                if(mysqli_query($con,$sql)){
                    $amount = 0;
                    $paidvia = "";   
                    $sql1="select Fee from courses where Course='".$course."'";

                        if ($res = mysqli_query($con, $sql1)){ 
                            while ($row = mysqli_fetch_assoc($res)) {
                                $fees=$row["Fee"];
                            }
                        }
                    $sql2="insert into studentfees values(Slno,'".$name."','".$course."','".$gmail."','".$phone."','".$date."',default,'".$fees."','".$amount."','".$paidvia."')";
                               if(mysqli_query($con,$sql2))
                                echo '<script>alert("Record Successfully Stored..")</script>';
                }else{
                    $result="** Something Went Wrong **";
               }
            }
           mysqli_close($con);
        }

    }
    include("../Include/navbar.php");
?>

        <?php include("../Include/Title.php") ?> 

        <h3 class="font col-sm-12 col-lg-12 col-md-12">STUDENT REGISTRATION PAGE </h1>   

        <form action="?" name="registration" method="GET">
                <div class="container">
                   <center><table height="400" width="900">
                        <tr>
                            <td><input required placeholder="ENTER NAME" value="<?php if(isset($_GET['save'])) echo $name;    ?>" class="form-control" name="name"></input></td>
                            <td><?php  if(isset($_GET["save"])) echo "<h5 style='color:red';>".$nameError."</h5>"; ?></td>
                        </tr>
                        <tr>
                            <td><input required placeholder="ENTER G-MAIL" value="<?php if(isset($_GET['save'])) echo $gmail; ?>" class="form-control" name="gmail"></input></td>
                            <td><?php if(isset($_GET["save"])) echo "<h5 style='color:red';>".$gmailError."</h5>"; ?></td>
                        </tr>
                        <tr>
                            <td><input required placeholder="ENTER CONTACT"  value="<?php if(isset($_GET['save'])) echo $phone; ?>" class="form-control" name="phone"></input></td>
                            <td><?php if(isset($_GET["save"])) echo "<h5 style='color:red';>".$phoneError."</h5>"; ?></td>
                        </tr>
                        <tr>
                            <td><input required placeholder="ADDRESS" class="form-control"  value="<?php if(isset($_GET['save'])) echo $address; ?>" name="address"></input></td>
                            <td><?php if(isset($_GET["save"])) echo "<h5 style='color:red';>".$addressError."</h5>"; ?></td>
                        </tr>

                        <tr>
                            <td><select required class="form-control" name="course">
                                <option value="<?php if(isset($_GET['save'])) echo $course; ?>"><?php echo $course ?></option>
                        <?php
                            include("../Include/database.php");

                             $sql1 = "select * from courses";
                             if ($res = mysqli_query($con, $sql1)) 

                               while ($row = mysqli_fetch_assoc($res)) {
                                   echo "<option value='".$row["Course"]."'>".$row["Course"]."</option>";
                
                               }
                           
                             mysqli_close($con);

                        ?>
                        </select></td>
                        </tr>                        
                        <tr>
                            <td><?php echo "<h6 STYLE='color:red;'>".$result."</h6>"; ?></td>
                        </tr>

                    </table></center>

                   <center>
                    <button class="btn btn-success" name="save">SUBMIT</button>
                    <a href="registration.php"> <input class="btn btn-warning" type="button" value="CLEAR"> </a>
                  </center>
                      
                </div>
                <br><br><br/>
        </form>    

        
</body>
</html>