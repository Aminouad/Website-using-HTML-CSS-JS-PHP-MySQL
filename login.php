<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            header("location: home.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
      .pos{
        top:100px;
      }
        .wrapper{ width:400px; position: relative;background-color: white;opacity:0.6;border-radius: 30px;
    filter:alpha(opacity=40); /* For IE8 and earlier */
 left: 38%; }
body, html {
height: 100%;
}

.bg {
  background-image: url("Djerba.jpg");

/* The image used */

/* Full height */
height: 100%;

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;

}
.exemplefantasy {
font-family: fangsong;
color: white;
font-size: 80px;
}
.col{
color: #1A425C;
}

.jaw{
text-align: center;
position: absolute;
top: 12%;
left: 50%;
transform: translate(-50%,-50%);
width: 80%;
}
.jaw span{

display: block;
}
.text1{
color: white;
font-size: 60px;
font-weight: 600;
letter-spacing: 8px;
margin-bottom: -5px;

position: relative;
animation: text 3s 1;
}
.text2{
font-size: 70px;
color: #61ABE7;
letter-spacing: 6px;

}

@keyframes text {
0%{
color: black;
margin-bottom: -40px;
}
30%{
letter-spacing: 20px;
margin-bottom: -20px;
}
85%{
letter-spacing: 8px;
margin-bottom: -5px;
}

    </style>
  </head>
  <body>
    <div class="jaw">
      <span class="text1">Welcome in</span>
      <span class="text2">Djerba</span>
    </div>
    <div class="bg">


    <div class="text-center">
        <div>
          <br><br><br><br><br><br><br><br><br>
              <h1 class="text-secondary">Join Us!</h1>

          <h2 class="col">To The biggest Tripadvisor Agency </h2>
            <br>
        </div>
      </div>



    <div class="wrapper text-center">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>
