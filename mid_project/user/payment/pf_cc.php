<?php
    $hasError = false;

    $fname = "";
    $err_fname = "";

    $lname = "";
    $err_lname = "";


    $cc_number = "";
    $err_cc_number = "";

    $mm = "";
    $err_mm = "";

    $yy = "";
    $err_yy = "";

    $cvc = "";
    $err_cvc = "";

    $agreement = "";
    $err_agreement = "";

    function hasNumeric($str) {
        $flag = false;

        foreach(str_split($str) as $c) {
            if(is_numeric($c)) {
                $flag = true;
            }
        }

        return $flag;
    }

  



    if(isset($_POST['send-btn'])) {
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $cc_number = htmlspecialchars($_POST['cc-number']);
        $cvc = htmlspecialchars($_POST['cvc']);

        // fname
        if(empty($fname)) {
            $hasError = true;
            $err_fname = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(hasNumeric($fname)) {
            $hasError = true;
            $err_fname = "<span><sup>*</sup>Numeric value not allowed!</span>";
        }


        // lname
        if(empty($lname)) {
            $hasError = true;
            $err_lname = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(hasNumeric($lname)) {
            $hasError = true;
            $err_lname = "<span><sup>*</sup>Numeric value not allowed!</span>";
        }


        // cc number
        if(empty($cc_number)) {
            $hasError = true;
            $err_cc_number = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($cc_number)) {
            $hasError = true;
            $err_cc_number = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if(!(strlen($cc_number) == 16)) {
            $hasError = true;
            $err_cc_number = "<span><sup>*</sup>Must be of 16 digits!</span>";
        }
      

        // cvc
        if(empty($cvc)) {
            $hasError = true;
            $err_cvc = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($cvc)) {
            $hasError = true;
            $err_cvc = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if(!(strlen($cvc) == 3)) {
            $hasError = true;
            $err_cvc = "<span><sup>*</sup>Must be of 3 digits!</span>";
        }


        // agreement
        if(!isset($_POST['agreement'])) {

            $hasError = true;
            $err_agreement= "<span><sup>*</sup>You must agree to the terms and conditions!</span>";

        }

        // mm
        if(!isset($_POST['mm'])) {

            $hasError = true;
            $err_mm= "<span><sup>*</sup>Select a month!</span>";

        }

        // yy
        if(!isset($_POST['yy'])) {

            $hasError = true;
            $err_yy= "<span><sup>*</sup>Select a year!</span>";

        }

        if(!$hasError) {
            echo "First Name: " . $fname . "<br>";
            echo "Last Name: " . $lname . "<br>";
            echo "Credit Card Number: " . $cc_number . "<br>";
            echo "Expires: " . $_POST['mm'] . '/' .  $_POST['yy'] . "<br>";
            echo "CVC: " . $cvc . "<br>";
            echo "Agreement: " . $_POST['agreement'] . "<br>";
            echo "<hr>";
        }


    }


    function PrintYear() {

        for($i = 2030; $i >= (int) date("Y"); $i--) {
            
            
    
            if($_POST['yy'] == $i) {
                echo "<option value='$i' selected>". $i ."</option>";
            } else {
                echo "<option value='$i' >". $i ."</option>";
            }
        }
    }



    
function PrintMonth() {
    $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    foreach($months as $m) {

        
        if($_POST['mm'] == $m) {
            echo "<option value='$m' selected>$m</option>";
        } else {
            echo "<option value='$m'>$m</option>";
        }
       
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
        <table border="1">
            <caption>Credit Card Payment Form</caption>
            <tr>
                <td colspan="2"><img src="img/credit-card-icon-blog-01.jpg" width="200px"  alt=""></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>"> <?php echo $err_fname; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>"> <?php echo $err_lname; ?></td>
            </tr>
            <tr>
                <td>Credit Card Number:</td>
                <td>
                    <input type="text" name="cc-number" placeholder="XXXXXXXXXXXXXXXX" value="<?php echo $cc_number;?>"> <?php echo $err_cc_number; ?>
                    
                    Expires:
                    <select name="mm">
                        <option value="" selected disabled>MM</option>
                        <?php PrintMonth(); ?>
                    </select>
                    <?php echo $err_mm; ?>
                    <select name="yy">
                        <option value="" selected disabled>YY</option>
                        <?php PrintYear(); ?>
                    </select>
                    <?php echo $err_yy; ?>
                </td>
            </tr>

            <tr>
                <td>CVC</td>
                <td><input type="text" name="cvc" placeholder="XXX" value="<?php echo $cvc;?>"> <?php echo $err_cvc; ?></td> 
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" value="Agreed" name="agreement" <?php if(isset($_POST['agreement'])) {echo "checked";} ?>> I agree to the <a href="#">terms and conditions</a> <?php echo $err_agreement; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Send" name="send-btn"></td>
            </tr>

        </table>
    </form>
</body>
</html>