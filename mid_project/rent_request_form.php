<?php
     $hasError = false;

     $post_title = "";
     $err_post_title = "";

     $rent_type = "";
     $err_rent_type = "";

     $price_range = "";
     $err_price_range = "";

     $location = "";
     $err_location = "";

     $address = "";
     $err_address = "";

     if(isset($_POST['post-btn'])) {
        $post_title = htmlspecialchars($_POST['post-title']);
        $price_range = htmlspecialchars($_POST['price-range']);
        $address = htmlspecialchars($_POST['address']);

        // post title
        if(empty($post_title)) {
            $hasError = true;
            $err_post_title = "<span><sup>*</sup>Field is empty!</span>";
        }

        // rent type
        if(!isset($_POST['rent-type'])) {
            $hasError = true;
            $err_rent_type = "<span><sup>*</sup>Select a rent type!</span>";
        }

        // price range
        if(empty($price_range) && $price_range != '0') {
            $hasError = true;
            $err_price_range = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($price_range)) {
            $hasError = true;
            $err_price_range = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if($price_range < 1) {
            $hasError = true;
            $err_price_range = "<span><sup>*</sup>Must be greater than 0!</span>";
        }

        // location
        if(!isset($_POST['location'])) {
            $hasError = true;
            $err_location= "<span><sup>*</sup>Select a location!</span>";
        }

        // address
        if(empty($address)) {
            $hasError = true;
            $err_address = "<span><sup>*</sup>Field is empty!</span>";
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


    function PrintRentType() {
        $rent_types = array("Vehicle", "Apartment", "Instrument");
        foreach($rent_types as $r) {
    
        
            if($_POST['rent-type'] == $r) {
                echo "<option value='$r' selected>$r</option>";
            } else {
                echo "<option value='$r'>$r</option>";
            }
        
        }


    }


    if(!$hasError) {
        echo "Post Title: " . $post_title . "<br>";
        echo "Rent Type: " . $_POST['rent-type'] . "<br>";
        echo "Price: " . $price_range . " (Max)<br>";
        echo "Location: " . $_POST['location'] . "<br>";
        echo "Address: " . $address . "<br>";
        echo "<hr>";
    }



?>

<!DOCTYPE html>
<html>
<head>
    <title>Rent Request Form</title>
</head>
<body>
    
    <form action="" method="POST">
        <table border="1">
            <caption>Rent Request Form</caption>
            <tr>
                <td>Post Title</td>
                <td><input type="text" name="post-title" placeholder="" value="<?php echo $post_title; ?>"> <?php echo $err_post_title; ?></td>
            </tr>

            <tr>
                <td>Rent Type</td>
                <td>
                    <select name="rent-type">
                        <option value="" selected disabled>Select</option>
                        <?php PrintRentType(); ?>
                    </select>
                    
                    <?php echo $err_rent_type; ?>
                </td>

            </tr>

            <tr>
                <td>Price Range</td>
                <td>
                    Max <input type="text" name="price-range" placeholder="0" value="<?php echo $price_range; ?>"> ৳<?php echo $err_price_range; ?>
                </td>
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
                <td><textarea name="address" ><?php echo $address; ?></textarea> <?php echo $err_address; ?></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Post" name="post-btn"></td>
            </tr>
        </table>
    </form>
</body>
</html>