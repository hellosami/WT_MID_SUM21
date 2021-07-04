<?php
    $title="";
    $title_error="";
    $error = false;

    $type="";
    $type_error ="";


    $rate ="";
    $rate_error="";


    $broom="";
    $room_error="";

    $area="";
    $area_error="";

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
 
    

 
// APARTMENT TYPE VALIDATION
        if(!isset($_POST["type"]))
        {
            $error = true;
            $type_error="please select one";
        } else {
            $type = $_POST["type"];
        }

        // BEDROOM VALIDATION
        if(!isset($_POST["broom"]))
        {
            $error = true;
            $room_error = "Please Select one..";
        }

        else
        {
            $broom = $_POST["broom"];
        }

// Area Validation
        if(empty($_POST["area"]))
        {
            $error = true;
            $area_error ="This Field is Empty";
        }

        elseif(!is_numeric($_POST["area"]))
        {
            $error = true;
            $area_error = "Only numeric Allow";
        }

        else
        {
            $area = $_POST["area"];   
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
            echo "Apartment Type :" .$type . "<br>";
            echo "Apartment Rate :" .$rate . "<br>";
            echo "Bed Room :" .$broom . "<br>";
            echo "Area(SqFt) :" .$area . "<br>";
            echo "Location :" .$location . "<br>";
            echo "Adress :" .$adress;

        }
    }




    function typePrint()
    {
        $type = array("Apartment","Room","Penthouse","Duplex","Plaza","Building","Plot");
        foreach($type as $l)
        {
            echo "<option>$l</option>";
        }
    }

    function numberPrint()
    {
        for($i = 1; $i <= 10; $i++)
        {
            echo "<option>$i</option>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <form action="" method="post">
    <h1>Apartment Post Form</h1>

  
    <table>

        <tr>
            <td>Post Title </td>
            <td>
                <input type="text"name="title">
                <?php echo "$title_error" ?>
        </td>
        </tr>

        <tr>
            <td>Apartment Type</td>
            <td>
                <select name="type">
                    <option value ="" selected disabled>Select</option>
                    <?php
                        echo typePrint();
                    ?>
                    
                    
                </select>
                <?php echo "$type_error" ?>
                
                
               
                
            </td>
        </tr>

        <tr>
            <td>Rate</td>
            <td><input type="text" name ="rate">
            <?php echo "$rate_error" ?>
            </td>
        </tr>

        <tr>

            <td>BedRoom</td>
          
            <td>
                <select name="broom">
                <option value=""selected disabled >Select</option>

                <?php
                   echo numberPrint();
                ?> 
                </select>
                <?php  echo "$room_error"; ?>
            </td>
        </tr>

        <tr>
            <td>Area(Ft)</td>
            <td>
            <input type="text"name="area">
            <?php echo "$area_error"; ?>
            </td>
        </tr>

        

        <tr>
            <td>Location</td>
            <td>
                <select name="location">
                    <option value="" selected disabled>Select</option>
                    <option value="location">Kuril</option>
                    <option value="location">Bashundhara</option>
                    <option value="location">Mirpur</option>
                    <option value="location">Gazipur</option>
                </select> <?php echo "$location_error"; ?>
            </td>
        </tr>

        <tr>
            <td>Adress</td>
            <td>
            <textarea name="adress"></textarea>
            <?php  echo "$adress_error"; ?>
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