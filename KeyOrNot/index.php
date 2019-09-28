<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Key Or Not</title>
</head>
<body>
    <?php
        $ArrayOne = [1, 2, 3, 4, 5, 6, 7];
        $ArrayTwo = [
                        "Grade" => "VII",
                        "Section" => "C",
                        "Total Students" => "35",
                        "Hello"

                    ];
        
        foreach($ArrayTwo as $Parent_key => $Parent_value){
            if (!is_int($Parent_key)){
                echo "Key is defined";
            }
            else{
                echo "Key is not defined";
            }
        }
    ?>
</body>
</html>