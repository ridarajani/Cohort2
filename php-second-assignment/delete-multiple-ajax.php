<?php 
require "connection.php";

$delete_ids = $_POST['delete_ids'];

foreach($delete_ids as $id){
  $query = "DELETE FROM info_list WHERE id=".$id; 
  mysqli_query($connection,$query);
}
echo 1;