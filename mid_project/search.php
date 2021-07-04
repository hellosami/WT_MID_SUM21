<?php 
    $Location=$Rent=$Price=$Date="";
    $LocationErr=$RentErr=$PriceErr=$DateErr="";
    $Price1="";
    if (isset($_POST['create'])) 
    {
        //=========Location===========
        if(empty($_POST["Location"])) 
        {
            $LocationErr="Please Select a Location";
        }
        else       
        {
            $Location=$_POST["Location"];
        }

        //=========Rent Type===========
        if(empty($_POST["Rent"])) 
        {
            $RentErr="Please Select Rent Type";
        }
        else       
        {
            $Rent=$_POST["Rent"];
        }


        //=========Price Range===========
        $Price1=$_POST["Price"];
        if(empty($Price1)) 
        {
            $PriceErr="Please Enter Price Range";
        }
        else if(!(is_numeric($Price1)))
        {
            $PriceErr="Please Enter Numeric Price Range";
        }
        else       
        {
            $Price=$_POST["Price"];
        }

        //=========Date===========
        if(empty($_POST["Date"])) 
        {
            $DateErr="Please Select Date";
        }
        else       
        {
            $Date=$_POST["Date"];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <fieldset>
        <legend><h3>Search</h3></legend>  
            <table>
                <tr> 
                    <td><label>Location</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td><select name="Location">
                        <option disabled selected>Select a Location</option>
                        <option value="Uttara" <?php if ($Location == 'Uttara') echo ' selected="selected"'; ?>>Uttara</option>
                        <option value="Nikunja" <?php if ($Location == 'Nikunja') echo ' selected="selected"'; ?>>Nikunja</option>
                        <option value="Kuratoli" <?php if ($Location == 'Kuratoli') echo ' selected="selected"'; ?>>Kuratoli</option>
                        <option value="Basudhora" <?php if ($Location == 'Basudhora') echo ' selected="selected"'; ?>>Basudhora</option>
                        <option value="Badda" <?php if ($Location == 'Badda') echo ' selected="selected"'; ?>>Badda</option>
                        <option value="Banani" <?php if ($Location == 'Banani') echo ' selected="selected"'; ?>>Banani</option>
                        <option value="Mirpur" <?php if ($Location == 'Mirpur') echo ' selected="selected"'; ?>>Mirpur</option>
                    </select></td>
                    <td>
                        <?php echo $LocationErr; ?>
                    </td>
                </tr>
            </table> 

            <table>
                <tr> 
                    <td><label>Rent Type</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td><select name="Rent">
                        <option disabled selected>Select a Type</option>
                        <option value="Vehicle" <?php if ($Rent == 'Vehicle') echo ' selected="selected"'; ?>>Vehicle</option>
                        <option value="Instrument" <?php if ($Rent == 'Instrument') echo ' selected="selected"'; ?>>Instrument</option>
                        <option value="Apartment" <?php if ($Rent == 'Apartment') echo ' selected="selected"'; ?>>Apartment</option>
                    </select></td>
                    <td>
                        <?php echo $RentErr; ?>
                    </td>
                </tr>
            </table> 

            <table>
                <tr>
                    <td><label>Price Range</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td>
                    <td><input type="text" name="Price" value="<?php echo $Price1; ?>"></td>
                    <td> <?php echo $PriceErr; ?> </td>
                </tr>
            </table>

             <table>
                <tr> 
                    <td><label>Date</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td><select name="Date">
                        <option disabled selected>Select Date</option>
                        <option value="Newest" <?php if ($Date == 'Newest') echo ' selected="selected"'; ?>>Newest</option>
                        <option value="Oldest" <?php if ($Date == 'Oldest') echo ' selected="selected"'; ?>>Oldest</option>
                    </select></td>
                    <td>
                        <?php echo $DateErr; ?>
                    </td>
                </tr>
            </table> 
          
            <table>
                <tr>
                    <td>
                        <input type="submit" name="create">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>