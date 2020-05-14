<?php

    session_start();

    if(!isset($_SESSION['login_admin']) || $_SESSION['login_admin'] == "") {
        header("Location: adminlogin.php");
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applied Forms</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="admindash.php">dashboard</a></li>
            <li><a href="applied.php">Applied Forms</a></li>
            <li><a href="#">Approved Forms</a></li>
            <li><a href="user.php">Users</a></li>
            <li><a href="admin-logout.php">Logout</a></li>
            
        </ul>
    </nav>
    <div class="text">Approved forms</div>
    <div class="container">
        
        <table class="table table-striped table-bordered" style="width:100%" id="example">

                                <thead>

                                    <th>Sr.No.</th>
                                    <th>team name</th>
                                    <th>L Name</th>
                                    <th>L contact</th>
                                    <th>L email</th>
                                    <th>resume</th>
                                    <th>View</th>

                                </thead>
                                <tbody>
                                <?php
                                        include "../db/config.php";
                                        
                                            $sql="select * from data where status='approved'";
                                            $result=mysqli_query($conn,$sql) or die;
                                            $cn=1;
                                            if($result==true){
                                                while($row=mysqli_fetch_assoc($result)){
                                                    $srno=$row['tid'];
                                                    $team=$row['tname'];
                                                    $lname=$row['leader_name'];
                                                    $lph=$row['leader-phone'];
                                                    $lemail=$row['leader_email'];
                                                    $resume=$row['resume_pdf'];                                                   
                                    
                                        ?>
                                
                                    <tr>
                                        <td><?php echo $srno  ;?></td>
                                        <td><?php echo $team  ;?></td>
                                        <td><?php echo $lname ;?></td>
                                        <td><?php echo $lph  ;?></td>
                                        <td><?php echo $lemail  ;?></td>
                                        <td><a href="../resume/<?php echo $resume ;?>" target="_blank">View</a></td>
                                        
                                        <td><a href="view.php?srno=<?php echo $srno ;?>" target="_blank"><button class="btn-table1">View</button></a>
                                    </tr>
                                    <?php 
                                                }
                                            }
                                
                                            ?>
                                </tbody>

                            </table>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

</script>
</html>