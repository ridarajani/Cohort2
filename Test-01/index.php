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
        require ('constantList.php');
        $BalanceAmount = 95000;
        $_REQUEST['BalanceAmount'] = $BalanceAmount;
        function Withdraw ($BalanceAmount,$Amount){
            if($Amount > 0 && $Amount <= $BalanceAmount){
                $FiveThousandNotes  = floor($Amount / 5000);
                $Remainder = $Amount % 5000;
                $ThousandNotes = floor($Remainder / 1000);
                $Remainder = $Remainder % 1000;
                $FiveHundredNotes = floor($Remainder / 500);
                echo $FiveThousandNotes ." * 5000"." + " .$ThousandNotes. " * 1000"." + ". $FiveHundredNotes. " * 500";
            }
        }

        function Deposit($BalanceAmount,$Amount){
            Return $BalanceAmount += $Amount;
        }

        function Balance($BalanceAmount){
            Return $BalanceAmount;
        }

            if (isset($_REQUEST['Submit'])){
                if($_REQUEST['ATMWork'] == "Withdraw" ){
                    Withdraw($BalanceAmount,$_REQUEST['Amount']);
                    echo WITHDRAW.$_REQUEST['Amount'];

                }
                elseif($_REQUEST['ATMWork'] == "Deposit" ){

                    $Money = Deposit($BalanceAmount,$_REQUEST['Amount']);
                    echo DEPOSIT.$_REQUEST['Amount']."<br>";
                    echo "Your balance is ".$Money;

                }
                elseif($_REQUEST['ATMWork'] == "Balance" ){
                    $Money = Balance($BalanceAmount,$_REQUEST['Amount']);
                    echo BALANCE." ".$Money;
                    
                }
            }
        

    ?>
    <form method="post">
        <div>
            <label for="Amount">Amount to withdraw:</label>
            <input type="number" name="Amount">
            <input type="hidden" value="BalanceAmount">
        </div>
        <div>
        </div>
            <select name="ATMWork">
                <option value="Withdraw">Withdraw</option>
                <option value="Deposit">Deposit</option>
                <option value="Balance">Balance</option>
            </select>
        <div>
            <input type="submit" name="Submit">
        </div>
    
    </form>
</body>
</html>