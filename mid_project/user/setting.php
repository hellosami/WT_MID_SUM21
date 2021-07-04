<?php 
$theme="";
$language="";
$zoom="";
$status="";




if(isset($_POST["submit"]))
{
$theme=$_POST["theme"];


$language=$_POST["language"];


$zoom=$_POST["zoom"];


$status=$_POST["status"];

//     if(!isset($_POST["theme"]))
//     {
//         $error = true;
//         $theme_error="please select one";
//     } else {
//         $theme = $_POST["theme"];
//     }



//         if(!isset($_POST["language"]))
//         {
//             $error = true;
//             $language_error="please select one";
//         } else {
//             $language = $_POST["language"];
//         }

//             if(!isset($_POST["zoom"]))
//             {
//                 $error = true;
//                 $zoom_error="please select one";
//             } else {
//                 $zoom = $_POST["theme"];
//             }

// 

echo "Theme : " . $theme . "<br>";
echo "Language : " . $language . "<br>";
echo "Zoom Level : " . $zoom . "<br>";

echo "Active Status : " . $status . "<br>";
}




?>





<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <form action="" method="post">
    <h1>Set Table</h1>

  
    <table>

        <td>Select A Theme </td>
            <td>
                <select name="theme">
  
                    <option value="Light" <?php if($theme == "Light") {echo "selected";} ?>>Light</option>
                    <option value="Dark" <?php if($theme == "Dark") {echo "selected";} ?>>Dark</option>

                </select>
            </td>
            <tr>
            <td> Language</td>
            <td>
                <select name="language">
         
                    <option value="English" <?php if($language == "English") {echo "selected";} ?>>English</option>
                    <option value="Bangla" <?php if($language == "Bangla") {echo "selected";} ?>>Bangla</option>

                </select>
            </td>
        </tr>

        <tr>
            <td>Zoom Lavel</td>
           <td>
                <select name="zoom">


                    <option value="1" <?php if($zoom == "1") {echo "selected";} ?>>1</option>
                    <option value="2" <?php if($zoom == "2") {echo "selected";} ?>>2</option>
                </select>
            </td> 

        <tr>

            <td>Active Status</td>
            <td>
                
                    
                    <input type="radio" name="status" value="Active" checked <?php if($status == "Active") {echo "checked";} ?>>Active
                    
                    <input type="radio" name="status" value="Offline" <?php if($status == "Offline") {echo "checked";} ?>>Offline
                    
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