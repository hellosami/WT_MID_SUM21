<?php
    $username = "";
    $gender = "";

    $err_username = "";
    $err_gender = "";

    $hasError = false;

    if(isset($_GET["submit"])) {

        if(empty($_GET["username"])) {
            $hasError = true;
            $err_username = "Username Required";
        } else {
            $username = $_GET["username"];
        }

        if(!isset($_GET["gender"])) {
            $hasError = true;
            $err_gender = "Gender Required";
        }

        if(!$hasError) {
          
            $username = $_GET["username"];
            $gender = $_GET["gender"];
        }
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

    <style>
        form {
            border: 1px solid #444;
            border-radius: 4px;
            padding: 14px;
            width: max-content;
        }
        .btn {
            width: 100%;
            margin-top: 24px;
        }
    </style>
</head>
<body>
    

    <form action="" method="GET">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                <td><?php echo $err_username; ?></td> <!-- for error message -->
                
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender"  value="male"> Male
                    <input type="radio" name="gender" value="female"> Female
                </td>
                <td><?php echo $err_gender; ?></td> <!-- for error message -->
            </tr>
            <tr>
                <td colspan="3">
                    <input class="btn" type="submit" value="Submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>