<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Automated Teller Machine</title>
</head>
<body>
    <?php
        require('constantsList.php');
        $actual_balance = 65000;

        function withdraw($balance_amount,$amount){
            global $actual_balance;
            if($amount > 0 && $amount <= $actual_balance){
                $Five_thousand_notes = floor($amount / 5000);
                $Remaining_amount = $amount % 5000;
                $thousand_notes = floor($Remaining_amount / 1000);
                $Remaining_amount %= 1000;
                $five_hundred_notes = floor($Remaining_amount / 500);
                
                echo $Five_thousand_notes." * 5000  + ".$thousand_notes." * 1000  + ".$five_hundred_notes." * 500"."<br>";

                $actual_balance = $balance_amount -= $amount;
                echo BALANCE.$actual_balance;
            }
            else{
                echo ERROR_MESSAGE;
            }
        }

        function deposit($balance_amount,$amount){
            global $actual_balance;
            if($amount > 0){
                $actual_balance = $balance_amount += $amount;
                echo BALANCE.$actual_balance;
            }
            else{
                echo ERROR_MESSAGE;
            }
        }

        function balance($balance_amount){
            global $actual_balance;
            $actual_balance = $balance_amount;
            echo BALANCE.$actual_balance;
        }

        if(isset($_REQUEST['Submit'])){
            $balance_amount = $_REQUEST['balanceAmount'] ;
            $amount = $_REQUEST['amount'];

            if($_REQUEST['ATMWork'] == "deposit"){
                echo DEPOSIT.$amount."<br>";
                deposit($balance_amount,$amount);
            }
            elseif($_REQUEST['ATMWork'] == "withdraw"){
                echo WITHDRAW.$amount."<br>";
                withdraw($balance_amount,$amount);
            }
            elseif($_REQUEST['ATMWork'] == "balance"){
                balance($balance_amount);
            }
        }
    ?>

    <form method="post">
        <div>
            <label for="UserInput">Amount to be withdrawn/deposited:</label>
            <input type="number" name="amount">
            <input type="hidden" name="balanceAmount" value="<?php echo $actual_balance ?>">
        </div>
        <div>
            <select name="ATMWork">
                <option value="">Select your requirement</option>
                <option value="deposit">Deposit Amount</option>
                <option value="withdraw">Withdraw Amount</option>
                <option value="balance">Check Balance</option>
            </select>
        </div>
        <div>
            <input type="submit" name="Submit" value="Submit">
        </div>    
    </form>
    <p>Prepared by: Taha Fatima</p>
</body>
</html>