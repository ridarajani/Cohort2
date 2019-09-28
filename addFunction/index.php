<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Two Numbers- Function</title>
</head>
<body>
    <?php

        $NumOne = 20;
        $NumTwo = 30;

        function AddTwoNumbers($NoOne, $NoTwo){
            $Added = $NoOne + $NoTwo;
            Return $Added;
        }

        $Answer = AddTwoNumbers($NumOne,$NumTwo);
        echo $Answer; 
    ?>
</body>
</html>