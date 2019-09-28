<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multidimensional Array</title>
</head>
<body>
    <?php
        $studentInfo = ["studentOne" => ["studentName" => "Mahnoor", "DOB" => "24/12/1995", "Age" => "23", "PhoneNumber" => "090078601"], "studentTwo" => ["studentName" => "Khadija", "DOB" => "30/05/1995", "Age" => "24", "PhoneNumber" => "090078602"], "studentThree" => ["studentName" => "Mahira", "DOB" => "15/06/1992", "Age" => "26", "PhoneNumber" => "090078603"], "studentFour" => ["studentName" => "Amna", "DOB" => "02/07/1995", "Age" => "24", "PhoneNumber" => "090078604"], "studentFive" => ["studentName" => "Fizza", "DOB" => "18/12/1995", "Age" => "23", "PhoneNumber" => "090078605"]];

        foreach ( $studentInfo as $value){
            foreach ($value as $value){
                echo ($value);
            };
        };
    ?>
</body>
</html>