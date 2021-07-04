<?php

$title="";
$title_error="";
$error = false;


$type="";
$type_error ="";


$rate ="";
$rate_error="";


$condition="";
$condition_error="";

$location="";
$location_error="";

$adress="";
$adress_error="";




if(isset($_POST["submit"]))
{
    if(empty($_POST["title"]))
    {
        $error =true;
        $title_error="This Field is Empty";
    }

    elseif(is_numeric($_POST["title"]))
    {
        $error = true;
        $title_error = "Numeric is not allow ";
    }
    else
    {
        $title = $_POST["title"];
    }

    // Instrument TYPE VALIDATION
    if(!isset($_POST["type"]))
    {
        $error = true;
        $type_error="please select one";
    } else {
        $type = $_POST["type"];
    }


    // RATE VALIDATION
    if(empty($_POST["rate"]))
    {
        $error = true;
        $rate_error="This field is empty";

    }
    elseif(is_numeric($_POST["rate"]))
    {
        $rate = $_POST["rate"];

    }

    else
    {
        $error = true;
        $rate_error = "only numeric allow !!";
    }

     // condition VALIDATION
     if(!isset($_POST["condition"]))
     {
         $error = true;
         $condition_error = "Please Select one condition..";
     }

     else
     {
         $condition = $_POST["condition"];
     }

// LOCATION VALIDATION

        if(!isset($_POST["location"]))
        {
            $error = true;
            $location_error="please select one";
        } else {
            $location = $_POST["location"];
        }


        //Adress validation
        if(empty($_POST["adress"]))
        {
            $error = true;
            $adress_error ="This Field is Empty";
        }

        elseif(is_numeric($_POST["adress"]))
        {
            $error = true;
            $adress_error = "numeric is not Allow";
        }

        else
        {
            $adress = $_POST["adress"];   
        }

        if(!$error) {
            echo "Post Title:" . $title . "<br>";
            echo "Instrument Type :" .$type . "<br>";
            echo " Rate :" .$rate . "<br>";
            echo "Physical Condition :" .$condition . "<br>";
            echo "Location :" .$location . "<br>";
            echo "Adress :" .$adress ;

        }

}



function instrumentPrint()
{
    $type = array("Guiter","Ukulele","Violin","Projector","PS4","Music Player");

    foreach($type as $m)
    {
        echo "<option>$m</option>";
    }

}

function locationPrint()
{
    $location = array("Kuril","Bashundhara","Mirpur","Gazipur","Dhanmondi");
    foreach($location as $l)
    {
        echo "<option>$l</option>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <form action="" method="post">
        <h1>Instrument Post Form</h1>
  
    <table>

        <tr>
            <td>Post Title </td>
            <td>
                <input type="text"name="title">
                <?php echo "$title_error"; ?>
             </td>
        </tr>

        <tr>
            <td>Instrument Type</td>
            <td>
                <!-- <select name="type">
                    <option value="">Select</option>
                    <option value="">Guiter</option>
                    <option value="">Ukulele</option>
                    <option value=""> Violin</option>
                    <option value=""></option>
                </select> -->
                <select name="type">
                    <option value="" selected disabled>Select</option> 
                    <?php
                        instrumentPrint();
                   ?>
                </select>
                <?php echo "$type_error"; ?>
                
               
                
            </td>
        </tr>

        <tr>
            <td>Rate</td>
            <td>
                <input type="text" name ="rate">
                <?php echo "$rate_error" ;?>
            </td>
        </tr>

        <tr>

            <td>Pysical Condition</td>
            <td>
                
                    <input type="radio" name="condition">Good
                    <input type="radio" name="condition">Very Good
                    <input type="radio" name="condition">Excellent
                    <?php echo "$condition_error"; ?>
            </td>
        </tr>


        <tr>
            <td>Location</td>
            <!-- <td>
                <select name="location">
                    <option value="">Select</option>
                    <option value="location">Kuril</option>
                    <option value="location">Bashundhara</option>
                    <option value="location">Mirpur</option>
                    <option value="location">Gazipur</option>
                </select>
            </td> -->
            <td>
                <select name="location">
                    <option value="location"selected disabled>Select</option>
                    <?php 
                        locationPrint();
                    ?>
                </select> <?php echo "$location_error"; ?>
            </td>
        </tr>

        <tr>
            <td>Adress</td>
            <td>
                <textarea name="adress"></textarea>
                <?php echo "$adress_error"; ?>
            </td>
        </tr>

        

       <tr>
           <td>
               <input type="submit"name="submit">
           </td>
       </tr>


    </table>
</form>



</body>
</html>