<?php
    $title="";
    $title_error="";
    $error = false;

    $type="";
    $type_error ="";
    
    $rate ="";
    $rate_error="";
   

    $regi="";
    $regi_error="";

    $meter="";
    $meter_error="";

    $adress="";
    $adress_error="";

    $code="";
    $code_error="";

    $location="";
    $location_error="";
    
    $condition="";
    $condition_error="";


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
 
    

 
// Vehicle TYPE VALIDATION
        if(!isset($_POST["type"]))
        {
            $error = true;
            $type_error="please select one";
        } else {
            $type = $_POST["type"];
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


//Registration Number valodation

        if(empty($_POST["regi_number"]))
        {
            $error = true;
            $regi_error ="This Field is Empty";
        }

        elseif(!is_numeric($_POST["regi_number"]))
        {
            $error = true;
            $regi_error = "Only numeric Allow";
        }

        else
        {
            $regi = $_POST["regi_number"];   
        }

        //  Code VALIDATION
        if(!isset($_POST["code"]))
        {
            $error = true;
            $code_error="please select one";
        } else {
            $code = $_POST["code"];
        }

// Meter Reading  Validation
        if(empty($_POST["meter_reading"]))
        {
            $error = true;
            $meter_error ="This Field is Empty";
        }

        elseif(!is_numeric($_POST["meter_reading"]))
        {
            $error = true;
            $meter_error = "Only numeric Allow";
        }

        else
        {
            $meter = $_POST["meter_reading"];   
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
            echo "Post Title:" . $title . "<br>" ;
            echo "Vehicle Type :" .$type . "<br>";
            echo " Rate :" .$rate ;
            echo "Physical Condition :" .$condition . "<br>";
            echo "Registration Number :" .$code ."-" .$regi . "<br>";
            echo "Meter Reading :" .$meter . "<br>" ;
            echo "Location :" .$location . "<br>";
            echo "Adress :" .$adress ;

        }
    
    }

    function serialPrint()
{
    $location = array("অ", "ই", "উ", "এ", "ক", "খ", "গ", "ঙ", "চ", "ছ", "জ", "ঝ", "ত");
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
        <h1>Vehicle Post Form</h1>
  
    <table>

        <tr>
            <td>Post Title </td>
            <td>
                <input type="text"name="title">
                <?php  echo "$title_error"; ?> 

            </td>
        </tr>

        <tr>
            <td>Vehicle Type</td>
            <td>
                <select name="type">
                    <option value=""selected disabled>Select</option>
                    <option value="Motor Bike">Motor Bike</option>
                    <option value="Private Car">Private Car</option>
                    <option value="Truck"> Truck</option>
                    <option value="Mini Bus">Mini Bus</option>
                </select> <?php echo "$type_error"; ?>
                
                
               
                
            </td>
        </tr>

        <tr>
            <td>Rate</td>
            <td>
                <input type="text"name ="rate">
                <?php echo "$rate_error"; ?>
            </td>
        </tr>

        <tr>

            <td>Pysical Condition</td>
            <td>
                
                    <input type="radio" name="condition" value="Good">Good
                    <input type="radio" name="condition" value="Very Good">Very Good
                    <input type="radio" name="condition" value="Excellent"> Excellent
                    <?php echo "$condition_error"; ?>
                
            </td>
        </tr>

        <tr>
            <td>Registration Number</td>
            <td>
            <select name="code">
                    <option value="" selected disabled>Code</option> 
                    <?php
                        serialPrint();
                   ?>
                </select> <?php echo "$code_error"; ?>
                <input type="text"name="regi_number">
                <?php echo "$regi_error"; ?>
            </td>
        </tr>

        <tr>
            <td>Meter Reading(Kilo Meter)</td>
            <td>
                <input type="text"name="meter_reading">
                <?php echo "$meter_error"; ?>
            </td>
        </tr>

        <tr>
            <td>Location</td>
            <td>
                <select name="location">
                    <option value=""selected disabled>Select</option>
                    <option value="location">Kuril</option>
                    <option value="location">Bashundhara</option>
                    <option value="location">Mirpur</option>
                    <option value="location">Gazipur</option>
                </select><?php echo "$location_error"; ?>
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