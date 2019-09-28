<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sum of Natural Numbers- For Loop</title>
</head>
<body>
    <?php
        $z = 1;
        echo "$z";
        for($i = 2; $i <= 10; $i++){
            $z += $i;
            echo "+ $i";
        }
        echo " = $z";
    ?>
</body>
</html>