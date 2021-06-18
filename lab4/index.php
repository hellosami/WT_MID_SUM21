<?php
    $name = "";
    $err_name = "";

    $username = "";
    $err_username = "";

    $email = "";
    $err_email = "";

    $country_code = "";
    $err_country_code = "";

    $phone_number = "";
    $err_phone_number = "";

    $password = "";
    $err_password = "";

    $confirm_password = "";
    $err_confirm_password = "";

    $street_address = "";
    $err_street_address = "";

    $city_name = "";
    $err_city_name = "";

    $state_name = "";
    $err_state_name = "";

    $postal_code = "";
    $err_postal_code = "";

    $gender = "";
    $err_gender = "";

    
    $check_list = [];
    $err_check_list = "";

    $select_day = "";
    $err_select_day = "";

    $select_month = "";
    $err_select_month = "";

    $select_year = "";
    $err_select_year = "";

    $bio = "";
    $err_bio = "";

    $hasError = false;

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

 
    if(isset($_POST['submit'])) {
   
        $name = htmlspecialchars($_POST['name']);
        $username = htmlspecialchars($_POST['username']);

        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm-password']);

        $email = htmlspecialchars($_POST['email']);
        
        $country_code = htmlspecialchars($_POST['country-code']);
        $phone_number = htmlspecialchars($_POST['phone-number']);

        $street_address = htmlspecialchars($_POST['street-address']);
        $city_name = htmlspecialchars($_POST['city-name']);
        $state_name = htmlspecialchars($_POST['state-name']);
        $postal_code = htmlspecialchars($_POST['postal-code']);



        //$gender = htmlspecialchars($_POST['gender']);
    //    $check_list
        
        $bio = htmlspecialchars($_POST['bio']);

        // $check_list = htmlspecialchars($_POST['check-list']);

        
        if(empty($name)) {
            $hasError = true;
            $err_name = "field is empty";
        }

        if(empty($username)) {
            $hasError = true;
            $err_username = "field is empty";
        }
        // whitespace checking
        else if(count(explode(" ", $username)) > 1) {
            $hasError = true;
            $err_username = "contains whitespace";
        }
        else if(strlen($username) < 6) {
            $hasError = true;
            $err_username = "username must contain at least 6 characters";
        }



        // Password
        if(empty($password)) {
            $hasError = true;
            $err_password = "field is empty";
        }

        else if(strlen($password) < 8 ) {
            $hasError = true;
            $err_password = "password must contain at least 8 character";
        }


       
        else if(!strpos($password, '#') && !strpos($password, '?')) {
            $hasError = true;
            $err_password = "1 special character # or ?";
        }


        elseif(hasOneNumber($password) == 0 || hasOneNumber($password) > 1) {
            $hasError = true;
            $err_password = "1 number";
        }

        elseif(!(hasUpperCase($password) && hasLowerCase($password))) {
        
            $hasError = true;
            $err_password = "combination of uppercase and lowercase";
        }
        

        // Confirm Password

        if(empty($confirm_password)) {
            $hasError = true;
            $err_confirm_password = "field is empty";
        }

        elseif($password != $confirm_password) {
            $hasError = true;
            $err_confirm_password = "password doesn't match";
        }


        // Addresses
        if(empty($street_address)) {
            $hasError = true;
            $err_street_address = "field is empty";
        }

        if(empty($city_name)) {
            $hasError = true;
            $err_city_name = "field is empty";
        }

        if(empty($state_name)) {
            $hasError = true;
            $err_state_name = "field is empty";
        }

        if(empty($postal_code)) {
            $hasError = true;
            $err_postal_code = "field is empty";
        }


        if(empty($bio)) {
            $hasError = true;
            $err_bio = "field is empty";
        }

        

        

        // Email
        if(empty($email)) {
            $hasError = true;
            $err_email = "field is empty";
        }
        elseif(!strpos($email, '@')) {
            $hasError = true;
            $err_email = "must contain @";
        }
        elseif(!strpos($email, '.')) {
            $hasError = true;
            $err_email = "must contain .(dot)";
        }
        elseif(strpos($email, '@') > strpos($email, '.')) {
            $hasError = true;
            $err_email = "must contain @ and at least one .(dot) after @";
        }

        // coutry code
        if(empty($country_code)) {
            $hasError = true;
            $err_country_code = "field is empty";
        }
        else if(!is_numeric($country_code)) {
            $hasError = true;
            $err_country_code = "must contain numeric value";
        }

        // phone number
        if(empty($phone_number)) {
            $hasError = true;
            $err_phone_number = "field is empty";
        }
        else if(!is_numeric($phone_number)) {
            $hasError = true;
            $err_phone_number = "must contain numeric value";
        }


        
        //day
        
        if(!isset($_POST['select-day'])) {

            $hasError = true;
            $err_select_day= "select a option";

        } else {
            $select_day = $_POST['select-day']; // storing array
        }

        //month
        
        if(!isset($_POST['select-month'])) {

            $hasError = true;
            $err_select_month= "select a option";

        } else {
            $select_month = $_POST['select-month']; // storing array
        }

        //year
        
        if(!isset($_POST['select-year'])) {

            $hasError = true;
            $err_select_year= "select a option";

        } else {
            $select_year = $_POST['select-year']; // storing array
        }


        // gender
        if(!isset($_POST['gender'])) {

            $hasError = true;
            $err_gender= "select a option";
        } else {
            $gender = htmlspecialchars($_POST['gender']);
          
        }
    




       // checklist
       if(!isset($_POST['check-list'])) {

            $hasError = true;
            $err_check_list= "select one or multiple options";

        } else {
            $check_list = $_POST['check-list']; // storing array
        }



     
       
    }

    function PrintYear() {

        for($i = (int) date("Y"); $i >= 1999; $i--) {
            
            echo "<option value='$i' >". $i ."</option>";

            if($_POST['select-year'] == $i) {
                echo "<option value='$i' selected>". $i ."</option>";
            } else {
                echo "<option value='$i'>". $i ."</option>";
            }
        }
    }

    function PrintDay() {
       

  
        for($i = 1; $i <= 31; $i++) {

            if($_POST['select-day'] == $i) {
                echo "<option value='$i' selected>". $i ."</option>";
            } else {
                echo "<option value='$i'>". $i ."</option>";
            }

       
            
        }
    }

    function PrintMonth() {
        $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        foreach($months as $m) {

            
            if($_POST['select-month'] == $m) {
                echo "<option value='$m' selected>$m</option>";
            } else {
                echo "<option value='$m'>$m</option>";
            }
           
        }
    }


   
  
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab Task4</title>

    <style>
        table {
            border-collapse: collapse;
           
        }

        td {
         
        }

        td > span {
            color: red;
            font-size: 12px;
        }

        table {
            width: 50%;
        }
    </style>
