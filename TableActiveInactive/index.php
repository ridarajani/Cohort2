<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inactive / Active - Table</title>
</head>
<body>
    <?php
        $StudentInformation = [
            [
                "StudentName" => "Eraj",
                "DateOfBirth" => "22/12/1998",
                "Age" => "21",
                "Status" => "Active"
            ],
            [
                "StudentName" => "Muskan",
                "DateOfBirth" => "22/05/2001",
                "Age" => "18",
                "Status" => "Inactive"
            ],
            [
                "StudentName" => "Mashal",
                "DateOfBirth" => "30/12/2006",
                "Age" => "13",
                "Status" => "Inactive"
            ],
            [
                "StudentName" => "Zehra",
                "DateOfBirth" => "30/05/1998",
                "Age" => "21",
                "Status" => "Active"
            ],
            [
                "StudentName" => "Safia",
                "DateOfBirth" => "9/01/2000",
                "Age" => "19",
                "Status" => "Active"
            ]
        ];

    ?>
    <table>
        <thead>
            <tr>
    <?php

        foreach($StudentInformation[0] as $Key => $value){
    ?>
                <th>
    <?php
            echo $Key;
    ?>
                </th>
    <?php
        }
    ?>
            </tr>
        </thead>
        <tbody>
    <?php

        foreach($StudentInformation as $ParentKey => $ParentValue){
    ?>
            <tr>
    <?php
            foreach($ParentValue as $ChildValue){
    ?>
            <td>
    <?php
                echo $ChildValue;
    ?>
            </td>
    <?php
            }
    ?>
            </tr>
    <?php
        }

    ?>
        </tbody>
    </table>
</body>
</html>