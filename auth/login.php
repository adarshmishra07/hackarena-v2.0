<?php
include '../db/config.php';
$php_errormsg="";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count = "";
    $useremail = $_POST['email'];
    $passw = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email = '$useremail' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $chk_pass = $row['password'];
        }
        if (password_verify($passw, $chk_pass)) {
        // session_register("useremail");
        $_SESSION['login_user'] = $useremail;
//                echo "logged in";
        header("location: ../registration.php");
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
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="login" class="container">
       <h2>Log In</h2>
        <div class="form">
          <div class="err"><?php echo $php_errormsg;?></div>
           <form action="" method="post">
            <center><input type="email" placeholder="Email" name="email" ><br>
            <input type="password" placeholder="Password" name="password"><br>
            <input type="submit" value="Log In" name="submit"></center>
            <div class="text">don't have an account ? <a href="signup.php">Sign Up</a></div>
            </form>
        </div>
    </div>
</body><br>
<footer>
    <div class="credits">
          
    </div>
</footer>
</html>