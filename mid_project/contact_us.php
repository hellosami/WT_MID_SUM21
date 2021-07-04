<?php 

$name="";
$name_error="";
$error= false;

$mail="";
$email_error="";

$subject="";
$subject_error="";

$message="";
$message_error="";


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
        elseif(!strpos($_POST["mail"], '@')) {
            $error = true;
            $email_error = "<span><sup>*</sup>Must contain @!</span>";
        }
        elseif(!strpos($_POST["mail"], '.')) {
            $error = true;
            $email_error = "<span><sup>*</sup>Must contain .(dot)!</span>";
        }
        elseif(strpos($_POST["mail"], '@') > strpos($_POST["mail"], '.')) {
            $error = true;
            $email_error = "<span><sup>*</sup>Must contain @ and at least one .(dot) after @!</span>";
        }
        else
        {
            $mail =htmlspecialchars($_POST["mail"]);
        }

        if(empty($_POST["subject"]))
    {
        $error =true;
        $subject_error="This Field is Empty";
    }

    elseif(is_numeric($_POST["subject"]))
    {
        $error = true;
        $subject_error = "Numeric is not allow ";
    }
    else
    {
        $subject = $_POST["subject"];
    }

    if(empty($_POST["message"]))
    {
        $error =true;
        $message_error="This Field is Empty";
    }

    elseif(is_numeric($_POST["message"]))
    {
        $error = true;
        $message_error = "Numeric is not allow ";
    }
    else
    {
        $message = $_POST["message"];
    }  

    if(!$error) {
        echo "Name :" . $name . "<br>";
        echo "Email :" .$mail . "<br>";
        echo "Subject :" .$subject . "<br>";
        echo "Message :" .$message ;
    
    }
}



?>



<!DOCTYPE html>
<html>
<html lang="en">

	<body>
    <h1>GORENT</h1>
    <hr>
        <a href="index.html">Home</a>
        <a href="about_us.html">About us</a>
        <a href="contact_us.php">Contacts us</a>
  
        <a href="login.php">Login</a>
    <hr>


    <form action="" method="post">
	
	<div><h1> Contact Us  </h1></div>
    <hr>
    
    <form action="" method="post">


	<div><input type="text" name="name" id="Name" placeholder="Name" ></div><?php echo $name_error; ?>
    <br>
    

	<div><input type="text" name="mail" id="Email" placeholder="Email" ></div><?php echo $email_error; ?>
    <br>


    <div><input type="text" name="subject" id="Subject" placeholder="Subject" ></div></div><?php echo $subject_error; ?>
    <br>

	
	<div><textarea name="message" id="Message" placeholder="Message"></textarea></div></div><?php echo $message_error; ?>
    <br>


    <div>
	<div><input type="Submit" name ="submit"></div>
	</form>	
	</div>
    </form>
</body>
</html>