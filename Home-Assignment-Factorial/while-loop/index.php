<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Assignment- While Loop</title>
</head>
<body>
    <?php
        $z = 1;
        $i = 5;
        echo "$i! = ";
        while($i >= 1){
            $z *= $i;
            echo"$i*";
            $i--;
        }
        echo " = $z";
    ?>
</body>
</html>