<?php
if(isset($_COOKIE['StudentInfo'])){

    $decoded = base64_decode($_COOKIE['StudentInfo']);
    $unser_arr = unserialize($decoded);
    $std_id = $_GET['std_id'];

    foreach($unser_arr[$std_id] as $val){
        echo $val."<br>";
    }
}