<?php
session_start();
if(!isset($_SESSION["loggeduser"])) {
    header("Location: index.php");
}

// else if(!isset($_COOKIE["loggeduser"])) {
//     header("Location: index.php");
// }
?>
<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>
</head>
<body>
    
    <?php
    //    echo "Welcome," . $_COOKIE["loggeduser"];
       echo "Welcome, " . $_SESSION["loggeduser"];
    ?>


</body>
</html>