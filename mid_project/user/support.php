<?php 

$error=false;

$cy = date("Y"); 
$F_NameErr=$L_NameErr=$DepartmentErr=$ManagerErr=$EmailErr=$Phone_NErr=$IssuesErr="";
$F_Name=$L_Name=$Department=$Manager=$Email=$Phone_N=$Issues="";
$F_Name1=$L_Name1=$Email1=$Phone_N1="";
    if (isset($_POST['submit'])) 
    {
        //=========First Name===========
        $F_Name1=$_POST["F_Name"];
        if(empty($F_Name1)) 
        {
          $F_NameErr="Please Enter First Name";
        }
        elseif(is_numeric($_POST["F_Name"]))
        {
            $error = true;
            $F_NameErr="Numeric value is not Allow";
        }
        else
        {
           $F_Name=$_POST["F_Name"];
        }

        //=========Last Name===========
        $L_Name1=$_POST["L_Name"];
        if(empty($L_Name1)) 
        {
          $L_NameErr="Please Enter Last Name";
        }

        elseif(is_numeric($_POST["L_Name"]))
        {
            $error = true;
            $L_NameErr=" Numeric value is not Allow";
        }

        else
        {
           $L_Name=$_POST["L_Name"];
        }

        //=========Department===========
        if(empty($_POST["Department"])) 
        {
          $DepartmentErr="Please Select Department";
        }
        else       
        {
          $Department=$_POST["Department"];
        }

        //=========Manager===========
        if(empty($_POST["Manager"])) 
        {
          $ManagerErr="Please Select Manager";
        }
        else       
        {
          $Manager=$_POST["Manager"];
        }

        //=========Email===========
        $Email1=$_POST["Email"];
        if(empty($Email1)) 
        {
          $EmailErr="Please Enter Email Address";
        }
        else
        {
           $Email=$_POST["Email"];
        }

        //==============Phone Number==============
        $Phone_N1=$_POST["Phone_N"];
        if(empty($Phone_N1)) 
        {
          $Phone_NErr="Please Enter Phone Number";
        }
        else if(!(is_numeric($Phone_N1)))
        {
            $Phone_NErr="Please Enter Numeric Phone Number";
        }

        else if(strlen($Phone_N1) != 11)
        {
            $Phone_NErr= "Phone Number must contain 11 digits"; 
        }
        else
        {
            $Phone_N=$_POST["Phone_N"];
        }

        //=============What are you having issues with?===============
        if(isset($_POST['box']))
        {
            $Issues = $_POST['box'];
           
              $checked = count($_POST['box']);
              if($checked<1)
              $IssuesErr = "Select at least One options";
            
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>IT Service Request Form</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <fieldset>
        <legend></legend>  
            <table>
                <tr>
                    <td><label>First Name</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td>
                    <td><input type="text" name="F_Name" value="<?php echo $F_Name1; ?>"></td>
                    <td> <?php echo $F_NameErr; ?> </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><label>Last Name</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td>
                    <td><input type="text" name="L_Name" value="<?php echo $L_Name1; ?>"></td>
                    <td> <?php echo $L_NameErr; ?> </td>
                </tr>
            </table> 

            <table>
                <tr> 
                    <td><label>Department</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td><select name="Department">
                        <option disabled selected>Chose Department</option>
                        <option value="AA" <?php if ($Department == 'AA') echo ' selected="selected"'; ?>>AA</option>
                        <option value="BB" <?php if ($Department == 'BB') echo ' selected="selected"'; ?>>BB</option>
                        <option value="CC" <?php if ($Department == 'CC') echo ' selected="selected"'; ?>>CC</option>
                    </select></td>
                    <td>
                        <?php echo $DepartmentErr; ?>
                    </td>
                </tr>
            </table> 

            <table>
                <tr> 
                    <td><label>Manager</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td> 
                    <td><select name="Manager">
                        <option disabled selected>Chose Manager</option>
                        <option value="A" <?php if ($Manager == 'A') echo ' selected="selected"'; ?>>A</option>
                        <option value="B" <?php if ($Manager == 'B') echo ' selected="selected"'; ?>>B</option>
                        <option value="C" <?php if ($Manager == 'C') echo ' selected="selected"'; ?>>C</option>
                    </select></td>
                    <td>
                        <?php echo $ManagerErr; ?>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><label>Email Address</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td>
                    <td><input type="text" name="Email" value="<?php echo $Email1; ?>"></td>
                    <td> <?php echo $EmailErr; ?> </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td><label>Phone Number</label></td>
                    <td><label>:</label></td>
                    <td><label>*</label></td>
                    <td><input type="text" name="Phone_N" value="<?php echo $Phone_N1; ?>"></td>
                    <td> <?php echo $Phone_NErr; ?> </td>
                </tr>
            </table> 

            <table>
                <tr>
                    <td><label>What are you having issues with?</label></td>
                    <td><?php echo $IssuesErr; ?></td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="box1[0]" value="Laptop"> <label>Laptop </label>
                        <input type="checkbox" name="box1[1]" value="Laptop_Carry_Case"><label>Laptop Carry Case</label>
                        <input type="checkbox" name="box1[2]" value="AC_Power_Cord"><label>AC Power Cord</label>
                        <input type="checkbox" name="box1[3]" value="Phone"><label>Phone</label>
                    </td>
                </tr>
            </table>

            <table>
                <tr>
                    <td>
                        <input type="submit" name="submit">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>