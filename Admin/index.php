<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <?php include("../Include/cdn.php");  ?>
</head>
<body  style="background-color: hsla(50, 33%, 25%, .75);">
<?php
    session_start();

    $res=$result="";
    if(isset($_POST['login'])){
        $username = $_POST["uname"];
        $password = $_POST["psw"];

        include("../include/database.php");

        $sql="select Username, Password from admins where Username='".$username."' AND Password='".md5($password)."'";

        $row = mysqli_query($con,$sql);

        if($row){
            $res = mysqli_num_rows($row);
        }


        if($res > 0){
            $_SESSION["username"] = $username;
            header("Location:layoutPage.php");
        }else{
            $result = "* NO USER FOUND";
        }

    }






?>
    <?php include("../Include/Title.php") ?>
    <form action="?" method="post">
    <div class="imgcontainer">
       <center> <img style="border-radius:50%;" src="Image/Avatar.png" alt="Avatar" class="avatar"> </center>
    </div>

    <div class="container">
        <label for="uname"><b>USERNAME</b></label>
        <input class="form-control" type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>PASSWORD</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
        <center><h3 style="color:red;"><?php echo $result ?></h3></center>
        <button class="btn btn-success" name="login" type="submit">LOGIN</button>
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div><br>
    <div class="container">
        <button type="button" class="btn btn-danger">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
    </form>
</body>
</html>