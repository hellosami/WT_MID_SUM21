<?php 
    $cy = date("Y"); 
    $Title=$Offer=$Description=$Day=$Month=$Year="";
    $TitleErr=$OfferErr=$DescriptionErr=$Day_Err=$Month_Err=$Year_Err="";
    $Title1=$Description1="";
    if (isset($_POST['create'])) 
    {
        //=========Title===========
        $Title1=$_POST["Title"];
        if(empty($Title1)) 
        {
            $TitleErr="Please Enter Title";
        }
        else       
        {
            $Title=$_POST["Title"];
        }

        //=========Offer Type===========
        if(empty($_POST["Offer"])) 
        {
            $OfferErr="Please Select Offer Type";
        }
        else       
        {
            $Offer=$_POST["Offer"];
        }

        //=========Title===========
        $Description1=$_POST["Description"];
        if(empty($Description1)) 
        {
            $DescriptionErr="Please Enter Description";
        }
        else       
        {
            $Description=$_POST["Description"];
        }

        //=========Offer Expiry Date============
        if(empty($_POST["Day"])) 
        {
          $Day_Err="Please Select Day";
        }
        else
        {
            $Day=$_POST["Day"];
        }
        if(empty($_POST["Month"])) 
        {
          $Month_Err="Please Select Month";
        }
        else
        {
            $Month=$_POST["Month"];
        }
        if(empty($_POST["Year"])) 
        {
          $Year_Err="Please Select Year";
        }
        else
        {
            $Year=$_POST["Year"];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Offer News Creation</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <fieldset>
        <legend></legend>  

            <table>
                <tr>
                    <td><label>Title</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td>
                    <td><input type="text" name="Title" value="<?php echo $Title1; ?>"></td>
                    <td> <?php echo $TitleErr; ?> </td>
                </tr>
            </table>
            
            <table>
                <tr> 
                    <td><label>Offer Type</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td><select name="Offer">
                        <option disabled selected>Select Offer Type</option>
                        <option value="Eid Offer" <?php if ($Offer == 'Eid Offer') echo ' selected="selected"'; ?>>Eid Offer</option>
                        <option value="Valentines Day Offer" <?php if ($Offer == 'Valentines Day Offer') echo ' selected="selected"'; ?>>Valentines Day Offer</option>
                        <option value="New Year Offer" <?php if ($Offer == 'New Year Offer') echo ' selected="selected"'; ?>>New Year Offer</option>
                    </select></td>
                    <td>
                        <?php echo $OfferErr; ?>
                    </td>
                </tr>
            </table> 

             <table>
                <tr> 
                    <td><label>Description</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td>
                        <textarea name="Description" rows="4" cols="50" value=""></textarea>
                    </td>
                    <td>
                        <?php echo $DescriptionErr; ?>
                    </td>
                </tr>
            </table> 

            <table>
                <tr>
                    <td>
                        <label >Offer Expiry Date : </label>
                        <select name="Day"> 
                        <option disabled selected>Day</option>
                        <?php for ($i=1; $i <= 31 ; $i++) 
                        { 
                            # code...
                        ?>
                        <option value="<?php echo $i; ?>" <?php if ($Day == $i) echo ' selected="selected"'; ?>><?php echo $i; ?></option> 
                        <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select name="Month"> 
                        <option disabled selected>Month</option>
                        <?php for ($i=1; $i <= 12 ; $i++) 
                        { 
                            # code...
                        ?>
                        <option value="<?php echo $i; ?>" <?php if ($Month == $i) echo ' selected="selected"'; ?>><?php echo $i; ?></option> 
                        <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select  name="Year"> 
                        <option disabled selected>Year</option>
                        <?php for ($i=2010; $i <= $cy ; $i++) 
                        { 
                            # code...
                        ?>
                        <option value="<?php echo $i; ?>" <?php if ($Year == $i) echo ' selected="selected"'; ?>><?php echo $i; ?></option> 
                        <?php } ?>
                        </select>
                    </td>
                    <td>
                        <?php echo $Day_Err; ?>
                        <?php echo $Month_Err; ?>
                        <?php echo $Year_Err; ?>
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