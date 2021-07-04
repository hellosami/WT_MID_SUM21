<?php 

$userid="";
$id_error="";
$error= false;

$bfd="";
$bfd_error="";

$pid="";
$pid_error="";

$message="";
$message_error="";


if(isset($_POST["submit"]))
{
    if(empty($_POST["userid"]))
    {
        $error =true;
        $id_error="This Field is Empty";
    }

    elseif(!is_numeric($_POST["userid"]))
    {
        $error = true;
        $id_error = "Not a Numeric  value  ";
    }
    else
    {
        $userid = $_POST["userid"];
    }


    
        if (empty($_POST["bfd"]))
        {
            $error = true;
            $bfd_error= "Empty";
        
            

        }
        elseif(!is_numeric($_POST["bfd"]))
        {
            $error = true;
            $bfd_error= "Not a Numeric  value";
    
        }
        else
        {
            $bfd =($_POST["bfd"]);
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

    if(empty($_POST["postid"]))
    {
        $error =true;
        $pid_error="This Field is Empty";
    }

    elseif(!is_numeric($_POST["postid"]))
    {
        $error = true;
        $pid_error = "Not a Numeric  value ";
    }
    else
    {
        $pid = $_POST["postid"];
    }  

    if(!$error) {
        echo "User Id :" . $userid . "<br>";
        echo "Banned For Days :" .$bfd . "<br>";
        echo "Message :" .$message . "<br>";
        echo "Post Id :" .$pid ;
    
    }
}



?>


<!DOCTYPE html>
<html>
    <head>
        <title>USER BANNED FORM</title>
    </head>
    <body>


    <h1>USER BAN FORM</h1>
    <form action="" method="post">

            <div><label for="userid">User Id</label></div>
            <div><input type="text" id="User Id" name ="userid" placeholder="enter your id"></div> <?php echo $id_error; ?>
            
            <div><label for="bfd">Banned For Days</label></div>
            <div><input type="text" id="Banned For Days" name="bfd" placeholder="banned for __ days"></div> <?php echo $bfd_error; ?>


            <div><label for="message">Your Messsage</label></div>
            <div><textarea id="Your Messsage" name="message" rows="7" columns="14" placeholder="reason for banned"></textarea></div> <?php echo $message_error; ?>
            
            <div><label for="postid">Post Id</label></div>
            <div><textarea id="Post Id" name="postid" rows="7" columns="14" placeholder="enter your id"></textarea></div> <?php echo $pid_error; ?>

            <input type="submit" name="submit">     
        </form>
    
    </body>
</html>