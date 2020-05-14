<?php

    session_start();
    
    if(!isset($_SESSION['login_user']) || $_SESSION['login_user'] == "") {
        header("Location: auth/login.php");
    }
    
 ?>
<?php

include 'db/config.php';

    $pdferr="";
    $useremail =$_SESSION['login_user'] ;
    $sql ="select tname from user where email='$useremail'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $tname=$row['tname'];
        }
    }
    $GLOBALS['err'] ="";
    $sql ="select * from user where email='$useremail' and applied='no' ";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        header("location:dashboard.php");
    }else{

    if(isset($_POST['submit'])){
                if ($_POST['submit'] == "Submit") {
//                    $tname=$_POST['team_name'];
                    $l_name=$_POST['member1'];
                    $m2_name=$_POST['member2'];
                    $m3_name=$_POST['member3'];
                    $m4_name=$_POST['member4'];
                    $l_email=$_POST['lemail'];                
                    $m2_email=$_POST['m2email'];                
                    $m3_email=$_POST['m3email'];                
                    $m4_email=$_POST['m4email'];                
                    $l_git=$_POST['lgit'];                
                    $m2_git=$_POST['m2git'];                
                    $m3_git=$_POST['m3git'];                
                    $m4_git=$_POST['m4git'];
                    $l_phone=$_POST['leader-mob'];
                    $m2_phone=$_POST['m2ph'];
                    $m3_phone=$_POST['m3ph'];
                    $m4_phone=$_POST['m4ph'];
                    $cname=$_POST['college-name'];
                    $nom=$_POST['nom'];
                    $resume=$_FILES['resume']['name'];
                    
                    $destination = 'resume/' . $resume;
                    $extension = pathinfo($resume, PATHINFO_EXTENSION);
                    
                    $file = $_FILES['resume']['tmp_name'];
                  //  print_r($_FILES);
                   // die();
                    if (!in_array($extension, ['pdf'])) {
                         $pdferr="You file extension must be .zip, .pdf or .docx";
                    } elseif ($_FILES['resume']['size'] > 10000000) { 
                        $pdferr="File too large!";
                    } else {
                        $sql = "SELECT * FROM data where tname='$tname' and leader_name='$l_name'";
                            $result = $conn->query($sql);
                            if ($result->num_rows == 0) {
                            if (move_uploaded_file($file, $destination)) {
                            $sql = "INSERT INTO `data` (`tid`, `tname`, `nom`, `college_name`, `leader_name`, `leader-phone`, `leader_git`, `leader_email`, `m1_name`, `m2_phone`, `m2_email`, `m2_git`, `m3_name`, `m3_phone`, `m3_email`, `m3_git`, `m4_name`, `m4_phone`, `m4_email`, `m4_git`, `resume_pdf`, `status`) 
                            VALUES (NULL, '$tname', '$nom', '$cname', '$l_name', '$l_phone', '$l_git', '$l_email', '$m2_name', '$m2_phone', '$m2_email', '$m2_git', '$m3_name', '$m3_phone', '$m3_email', '$m3_git', '$m4_name', '$m4_phone', '$m4_email', '$m4_git', '$resume', 'pending')";
                                if ($conn->query($sql) === TRUE) {
                                } else {
                                    echo "Error deleting record: " . $conn->error;
                                }
                        $sql="update user set applied='yes' where email='$useremail'";
                                if ($conn->query($sql) === true) {
                                    header("location: dashboard.php");
                                } else {
                                    echo "Error" . $conn->error;
                                }
                            }else{
                                echo "else";
                            }
                            }else{
        $GLOBALS['err'] ="You have already Submitted an application";
    }

                }
        }
}
    
    }

?>
<!doctype html>
<html lang=en style="width:100%;">

