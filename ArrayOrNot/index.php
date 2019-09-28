<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array Or Not- Function</title>
</head>
<body>
    <?php
        $UserValue = "Hello";
        function ArrayOrNot($UserValue){
            $Type = gettype($UserValue);
            if ($Type === "array"){
                echo "It is an Array";
            }
            else{
                echo "Not an Array";
            }
        }

        ArrayOrNot(["hi" => 2]);
    ?>
</body>
</html>