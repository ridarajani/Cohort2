<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Key Exists- Function</title>
</head>
<body>
    <?php
        $UserKey = "Total Students";
        $ArrayOne = [
                        "Grade" => "VII",
                        "Section" => "C",
                        "Total Students" => "35",
                    ];

        function KeyExistsOrNot($CheckArray,$KeyToCheck){
            $Check = 1;
            foreach($CheckArray as $Parent_key => $Parent_value){
                if ($Parent_key == $KeyToCheck){
                    echo "Key Exists";
                    $Check = 0;
                }
            }
            if ($Check == 1){
                echo "Your Key Doesn't Exist";
            }
        }

        KeyExistsOrNot($ArrayOne,$UserKey);
    ?>
</body>
</html>