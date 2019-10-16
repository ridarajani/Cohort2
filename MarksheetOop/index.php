<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script>
        student_name = prompt("Enter your name = ");
        document.write(student_name+"<br>");
    </script>
    <?php
        class Marks{

            protected $maths;
            protected $social_studies;
            protected $science;
            protected $urdu;
            protected $islamiat;

            public function marksList(int $maths, int $social_studies, int $science, int $urdu, int $islamiat){
                $this->maths = $maths;
                $this->social_studies = $social_studies;
                $this->science = $science;
                $this->urdu = $urdu;
                $this->islamiat = $islamiat;                               
            }
        }

        class Percentage extends Marks{
            public $total_marks;
            public $percentage;

            public function totalMarksCalculation(){
                $this->total_marks = $this->maths + $this->social_studies + $this->science + $this->urdu + $this->islamiat;
                $this->percentage = ($this->total_marks / 500) * 100;
            }
            public function get_percentage(){
                echo "Maths : ".$this->maths."<br>";
                echo "Social Studies : ".$this->social_studies."<br>";
                echo "Science : ".$this->science."<br>";
                echo "Urdu : ".$this->urdu."<br>";
                echo "Islamiat : ".$this->islamiat."<br>";
                echo "Total Marks : ".$this->total_marks."<br>";
                echo "Percentage : ".$this->percentage."% <br>";
            }
        }

        $mark_sheet = new Percentage;
        $mark_sheet->marksList(85,72,89,65,90);
        $mark_sheet->totalMarksCalculation();
        $mark_sheet->get_percentage();
    ?>
</body>
</html>