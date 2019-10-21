<?php
    require('connection.php');
    $post_to_del_id = $_GET['post_id'];

    $query      = "DELETE FROM posts where id=".$post_to_del_id;
    $result_set = mysqli_query($connection,$query);

    if(!$result_set){
        echo "Error: ".mysqli_error($connection);
    }else{
        header('Location: post.php');
    }
?>