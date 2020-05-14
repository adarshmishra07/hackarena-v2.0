<?php

    session_start();

    if(!isset($_SESSION['login_user']) || $_SESSION['login_user'] == "") {
        header("Location: index.php");
    }

 ?>
 <?php
include "db/config.php";
$useremail=$_SESSION['login_user'];
$sql="select tname from user where email='$useremail'";
$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $tname=$row['tname'];
        }
    }
?>
 <!doctype html>
<html lang=en style="width:100%;">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <meta name="author" content="Adarsh">
    <meta name="description" content="HackArena 1.0 is Hackathon organised by CSI student chapter Lokmanya Tilak College of Engineering Navi Mumbai.">
    <meta name="keywords" content="hackarena,hackarena1.0,hackarena 1.0,1.0,csi,csi ltcoe, ltcoe,ltce,hackathon,navi mumbai, hackathon in navi mumbai, navi, mumbai, event,competition,hackarena ltce,hackarena ltcoe,ltcoe hackathon, csi hackathon,csi hackarena, ai,ml,ar-vr,cloud,fintech,solution,hackarena registration,hackarena details,details,detail, hack arena,hack,arena,hackarena 2019,2019,2020,hackarena 2020,hackathon,in mumbai,hackathons in mumbai,hackarena.in,hackathon in mumbai,hack + athon + hackarena,hackathon mumbai,hackathon 2020, 2020,upcoming,upcoming hackathon,hackathons in 2020,csi-ltce,hackers,lokmanya tilak college of engineering, lokmanya , tilak, hackarena 10,hackarena 1.0,1.0,hack">
    <meta name="google-site-verification" content="AZbYKz26tYqYNzey8MEylJVEpyOoB1LN_mZXfUwCNWs" />
    <meta http-equiv="Cache-control" content="public">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <!--    <link rel="stylesheet" href="css/animate.css" type="text/css">-->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body id="top">

    <navbar>
        <div id="js-toggle"><i class="fa fa-bars tenu" aria-hidden="true"></i></div>
        <div class="logo"><a href="#" class="js-anchor-link"><img src="images/logo.png" alt="logo" title=""></a></div>
        <ul class="main-nav">
            <li><a href="index.html" class="js-anchor-link">HOME</a></li>
            <li><a href="index.html#tracks" class="js-anchor-link">TRACKS</a></li>
            <li><a href="index.html#schedule" class="js-anchor-link">SCHEDULE</a></li>
            <li><a href="index.html#sponsors" class="js-anchor-link">SPONSORS</a></li>
            <li><a href="index.html#faqs" class="js-anchor-link">FAQ's</a></li>
        </ul>
    </navbar>
    <h1 id="title">Dashboard</h1>
    <div class="container" id="dashboard">
         <div class="hello">Welcome Team <span style="color:red;"><?php  echo $tname ;?></span> !</div> 
        <h1 style="font-size:22px;">Your application is submitted <br> We will get back to you soon</h1>
        <div class="query text">
            For any queries or details : <br>
            Contact : Harshal Kondke 8668344150
            or <a href="mailto:contact@hackarena.in"> Email Us</a>
        </div>
    </div>
    <footer>
        <div class="foot">
            <div class="foottitle">HackArena 1.0</div>
            <div class="csi"><a href="https://csi-cesa.github.io/" target="blank"><i class="fa fa-internet-explorer" aria-hidden="true"></i> Visit CSI LTCE</a></div><br>
            <div class="social"><a href="https://www.instagram.com/hackarena.in/"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i> Instagram</a></div><br>
            <div class="social"><a href="https://www.facebook.com/Hackarena-113866820060578/"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i> Facebook</a></div>

        </div>
        <div class="foot">
            <div class="foottitle">Contact Us</div><br>
            <div class="location"><a href=""> <i class="fa fa-map-marker" aria-hidden="true"></i> Lokmanya Tilak College of engineering,<br> KoparKhairane Navi Mumbai.</a></div><br>
            <div class="email"><a href="mailto:contact@hackarena.in"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail Us</a></div>
        </div>
        <div class="foot">
            <div class="foottitle">Other Links</div><br>
            <div class="sponus"><a href="mailto:admin@hackarena.in"><i class="fa fa-dollar"></i> Become a Sponsor</a></div><br>
            <div class="registerr"><a href=""><i class="fa fa-users" aria-hidden="true"></i> Register At Hackarena 1.0</a></div>
        </div>
        <div class="copyright">Copyright (c) 2019</div>
    </footer>
<div class="to-top"><a href="#top" class="js-anchor-link" ><img src="images/arrow-up.svg" alt=" " title="Go To Top"></a></div>
</body>
<script src="js/jquery-3.2.1_a68c15cf37228010c55b83347b301316.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tenu').click(function() {
            $('.main-nav').toggleClass('visible');
        })
    });
</script>
</html>