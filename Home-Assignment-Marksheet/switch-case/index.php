<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marksheet- Switch-case</title>
</head>
<body>
    <?php
        $Science = 90;
        $Maths = 85;
        $Urdu = 75;
        $English = 80;
        $SocialStudies = 65;

        $totalMarks = $Science + $Maths + $Urdu + $English + $SocialStudies;
        $Percentage = ($totalMarks / 500) * 100;

        switch ($Percentage){
            case ($Percentage >= 90 && $Percentage <= 100):
                
            echo"Science = $Science, Maths = $Maths, Urdu = $Urdu, English = $English, Social Studies = $SocialStudies <br/>";
            
            echo "Total Marks = $totalMarks <br/>";
            
            echo "Percentage = $Percentage% <br/>";
            echo ("A Grade");
                break;
            
            case ($Percentage >= 80 && $Percentage < 90):
                
            echo"Science = $Science, Maths = $Maths, Urdu = $Urdu, English = $English, Social Studies = $SocialStudies <br/>";
            
            echo "Total Marks = $totalMarks <br/>";
            
            echo "Percentage = $Percentage% <br/>";
            echo ("B Grade");
                break;

            case ($Percentage >= 70 && $Percentage < 80):
                
            echo"Science = $Science, Maths = $Maths, Urdu = $Urdu, English = $English, Social Studies = $SocialStudies <br/>";
            
            echo "Total Marks = $totalMarks <br/>";
            
            echo "Percentage = $Percentage% <br/>";
            echo ("C Grade");
                break;

            case ($Percentage >= 55 && $Percentage < 70):
                
            echo"Science = $Science, Maths = $Maths, Urdu = $Urdu, English = $English, Social Studies = $SocialStudies <br/>";
            
            echo "Total Marks = $totalMarks <br/>";
            
            echo "Percentage = $Percentage% <br/>";
            echo ("D Grade");
                break;

            case ($Percentage >= 40 && $Percentage < 55):
                
            echo"Science = $Science, Maths = $Maths, Urdu = $Urdu, English = $English, Social Studies = $SocialStudies <br/>";
            
            echo "Total Marks = $totalMarks <br/>";
            
            echo "Percentage = $Percentage% <br/>";
            echo ("E Grade");
                break;

            case ($Percentage < 40):
                
            echo"Science = $Science, Maths = $Maths, Urdu = $Urdu, English = $English, Social Studies = $SocialStudies <br/>";
            
            echo "Total Marks = $totalMarks <br/>";
            
            echo "Percentage = $Percentage% <br/>";
            echo ("F Grade");
                break;
        }
    ?>
</body>
</html>