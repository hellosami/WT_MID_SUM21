<!DOCTYPE html>
<html>
<head>
    <title>Problem 2</title>
</head>
<body>
    <?php
        $marks = 90;
        $result = '';

        if($marks >=90) { $result = "A+"; }
        elseif($marks >=80 && $marks <90) { $result = "A"; }
        elseif($marks >=70 && $marks <80) { $result = "B"; }
        elseif($marks >=60 && $marks <70) { $result = "C"; }
        else { $result = "F"; }

        echo "RESULT " . $result;
    ?>
</body>
</html>