<?php
    $display = "none";
    $name = "";
    $err_name = "";

    $nid = "";
    $err_nid = "";
    
    $gender = "";
    $err_gender = "";


    

    $dd = "";
    $err_dd = "";

    $mm = "";
    $err_mm = "";

    $yy = "";
    $err_yy = "";


    $occupation = "";
    $err_occupation = "";

    $email = "";
    $err_email = "";


    $phone = "";
    $err_phone = "";

    $location = "";
    $err_location = "";

    $address = "";
    $err_address = "";

    $hasError = false;
   if(isset($_POST['send-btn'])) {

        $name = htmlspecialchars($_POST['name']);
        $nid = htmlspecialchars($_POST['nid']);

        $occupation = htmlspecialchars($_POST['occupation']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
   
        $address = htmlspecialchars($_POST['address']);
    

        function hasNumeric($str) {
            $flag = false;

            foreach(str_split($str) as $c) {
                if(is_numeric($c)) {
                    $flag = true;
                }
            }
    
            return $flag;
        }

        // name
        if(empty($name)) {
            $hasError = true;
            $err_name = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(hasNumeric($name)) {
            $hasError = true;
            $err_name = "<span><sup>*</sup>Numeric value not allowed!</span>";
        }

        // nid
        if(empty($nid)) {
            $hasError = true;
            $err_nid = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($nid)) {
            $hasError = true;
            $err_nid = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if(!(strlen($nid) == 13)) {
            $hasError = true;
            $err_nid = "<span><sup>*</sup>Must be of 13 digits!</span>";
        }

        // gender
        if(!isset($_POST['gender'])) {
            $hasError = true;
            $err_gender= "<span><sup>*</sup>Choose a option!</span>";
        }

        // dob
        // location
        if(!isset($_POST['dd'])) {

            $hasError = true;
            $err_dd= "<span><sup>*</sup>Select a date!</span>";

        }

        if(!isset($_POST['mm'])) {

            $hasError = true;
            $err_mm= "<span><sup>*</sup>Select a month!</span>";

        }

        if(!isset($_POST['yy'])) {

            $hasError = true;
            $err_yy= "<span><sup>*</sup>Select a year!</span>";

        }


        // occupation
        if(empty($occupation)) {
            $hasError = true;
            $err_occupation = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(hasNumeric($occupation)) {
            $hasError = true;
            $err_occupation = "<span><sup>*</sup>Numeric value not allowed!</span>";
        }


        // email
        if(empty($email)) {
            $hasError = true;
            $err_email = "<span><sup>*</sup>Field is empty!</span>";
        }
        elseif(!strpos($email, '@')) {
            $hasError = true;
            $err_email = "<span><sup>*</sup>Must contain @!</span>";
        }
        elseif(!strpos($email, '.')) {
            $hasError = true;
            $err_email = "<span><sup>*</sup>Must contain .(dot)!</span>";
        }
        elseif(strpos($email, '@') > strpos($email, '.')) {
            $hasError = true;
            $err_email = "<span><sup>*</sup>Must contain @ and at least one .(dot) after @!</span>";
        }


        // phone number
        if(empty($phone)) {
            $hasError = true;
            $err_phone = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($phone)) {
            $hasError = true;
            $err_phone = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if(!(strlen($phone) == 11)) {
            $hasError = true;
            $err_phone = "<span><sup>*</sup>Must be of 11 digits!</span>";
        }

        // location
        if(!isset($_POST['location'])) {

            $hasError = true;
            $err_location= "<span><sup>*</sup>Select a option!</span>";

        }




        // address
        if(empty($address)) {
            $hasError = true;
            $err_address = "<span><sup>*</sup>Field is empty!</span>";
        }
        
        //
        
        if(!$hasError) {
            echo "Name: " . $name . "<br>";
            echo "NID: " . $nid . "<br>";
            echo "Gender: " . $_POST['gender'] . "<br>";
            echo "Date of Birth: " . $_POST['dd'] . '/' .  $_POST['mm'] . '/' . $_POST['yy'] ."<br>";
            echo "Occupation: " . $occupation . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Phone Number: " . $phone . "<br>";
            echo "Location: " . $_POST['location'] . "<br>";
            echo "Address: " . $address . "<br>";
            echo "<hr>";
        }

   }


   function PrintYear() {

    for($i = (int) date("Y"); $i >= 1999; $i--) {
        
        

        if($_POST['yy'] == $i) {
            echo "<option value='$i' selected>". $i ."</option>";
        }  else {
            echo "<option value='$i' >". $i ."</option>";
        }
    }
}

function PrintDay() {
   
    for($i = 1; $i <= 31; $i++) {

        if($_POST['dd'] == $i) {
            echo "<option value='$i' selected>". $i ."</option>";
        } else {
            echo "<option value='$i'>". $i ."</option>";
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


function PrintLocation() {
    $locations = array("Adabor", "Uttar Khan", "Uttara", "Kadamtali", "Kalabagan");
    foreach($locations as $l) {

    if($_POST['location'] == $l) {
        echo "<option value='$l' selected>$l</option>";
    }
     else {
            echo "<option value='$l'>$l</option>";
        
    
    }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Profile Update Form</title>
</head>
<body>
    
  

   <form action="" method="POST">
        <table border="1">
            <caption>Profile Update Form</caption>
            <tr>
                <td>Name</td>
                <td><input type="text" placeholder="" name="name" value="<?php echo $name;?>"> <?php echo $err_name; ?></td>
            </tr>

            <tr>
                <td>NID</td>
                <td><input type="text" placeholder="" name="nid" value="<?php echo $nid;?>"> <?php echo $err_nid; ?></td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="male" <?php if($_POST['gender'] == "male") {echo "checked";} ?>> Male <br>
                    <input type="radio" name="gender" value="female" <?php if($_POST['gender'] == "female") {echo "checked";} ?>> Female <br>
                    <?php echo $err_gender; ?>
                </td>
            </tr>

            <tr>
                <td>Date of Birth</td>
                <td>
                    <select name="dd">
                        <option value="" selected disabled>DD</option>
                        <?php PrintDay(); ?>
                       
                    </select>
                    <?php echo $err_dd; ?>
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
                <td>Occupation</td>
                <td><input type="text" placeholder="" name="occupation" value="<?php echo $occupation;?>"> <?php echo $err_occupation; ?></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="text" placeholder="" name="email" value="<?php echo $email;?>"> <?php echo $err_email; ?></td>
            </tr>

            <tr>
                <td>Phone Number</td>
                <td>+88 <input type="text" placeholder="" name="phone" value="<?php echo $phone;?>"> <?php echo $err_phone; ?></td>
            </tr>

            <tr>
                <td>Location</td>
                <td>
                    <select name="location">
                        <option value="" selected disabled>Select</option>
                        <?php PrintLocation(); ?>
                    </select>
                    <?php echo $err_location; ?>
                </td>
    
            </tr>

            <tr>
                <td>Address</td>
                <td><textarea name="address" ><?php echo $address;?></textarea> <?php echo $err_address; ?></td>
            </tr>

        

            <tr>
                <td></td>
                <td><input type="submit" value="Send" name="send-btn"></td>
            </tr>
        </table>

   </form>


</body>
</html>