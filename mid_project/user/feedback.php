<?php 

$name="";
$name_error="";
$error= false;

$mail="";
$email_error="";

$review="";
$review_error="";

$res="";
$res_error="";

$exp="";
$exp_error="";

$sup="";
$sup_error="";

$ovs="";
$ovs_error="";



if(isset($_POST["submit"]))
{
    if(empty($_POST["name"]))
    {
        $error =true;
        $name_error="This Field is Empty";
    }

    elseif(is_numeric($_POST["name"]))
    {
        $error = true;
        $name_error = "Numeric is not allow ";
    }
    else
    {
        $name = $_POST["name"];
    }



    
        if (empty($_POST["mail"]))
        {
            $error = true;
            $email_error= "Empty";
        
            

        }
        elseif(is_numeric($_POST["mail"]))
        {
            $email_error= "number no allow";
    
        }
        else
        {
            $mail =htmlspecialchars($_POST["mail"]);
        }





     if(empty($_POST["review"]))
    {
        $error =true;
        $review_error="This Field is Empty";
    }

    elseif(is_numeric($_POST["review"]))
    {
        $error = true;
        $review_error = "Numeric is not allow ";
    }
    else
    {
        $review = $_POST["review"];
    }
  
    


if(!isset($_POST["exp"]))
{
    $error = true;
    $exp_error = "Please Select one condition..";
}

else
{
    $exp = $_POST["exp"];
}


if(!isset($_POST["res"]))
{
    $error = true;
    $res_error = "Please Select one condition..";
}

else
{
    $res = $_POST["res"];
}






if(!isset($_POST["sup"]))
{
    $error = true;
    $sup_error = "Please Select one condition..";
}

else
{
    $sup = $_POST["sup"];
}





if(!isset($_POST["ovs"]))
{
    $error = true;
    $ovs_error = "Please Select one condition..";
}

else
{
    $ovs = $_POST["ovs"];
}


if(!$error) {
    echo "Name :" . $name . "<br>";
    echo "Email :" .$mail . "<br>";
    echo "Review :" .$review . "<br>";
    echo "Overall Experience :" .$exp . "<br>";
    echo "Timely Response :" .$res . "<br>";
    echo "Our Support :" .$sup . "<br>";
    echo "Overall Satisfaction :" .$ovs;


}

}
?>


<!DOCTYPE html>
<html>
<html lang="en">
    
<head>
		<title>Gorent-A renting service</title>
		
    </head>
	</head>
    
	<body>
	
	<div><h1> Feedback Widget </h1></div>
    <hr>
    
    <form action="" method ="POST">

	<div>
	<div><label> Your Name </label></div>
	<div><input type="text" name="name" id="Your_Name" placeholder="Type here" ><?php echo $name_error; ?></div>
	</div>
    <br>
    
	<div>
	<div><label> Email </label></div>
	<div><input type="text" name="mail" id="Email" placeholder="abc@gmail.com" ><?php echo $email_error; ?></div>
	</div>
    <br>

	<div>
	<div><label>Your Review</label></div>
	<div><textarea name="review" id="Review" placeholder="Type here"></textarea><?php echo $review_error; ?></div>
	</div>

    <p>Overall Experience</p>
    <input type="radio" id="very Good" name="exp" value="Very Good">
      <label for="very good">Very Good</label>


      <input type="radio" id="good" name="exp" value="Good">
      <label for="good">Good</label>

      <input type="radio" id="fair" name="exp" value="Fair">
      <label for="fair">Fair</label>

      <input type="radio" id="poor" name="exp" value="Poor">
      <label for="poor">Poor</label><?php echo $exp_error; ?>

    <p>Timely Response</p>
    <input type="radio" id="very Good" name="res" value="Very Good">
      <label for="very good">Very Good</label>

      <input type="radio" id="good" name="res" value="Good">
      <label for="good">Good</label>

      <input type="radio" id="fair" name="res" value="Fair">
      <label for="fair">Fair</label>

      <input type="radio" id="poor" name="res" value="Poor">
      <label for="poor">Poor</label><?php echo $res_error; ?>



    <p>Our Support</p>

    <input type="radio" id="very Good" name="sup" value="Very Good">
      <label for="very good">Very Good</label>

      <input type="radio" id="good" name="sup" value="Good">
      <label for="good">Good</label>

      <input type="radio" id="fair" name="sup" value="Fair">
      <label for="fair">Fair</label>

      <input type="radio" id="poor" name="sup" value="Poor">
      <label for="poor">Poor</label><?php echo $sup_error; ?>



    <p>Overall Satisfaction</p>
    <input type="radio" id="very Good" name="ovs" value="Very Good">
      <label for="very good">Very Good</label>

      <input type="radio" id="good" name="ovs" value="Good">
      <label for="good">Good</label>

      <input type="radio" id="fair" name="ovs" value="Fair">
      <label for="fair">Fair</label>

      <input type="radio" id="poor" name="ovs" value="Poor">
      <label for="poor">Poor</label><?php echo $ovs_error; ?>
    
    <br><br>
    <Div>
	<div><input type="Submit" name="submit"></div>
	</form>	
	</div>
</body>
</html>