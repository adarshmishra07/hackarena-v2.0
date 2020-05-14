<?php
include '../db/config.php';

session_start();
//if (sizeof($_POST)>=1) {
    $srno=$_GET['srno'];
    
    
    $sql="update data set status = 'approved' where tid='$srno'";
if ($conn->query($sql) === TRUE) {
    header("Location: applied.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
    
//}
?>
