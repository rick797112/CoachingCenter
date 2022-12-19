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
    <title>Interface</title>
    <?php include("../Include/cdn.php");   ?>
</head>
<body>
    <?php include("../include/navbar.php");  ?>

    <?php include("../Include/Title.php") ?>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="Image/ImgOne.png" height="500" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="Image/ImgTwo.jpg" height="500" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="Image/ImgThree.jfif" height="500" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    <p style="text-align:center;" class="font"><a style="color:red; text-decoration: none;font-size:30px;" href="xstudent.php">CLICK VIEW OUR X-STUDENT</a></p>

        <br><br><br><br><br><br><br><br><br>
        <footer class="container footer-distributed">
			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					  <span>247 - Lhomithi Colony,
						 near Sitla Bari </span>
						Dimapur Nagaland - 797112
				</div>
 
				<div>
					<i class="fa fa-phone"></i>
					<span>+91 7005782532</span>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<span><a href="mailto:debraj.aditya.34@gmail.com">debraj.aditya.34@gmail.com</a></span>
				</div>
			</div>
			<div class="footer-right">
				<p class="footer-company-about">
					<span><b>About the company:</b></span>
					We offer training and skill building courses across Technology, Design, Technical Language.</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</footer><br><br><br/>
</body>
</html>