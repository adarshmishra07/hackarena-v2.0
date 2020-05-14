<?php $GLOBALS['error']="";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <!--    <meta name="google-signin-client_id" content="715273505741-418i515ia1n9gp2efsue7bej3fd0rvhp.apps.googleusercontent.com">-->
    <link rel="stylesheet" href="login.css">
</head>
<?php

    session_start();    
    require_once "../db/config.php";
if(isset($_POST['submit'])){
       
        $email = $_POST["email"];
        $tname=$_POST['tname'];
        $options = [
            'cost' => 12,
        ];
        $pass = $_POST["password"];
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "SELECT * FROM user WHERE tname = '$tname'";
            $result = $conn->query($sql);
        if ($result->num_rows == 0) {            
                $pass = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
                $sql = "INSERT INTO `user` (`user_id`, `email`, `password`, `applied`, `tname`) VALUES (NULL, '$email', '$pass', 'no', '$tname')";

                if ($conn->query($sql) === true) {
                    header("Location: login.php");
                } else {
                    echo "Error" . $conn->error;
                }
        }else{
            $GLOBALS['error'] = "Team name not available";
        }
        }
        else{
            $GLOBALS['error'] = "Email already exists";
        }
    }
?>

<body>
    <div id="signup" class="container">
        <h2>Sign Up</h2>
        <div class="form">
            <div class="err"><?php echo $GLOBALS['error'];?></div>
            <form action="" method="post">
                <input type="text" placeholder="Team Name" pattern="[A-Za-z0-9]+" title="Please use only numbers and alphabets" name="tname" required><br>
                <input type="email" placeholder="Email" name="email" required><br>
                <input type="password" placeholder="Password" pattern=".{8,}"   required title="8 characters minimum" name="password" required><br>
                <center><input type="submit" value="Sign Up" name="submit"></center>
                <!--
            <div class="or">------ OR ------</div>
            <div class="google-btn"><center><div class="google g-signin2" data-onsuccess="onSignIn"></div></center></div>
-->
                <div class="text">Already have an account <a href="login.php">Log In</a></div>
            </form>
        </div>
    </div>
</body><br>
<footer>
    <div class="credits">

    </div>
</footer>
<!--
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
    </script>
    <script>
    var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
        </script>
-->

</html>
