<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <?php 
    $array = [];
    $array2 = [];
    if(isset($_POST['submit'])){
        $array2[] = $_POST['student_name']; 
        $array2[] = $_POST['student_age']; 
        $array2[] = $_POST['student_number'];
 
        if(empty($_COOKIE['student']) && !isset($_COOKIE['student'])){


            $array[] = $array2; 
            
            $serialize = serialize($array);
            $encode = base64_encode($serialize);
            setcookie('student',$encode,time()+60*60*24,"/");
        }else{

            $decode = base64_decode($_COOKIE['student']);
            $unserialize = unserialize($decode);

            $unserialize[] = $array2; 
            
            $serialize = serialize($unserialize);
            $encode = base64_encode($serialize);
            setcookie('student',$encode,time()+60*60*24,"/");

           

        }
        
    }
    ?>
    
    <form method="POST">
        <label>Student Name:</label>
        <input name="student_name" > 
        <label>Student Age:</label>
        <input name="student_age" > 
        <label>Student Number:</label>
        <input name="student_number" > 
        <input name="submit" value="submit" type="submit" > 
        
    </form>
    <?php 
    if(isset($_COOKIE['student'])){

        $decode = base64_decode($_COOKIE['student']);
        $unserialize = unserialize($decode);
        print_r($unserialize); ?>
        <ul>
        <?php 
        foreach($array as $key => $value){ ?>
            <li>
            <?php
            foreach($value as $key2 => $value2){
                ?>
                   <div> <?php echo $value2; ?></div>
                   
                <?php 
            }    
            ?>
            <div>
                <a href="view.php?std=<?php echo $key; ?>">View</a>
            </div>
            </li>
           <?php 
        }
        ?>
        </ul>
        <?php
    }
     ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php

    if(isset($_COOKIE['student'])){
        $std_id         = $_GET['std'];
        $decode         = base64_decode($_COOKIE['student']);
        $unserialize    = unserialize($decode);

        foreach( $unserialize[$std_id] as $val )
        {
            echo $val.'<br>';
        } 
    }

    ?>
</body>
</html>