</head>
<body>

    
    <?php

      if(!$hasError) {
        $concat_cl = "";
        foreach($check_list as $data) {
            $concat_cl = $concat_cl . $data . ", ";
        }

        
        echo
            "
            <table border='1'>
                <tr>
                    <td>Name</td>
                    <td>$name</td>
                </tr>
            
                <tr>
                <td>Username</td>
                <td>$username</td>
                </tr>

                
                <tr>
                <td>Password</td>
                <td>$password</td>
                </tr>

                <tr>
                <td>Email</td>
                <td>$email</td>
                </tr>

                <tr>
                <td>Phone</td>
                <td>$country_code $phone_number </td>
                </tr>

                <tr>
                <td>Street Address</td>
                <td>$street_address</td>
                </tr>

                <tr>
                <td>City Name</td>
                <td>$city_name</td>
                </tr>

                <tr>
                <td>State Name</td>
                <td>$state_name</td>
                </tr>

                <tr>
                <td>Postal Code</td>
                <td>$postal_code</td>
                </tr>

                <tr>
                <td>Birth Date</td>
                <td>$select_day/$select_month/$select_year</td>
                </tr>

                <tr>
                <td>Gender</td>
                <td>$gender</td>
                </tr>

                <tr>
                <td>Where did you hear about us?</td>
                <td>$concat_cl</td>
                </tr>

                <tr>
                <td>Bio</td>
                <td>$bio</td>
                </tr>

                
            </table>
        
            "
            ;
    }
    ?>
    <br>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"> <span><?php echo $err_name; ?></span></td>
            </tr>
    
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo $username; ?>"> <span><?php echo $err_username; ?></span></td>
            </tr>
    
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value="<?php echo $password; ?>"> <span><?php echo $err_password; ?></span></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm-password" value="<?php echo $confirm_password; ?>"> <span><?php echo $err_confirm_password; ?></span></td>
            </tr>
    
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"> <span><?php echo $err_email; ?></span></td>
            </tr>
    
            <tr>
                <td>Phone:</td>
                <td>
                    <input type="text" name="country-code" placeholder="code" value="<?php echo $country_code; ?>">
                    <span><?php echo $err_country_code; ?></span>
                    -
                    <input type="text" name="phone-number" placeholder="Number" value="<?php echo $phone_number; ?>">
                    <span><?php echo $err_phone_number; ?></span>
                </td>
            </tr>
    
            <tr>
                <td>Street Address:</td>
                <td>
                        <input type="text" name="street-address" placeholder="Street Address" value="<?php echo $street_address; ?>">
                        <span><?php echo $err_street_address;  ?></span>
                        <br>
                        <input type="text" name="city-name" placeholder="City" value="<?php echo $city_name; ?>">
                        <span><?php echo $err_city_name; ?></span>
                        -
                        <input type="text" name="state-name" placeholder="State" value="<?php echo $state_name; ?>">
                        <span><?php echo $err_state_name; ?></span>
                        <br>
                        <input type="text" name="postal-code" placeholder="Postal/Zip Code" value="<?php echo $postal_code; ?>">
                        <span><?php echo $err_postal_code; ?></span>
                </td>
            </tr>
    
            <tr>
                <td>Birth Date: </td>
                <td>
                    <select name="select-day">
                        <option selected disabled>Day</option>
                        <?php PrintDay(); ?>

                        
                    </select>
                    <span><?php echo $err_select_day; ?></span>
                    <select name="select-month">
                        <option selected disabled>Month</option>
                        <?php PrintMonth(); ?>
                    </select>
                    <span><?php echo $err_select_month; ?></span>
                    <select name="select-year">
                        <option selected disabled>Year</option>
                        
                        <?php PrintYear(); ?>
                    </select>
                    <span><?php echo $err_select_year; ?></span>
                </td>
            </tr>
    
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="male" <?php if($gender == "male") {echo "checked";} ?>> Male
                    <input type="radio" name="gender" value="female" <?php if($gender == "female") {echo "checked";} ?>> Female 
                    <span><?php echo $err_gender; ?></span>
                </td>
            </tr>
    
            <tr>
                <td>Where did you hear about us?</td>
                <td>
                    <input type="checkbox" name="check-list[]" value="A Friend or Collegue" <?php if(in_array("A Friend or Collegue", $check_list)) { echo "checked";} ?>> A Friend or Collegue<br>
                    <input type="checkbox" name="check-list[]" value="Google" <?php if(in_array("Google", $check_list)) { echo "checked";} ?>> Google<br>
                    <input type="checkbox" name="check-list[]" value="Blog Post" <?php if(in_array("Blog Post", $check_list)) { echo "checked";} ?>> Blog Post<br>
                    <input type="checkbox" name="check-list[]" value="News Article" <?php if(in_array("News Article", $check_list)) { echo "checked";} ?>> News Article

                    <br>
                    <span><?php echo $err_check_list; ?></span>
                </td>
            </tr>
    
    
            <tr>
                <td>Bio: </td>
                <td><textarea name="bio"><?php echo $bio; ?></textarea> <span><?php echo $err_bio; ?></span></td>
            </tr>
    
            <tr>
                <td></td>
                <td><input type="submit" value="register" name="submit"></td>
            </tr>
        </table>
    </form>
   
</body>
</html>