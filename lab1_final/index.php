<?php
    // session_start();

    $uname = "";
    $pass ="";
    $err_uname = "";
    $err_pass = "";

    $hasError = false;

    $users = array("sami" => "1234", "sabbir" => "123", "karim" => "3456", "rahim" => "543");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['uname'])) {
            $hasError = true;
            $err_uname = "Username required";
        }
        else {
            $uname = $_POST["uname"];
        }

        if(empty($_POST["pass"])) {
            $hasError = true;
            $err_pass = "Password required";
        }
        else {
            $pass = $_POST["pass"];
        }

        if(!$hasError) {
            foreach($users as $u => $p) {
                if($uname == $u && $pass == $p) {
                    setcookie("loggeduser", $uname, time()+300, "/");
                    // $_SESSION["loggeduser"] = $uname;
                    header("Location: dashboard.php");
                }
            }
            echo "Invalid user!";
        }
    }
?>
<!DOCTYPE html>
<html >
<head>


    <title>Document</title>
</head>
<body>
    
    <form action="" method="POST">
    username : <input type="text" name="uname"> <?php echo $err_uname?><br>
    password: <input type="text" name="pass"> <?php echo $err_pass?>
    <input type="submit" value="Login">
    </form>
</body>
</html>