 <?php
include '../db/config.php';
$php_errormsg="";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count = "";
    $user = $_POST['email'];
    $passw = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE userid = '$user' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $pass = $row['password'];
        }
        if ($passw==$pass) {
        // session_register("useremail");
$_SESSION['login_admin'] = $user;

        header("location: admindash.php");
    } else {
        $php_errormsg = "Your Login Name or Password is invalid";
            echo $php_errormsg;
    }
    }
    else{
        $php_errormsg="User does not exist";
        echo $php_errormsg;
    }

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Log In</title>
    <link rel="stylesheet" href="../auth/login.css">
</head>
<body>
    <div id="login" class="container">
      <div class="err"><?php echo $php_errormsg; ?></div>
       <h2>Admin Log In</h2>
        <div class="form">
           <form action="" method="post">
            <input type="text" placeholder="User Id" name="email" ><br>
            <input type="password" placeholder="Password" name="password"><br>
            <input type="submit" value="Log In" class="btn sb">
           
            </form>
        </div>
    </div>
</body><br>
<footer>
    <div class="credits">
          
    </div>
</footer>
</html>