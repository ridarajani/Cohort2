<?php
    session_start();
    require ('connection.php');

    $my_posts   = $_POST['my_post'];
    $user_id    = $_SESSION['user_id'];

    if(!empty(trim($my_posts))){
        $query  = "INSERT INTO `posts`(`post`, `user_id`) VALUES ('$my_posts', '$user_id')";
        $posted = mysqli_query($connection,$query);

        if(!$posted)
        {
            echo "Error:".mysqli_error($connection);
        }
        else{
            $id =  mysqli_insert_id($connection);
            $query = "select post from posts where id =  $id && user_id=".$user_id;
        
            $selected_post = mysqli_query($connection,$query);
            $result_posts = mysqli_fetch_assoc($selected_post);
        
            $html = "<tr>";
            foreach( $result_posts as $post )
            {
                $html .= "<td>".$post."</td>";
                $html .= "<td><a href='edit.php?post_id=$id'>Edit</a></td>";
                $html .= "<td><a href='delete.php?post_id=$id'>Delete</a></td>";
            }
            $html .= "</tr>";
            echo $html;    
        }
    }
?>