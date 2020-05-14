<?php

    session_start();

    if(!isset($_SESSION['login_admin']) || $_SESSION['login_admin'] == "") {
        header("Location: adminlogin.php");
    }

 ?>
<!DOCTYPE html>
<html lang="en" style="width:100%;">
<head>
    <meta charset="UTF-8">
    <title>View</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php
  include "../db/config.php";
    $srno=$_GET['srno'];
    $sql="select * from data where tid='$srno'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
                    $l_name=$row['leader_name'];
                    $m2_name=$row['m1_name'];
                    $m3_name=$row['m3_name'];
                    $m4_name=$row['m4_name'];
                    $l_email=$row['leader_email'];                
                    $m2_email=$row['m2_email'];                
                    $m3_email=$row['m3_email'];                
                    $m4_email=$row['m4_email'];                
                    $l_git=$row['leader_git'];                
                    $m2_git=$row['m2_git'];                
                    $m3_git=$row['m3_git'];                
                    $m4_git=$row['m4_git'];
                    $l_phone=$row['leader-phone'];
                    $m2_phone=$row['m2_phone'];
                    $m3_phone=$row['m3_phone'];
                    $m4_phone=$row['m4_phone'];
                    $cname=$row['college_name'];
                    $nom=$row['nom'];
                    $tname=$row['tname'];
        }
    }
    
?>    
<body>
<div class="container">
    <div class="form-container">
            <div class="text">Basic details</div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="item"><label for=""></label>Full Name (Leader)</div>
                    <div class="form-item"><input type="name" name="member1" readonly value="<?php echo $l_name ;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Contact Number (Leader)</div>
                    <div class="form-item"><input type="text" name="leader-mob" readonly value="<?php echo $l_phone ;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Email (Leader)</div>
                    <div class="form-item"><input type="email" name="lemail" readonly value="<?php echo $l_email ;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Github url (Leader)</div>
                    <div class="form-item"><input type="text" name="lgit" readonly value="<?php echo $l_git ;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>College Name</div>
                    <div class="form-item"><input type="name" name="college-name" readonly value="<?php echo $cname ;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Team Name</div>
                    <div class="form-item"><input type="name" name="team_name" readonly value="<?php echo $tname ;?>"></div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>No. of Members</div>
                    <div class="form-item">
                        <input type="text" readonly value="<?php echo $nom ;?>">
                    </div>
                </div>
                <div class="text">Team details</div>
                <div class="row">
                    <div class="item"><label for=""></label>Member 2 Details</div>
                    <div class="form-item">
                        <input type="name" name="member2" placeholder="Name" readonly value="<?php echo $m2_name ;?>"><input type="text" name="m2ph" placeholder="Mobile No." readonly value="<?php echo $m2_phone ;?>"><br><input type="text" name="m2git" placeholder="Github Profile Url" readonly value="<?php echo $m2_git ;?>"><input type="email" name="m2email" placeholder="Email" readonly value="<?php echo $m2_email ;?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Member 3 Details</div>
                    <div class="form-item">
                        <input type="name" name="member2" placeholder="Name" readonly value="<?php echo $m3_name ;?>"><input type="text" name="m2ph" placeholder="Mobile No." readonly value="<?php echo $m3_phone ;?>"><br><input type="text" name="m2git" placeholder="Github Profile Url" readonly value="<?php echo $m3_git ;?>"><input type="email" name="m2email" placeholder="Email" readonly value="<?php echo $m3_email ;?>"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="item"><label for=""></label>Member 4 Details</div>
                    <div class="form-item">
                        <input type="name" name="member2" placeholder="Name" readonly value="<?php echo $m4_name ;?>"><input type="text" name="m2ph" placeholder="Mobile No." readonly value="<?php echo $m4_phone ;?>"><br><input type="text" name="m2git" placeholder="Github Profile Url" readonly value="<?php echo $m4_git ;?>"><input type="email" name="m2email" placeholder="Email" readonly value="<?php echo $m4_email ;?>"><br>
                    </div>
                </div>
            </form>
        </div>
</div>    
</body>
</html>