<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Active or Inactive Students</title>
</head>
<body>
    <ul>
        <?php
            $ActiveStudent = "2";
            $Information = [
            ["StudentName" => "Taha", "Age" => "24", "DOB" => "30/06/95", "status" => "1"],
            ["StudentName" => "Mahira", "Age" => "26", "DOB" => "15/05/92", "status" => "2"],
            ["StudentName" => "Rida", "Age" => "17", "DOB" => "29/0611/01", "status" => "1"],
            ["StudentName" => "Zehra", "Age" => "24", "DOB" => "30/06/95", "status" => "2"]
            ];
            
            foreach ($Information as $value){
                if ($value["status"] == $ActiveStudent){
        ?>
        <li>
            <ul>
        <?php
                    foreach($value as $childValues){
        ?>
                <li>
        <?php
                        echo $childValues;
        ?>
                </li>
        <?php
                    }
        ?>
            </ul>
        </li>
        <?php
                }
            }
            
        ?>
    </ul>
</body>
</html>