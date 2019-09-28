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
    $Arr = [];
    if(isset($_COOKIE['student'])){
        $std_id         =  $_GET['std'];
        $decode         = base64_decode($_COOKIE['student']);
        $unserialize    = unserialize($decode);

        foreach( $unserialize[$std_id] as $val )
        {
            $Arr[] .= $val;
        } 
    }

    ?>
    <form method="POST">
        <label>Student Name:</label>
        <input name="student_name" value="<?php echo $Arr[0]; ?>" > 
        <label>Student Age:</label>
        <input name="student_age" value="<?php echo $Arr[1]; ?>"> 
        <label>Student Number:</label>
        <input name="student_number" value="<?php echo $Arr[2]; ?>"> 
        <input name="submit" value="submit" type="submit" > 
    </form>

    <?php 
    if(isset($_POST['submit'])){
        $decode = base64_decode($_COOKIE['student']);
        $unserialize = unserialize($decode);

        $Arr[0] = $_POST['student_name'];
        $Arr[1] = $_POST['student_age'];
        $Arr[2] = $_POST['student_number'];


        $unserialize[$std_id] = $Arr;
        $serialize = serialize($unserialize);
        $encode = base64_encode($serialize);
        setcookie('student',$encode,time()+60*060*24,"/");
    }
    ?>
</body>
</html>