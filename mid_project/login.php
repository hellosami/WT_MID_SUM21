<?php
        $hasError = false;

        $username = "";
        $err_username = "";

        $password = "";
        $err_password = "";


        function hasOneNumber($str) {
            $number_counter = 0;
            foreach(str_split($str) as $p) {
                if(is_numeric($p)) {
                    $number_counter++;
                }
            }
    
            return $number_counter;
        }
    
        function hasUpperCase($str) {
            $flag = false;
            foreach(str_split($str) as $p) {
                if(ctype_upper($p)) {
                    $flag = true;
                    break;
                }
            }
    
            return $flag;
        }
    
        function hasLowerCase($str) {
            $flag = false;
            foreach(str_split($str) as $p) {
                if(ctype_lower($p)) {
                    $flag = true;
                    break;
                }
            }
    
            return $flag;
        }

        

        if(isset($_POST['login-btn'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            

            if(empty($username)) {
                $hasError = true;
                $err_username = "<span><sup>*</sup>Field is empty!</span>";
            }
            // whitespace checking
            else if(count(explode(" ", $username)) > 1) {
                $hasError = true;
                $err_username = "<span><sup>*</sup>Username must not contain whitespace!</span>";
            }
            else if(strlen($username) < 6) {
                $hasError = true;
                $err_username = "<span><sup>*</sup>Username must contain at least 6 characters</sup>";
            }

            // password
            if(empty($password)) {
                $hasError = true;
                $err_password = "<span><sup>*</sup>Field is empty!</span>";
            }
    
            else if(strlen($password) < 8 ) {
                $hasError = true;
                $err_password = "<span><sup>*</sup>Password must contain at least 8 character!</span>";
            }

    
            elseif(!(hasUpperCase($password) && hasLowerCase($password))) {
            
                $hasError = true;
                $err_password = "<span><sup>*</sup>Must contain combination of uppercase and lowercase!</span>";
            }

            if(!$hasError) {
                header("Location: user/user_dashboard.php");
            }
        }
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>GORENT</h1>
    <hr>
        <a href="index.html">Home</a>
        <a href="about_us.html">About us</a>
        <a href="contact_us.html">Contact us</a>
        <a href="login.php">Login</a>
   
    <hr>

    <br>
    
    <form action="user/user_dashboard.php" method="POST">
        <table border="1">
            <caption>Login</caption>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="john" value="<?php echo $username; ?>">  <?php echo $err_username; ?></td>
               
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="********" value="<?php echo $password; ?>">  <?php echo $err_password; ?></td>
               
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login" name="login-btn"></td>
            </tr>
        </table>
    </form>

    <br>
    <br>
    

    <span>© 2020 - 2021 GORENT</span>
    &nbsp;&nbsp;&nbsp;
    <img src="img/iconAppStore.jpg" alt="" width="100px">
    <img src="img/iconGooglePlay.jpg" alt="" width="100px">

</body>
</html>