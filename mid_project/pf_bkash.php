<?php
    $hasError = false;

    $account_no = "";
    $err_account_no = "";

    $amount = "";
    $err_amount = "";

    $reference = "";
    $err_reference = "";

    $counter_no = "";
    $err_counter_no = "";

    $pin = "";
    $err_pin = "";

    $agreement = "";
    $err_agreement = "";

    if(isset($_POST['update-btn'])) {
        $account_no = htmlspecialchars($_POST['account-no']);
        $amount = htmlspecialchars($_POST['amount']);
        $reference = htmlspecialchars($_POST['reference']);
        $counter_no = htmlspecialchars($_POST['counter-no']);
        $pin = htmlspecialchars($_POST['pin']);

        // account no
        if(empty($account_no)) {
            $hasError = true;
            $err_account_no = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($account_no)) {
            $hasError = true;
            $err_account_no = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if(strlen($account_no) < 11 || strlen($account_no) > 11) {
            $hasError = true;
            $err_account_no = "<span><sup>*</sup>Must be of 11 digits!</span>";
        }

        // amount
        if(empty($amount) && $amount != '0') {
            $hasError = true;
            $err_amount = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($amount)) {
            $hasError = true;
            $err_amount = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if($amount < 1) {
            $hasError = true;
            $err_amount = "<span><sup>*</sup>Must be greater than 0!</span>";
        }

     

        // reference
        if(empty($reference)) {
            $hasError = true;
            $err_reference = "<span><sup>*</sup>Field is empty!</span>";
        }

         // counter no
         if(empty($counter_no) && $counter_no != '0') {
            $hasError = true;
            $err_counter_no = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($counter_no)) {
            $hasError = true;
            $err_counter_no = "<span ><sup>*</sup>Must contain numeric value!</span>";
        }
        else if($counter_no < 1) {
            $hasError = true;
            $err_counter_no = "<span><sup>*</sup>Must be greater than 0!</span>";
        }

        // pin
        if(empty($pin)) {
            $hasError = true;
            $err_pin = "<span><sup>*</sup>Field is empty!</span>";
        }
        else if(!is_numeric($pin)) {
            $hasError = true;
            $err_pin = "<span><sup>*</sup>Must contain numeric value!</span>";
        }
        else if(!(strlen($pin) >= 5)) {
            $hasError = true;
            $err_pin = "<span><sup>*</sup>Minimum 5 digits!</span>";
        }

        // agreement
        if(!isset($_POST['agreement'])) {

            $hasError = true;
            $err_agreement= "<span><sup>*</sup>You must agree to the terms and conditions!</span>";

        }



        if(!$hasError) {
            echo "Merchant bKash Account No: " . $account_no . "<br>";
            echo "Amount to Send: " . $amount . "<br>";
            echo "Reference: " . $reference . "<br>";
            echo "Counter No: " . $counter_no . "<br>";
            echo "PIN: " . $pin . "<br>";
            echo "Agreement: " . $_POST['agreement'] . "<br>";
            echo "<hr>";
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bkash Payment Form</title>
</head>
<body>
    
  <form action="" method="POST">
        <table border="1">
            <caption>Bkash Payment Form</caption>
            <tr>
                <td colspan="2"><img src="img/bkash_logo.jpg" width="100px" alt=""></td>
            </tr>
            <tr>
                <td>Enter Merchant bKash Account No:</td>
                <td>+88 <input type="text" name="account-no" placeholder="01XXXXXXXXX" value="<?php echo $account_no;?>"> <?php echo $err_account_no; ?></td>
            </tr>

            <tr>
                <td>Enter Amount:</td>
                <td><input type="text" name="amount" placeholder="0" value="<?php echo $amount;?>"> ৳ <?php echo $err_amount; ?></td>
            </tr>

            <tr>
                <td>Enter Reference:</td>
                <td><input type="text" name="reference" placeholder="Reference" value="<?php echo $reference;?>"> <?php echo $err_reference; ?></td>
            </tr>

            <tr>
                <td>Enter Counter No:</td>
                <td><input type="text" name="counter-no" placeholder="0" value="<?php echo $counter_no;?>"> <?php echo $err_counter_no; ?></td>
            </tr>

            <tr>
                <td>Enter PIN:</td>
                <td><input type="text" name="pin" placeholder="XXXX" value="<?php echo $pin;?>"> <?php echo $err_pin; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="agreement" value="Agreed" <?php if(isset($_POST['agreement'])) {echo "checked";} ?>> I agree to the <a href="#">terms and conditions</a> <?php echo $err_agreement; ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="update-btn"></td>
            </tr>
        </table>
  </form>
</body>
</html>