<head>
    <meta charset="utf-8">
    <title>HackArena 1.0 | Hackathon at LTCE</title>
    <link rel="icon" href="images/logo.png" type="image/png">
    <meta name="author" content="Adarsh">
    <meta name="description" content="HackArena 1.0 is Hackathon organised by CSI student chapter Lokmanya Tilak College of Engineering Navi Mumbai.">
    <meta name="keywords" content="hackarena,hackarena1.0,hackarena 1.0,1.0,csi,csi ltcoe, ltcoe,ltce,hackathon,navi mumbai, hackathon in navi mumbai, navi, mumbai, event,competition,hackarena ltce,hackarena ltcoe,ltcoe hackathon, csi hackathon,csi hackarena, ai,ml,ar-vr,cloud,fintech,solution,hackarena registration,hackarena details,details,detail, hack arena,hack,arena,hackarena 2019,2019,2020,hackarena 2020,hackathon,in mumbai,hackathons in mumbai,hackarena.in,hackathon in mumbai,hack + athon + hackarena,hackathon mumbai,hackathon 2020, 2020,upcoming,upcoming hackathon,hackathons in 2020,csi-ltce,hackers,lokmanya tilak college of engineering, lokmanya , tilak, hackarena 10,hackarena 1.0,1.0,hack">
    <meta name="google-site-verification" content="AZbYKz26tYqYNzey8MEylJVEpyOoB1LN_mZXfUwCNWs" />
    <meta http-equiv="Cache-control" content="public">
    <!--<meta name="viewport" content="width=device-width">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <!--<link rel="stylesheet" href="css/animate.css" type="text/css">-->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body style="width:100%;">
    <navbar>
        <div id="js-toggle"><i class="fa fa-bars tenu" aria-hidden="true"></i></div>
        <div class="logo"><a href="#" class="js-anchor-link"><img src="images/logo.png" alt="logo" title=""></a></div>
        <ul class="main-nav">
            <li><a href="index.html" class="js-anchor-link">HOME</a></li>
            <li><a href="index.html/#tracks" class="js-anchor-link">TRACKS</a></li>
            <li><a href="index.html/#schedule" class="js-anchor-link">SCHEDULE</a></li>
            <li><a href="index.html/#sponsors" class="js-anchor-link">SPONSORS</a></li>
            <li><a href="index.html/#faqs" class="js-anchor-link">FAQ's</a></li>
        </ul>
    </navbar>

    <div id="registration">
        <marquee style="color:red; font-size:18px; background-color:black;">Note: If You are not redirected to dashboard after submitting the form , try resubmitting the form or Please Use Chrome For registration.</marquee>
        <div class="form-container">
        <center><div class="err"><?php echo $err ;?></div><span class=".err" style="color:red;"><?php echo $pdferr;?></span></center>
            <div class="text">Basic details</div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="item"><label for=""></label>Full Name (Leader)</div>
                    <div class="form-item"><input type="name" name="member1" required></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Contact Number (Leader)</div>
                    <div class="form-item"><input type="text" name="leader-mob" pattern="^[0-9]{10,11}$" title="Please enter valid Mobile Number" required></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Email (Leader)</div>
                    <div class="form-item"><input type="email" name="lemail" readonLy value="<?php echo $useremail;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Github url (Optional) </div>
                    <div class="form-item"><input type="text" name="lgit"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>College Name</div>
                    <div class="form-item"><input type="name" name="college-name" required></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Team Name</div>
                    <div class="form-item"><input type="name" name="team_name" readonly value="<?php echo $tname;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>No. of Members</div>
                    <div class="form-item">
                        <select name="nom" id="nomembers">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="text">Team details</div>
                <div class="row" id="member2det" style="display:none";>
                    <div class="item"><label for=""></label>Member 2 Details</div>
                    <div class="form-item">
                        <input type="name" name="member2" placeholder="Name"><input type="text" name="m2ph" placeholder="Mobile No."  pattern="^[0-9]{10,11}$" title="Please enter valid Mobile Number"><br><input type="text" name="m2git" placeholder="Github Profile Url"><input type="email" name="m2email" placeholder="Email"><br>
                    </div>
                </div>
                <div class="row" id="member3det" style="display:none">
                    <div class="item"><label for=""></label>Member 3 Details</div>
                    <div class="form-item">
                        <input type="name" name="member3" placeholder="Name"><input type="text" name="m3ph" placeholder="Mobile No."  pattern="^[0-9]{10,11}$" title="Please enter valid Mobile Number"><br><input type="text" name="m3git" placeholder="Github Profile Url"><input type="email" name="m3email" placeholder="Email"><br>
                    </div>
                </div>
                <div class="row" id="member4det" style="display:none">
                    <div class="item"><label for=""></label>Member 4 Details</div>
                    <div class="form-item">
                        <input type="name" name="member4" placeholder="Name"><input type="text" name="m4ph" placeholder="Mobile No."  pattern="^[0-9]{10,11}$" title="Please enter valid Mobile Number"><br><input type="text" name="m4git" placeholder="Github Profile Url"><input type="email" name="m4email" placeholder="Email"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Upload Resume</div>
                    <div class="form-item file-up"><input type="file" name="resume" required><br>Resume Of All Members In Single PDF <br>To merge PDF's go <a href="https://www.ilovepdf.com/merge_pdf" style="color:red; text-decoration:none;" target="_blank">HERE</a> <br> Rename Your File with your Team name
                    <BR></div>
                </div>
                <div class="text" style="font-size:18px;">By submitting the form you agree to <a href="assets/CodeOfCunduct.pdf">Code Of Conduct</a> of HackArena</div>
                <div class="button"><input type="submit" name="submit"></div>
            </form>
        </div>
    </div>
</body>
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
<div class="to-top"><a href="#top" class="js-anchor-link"><img src="images/arrow-up.svg" alt=" " title="Go To Top"></a></div>
</body>
<script src="js/jquery-3.2.1_a68c15cf37228010c55b83347b301316.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tenu').click(function() {
            $('.main-nav').toggleClass('visible');
        })
    });

</script>
<!--
<script src="js/wow.js"></script>
<script>
    new WOW().init();
</script>
-->
<script>
        $('#nomembers').change(function(){
            console.log($('#nomembers').val())
            console.log('here');
            if($('#nomembers').val() == '1'){
                $('#member2det').css("display","none");
                $('#member3det').css("display","none");
                $('#member4det').css("display","none");
            }else if($('#nomembers').val() == '2'){
                $('#member2det').css("display","block");
                $('#member3det').css("display","none");
                $('#member4det').css("display","none");
                
            }else if($('#nomembers').val() == '3'){
                $('#member3det').css("display","block");
                $('#member2det').css("display","block");
                $('#member4det').css("display","none");
            }else if($('#nomembers').val() == '4'){
                $('#member3det').css("display","block");
                $('#member2det').css("display","block");
                $('#member4det').css("display","block");
            }
        });
</script>
<script type="text/javascript">
    $(".js-anchor-link").click(function(t) {
        t.preventDefault();
        var a = $($(this).attr("href"));
        if (a.length) {
            var e = a.offset().top;
            $("body, html").animate({
                scrollTop: e + "px"
            }, 800)
        }
    });

</script>
<script>
    var i, acc = document.getElementsByClassName("accordion-link");
    for (i = 0; i < acc.length; i++)
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var i = this.nextElementSibling;
            "block" === i.style.display ? i.style.display = "none" : i.style.display = "block"
        });

</script>

</html>
