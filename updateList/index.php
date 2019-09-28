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
//  $arr= ['Mahnoor', 20, '090078601'];

//     $serarr = serialize($arr);
//     echo $serarr."<br>";
//     print_r(unserialize($serarr))."<br>";
    $Info_array = [];
    $Parent_array =[];

    if(isset($_POST['submit'])){
        $Info_array[] = $_POST['student_name'];
        $Info_array[] = $_POST['student_age'];
        $Info_array[] = $_POST['student_number'];

        if(!isset($_COOKIE['StudentInfo']) && empty($_COOKIE['StudentInfo'])){
            $Parent_array[] = $Info_array;
            $Info_arr = serialize($Parent_array);
            $data = base64_encode($Info_arr);
            setcookie('StudentInfo',$data,time()+86400,"/");
        }
        else{        

            $decoded = base64_decode($_COOKIE['StudentInfo']);
            $unser_arr = unserialize($decoded);
            print_r($unser_arr);

// mistake is here use ( $unser_arr ) this array 
            $unser_arr[] = $Info_array; 
  // replace code  $unser_arr[] = $Info_array;   $Info_arr = serialize($unser_arr);

             
            $Info_arr = serialize($unser_arr);
            $data = base64_encode($Info_arr);
            setcookie('StudentInfo',$data,time()+86400,"/");        
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
        <input name="submit" value="Submit" type="submit" > 
        
    </form>
    <ul>
<?php
    if(isset($_COOKIE['StudentInfo'])){
       $decoded = base64_decode($_COOKIE['StudentInfo']);
       $unser_arr = unserialize($decoded);
       print_r($unser_arr);
       foreach($unser_arr as $Key => $Value){
?>
        <li>
<?php
            foreach($Value as $Key2 => $Value2){
?>
               <div> <?php  echo $Value2; ?>  </div>
           <?php } ?>
               <div> <a href="singlePage.php?std_id=<?php echo $Key; ?>">VIEW</a>  </div>
    </li>
<?php
        }
    }
?>
    </ul>
</body>
</html>