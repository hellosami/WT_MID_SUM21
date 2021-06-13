<!DOCTYPE html>
<html>
<head>
    <title>Problem 3</title>
</head>
<body>
    <?php
        $length = 10;
        $height = 10;

        $perimeter = 2 * ( $length + $height );
        $area = $length * $height;

        echo "PERIMETER = " . $perimeter . "<br>";
        echo "AREA = " . $area . "<br>";

        
        if($length == $height) {
            echo "the shape is a square";
        }
    ?>
</body>
</html>