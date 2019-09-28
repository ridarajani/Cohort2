<?php

$set_value = ["Apple", "ognaM", "Banana", "elppA"];
$reverse = "";
foreach($set_value as $key => $value){
    if($key % 2 != 0){
        $reverse_value = strrev($value);
        $reverse .= $reverse_value." ";
    }
    if($key % 2 == 0){
        $reverse .= $value." ";
    }
}
echo substr($reverse,0,-7);