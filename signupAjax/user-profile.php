<?php
    session_start();

    require ('connection.php');

    $query = "select * from users where id=".$_SESSION['user_id'];
    $user_details = mysqli_query($connection,$query);

    $user_info = mysqli_fetch_assoc($user_details);
    $_SESSION['user_name'] = $user_info['full_name'];
    echo "Name: ".$_SESSION['user_name'].'<br>';
    echo "Email Address: ".$user_info['email_address'].'<br>';
    echo "Phone Number: ".$user_info['phone_number'].'<br>';
    ?>

    <a href="post.php">Newsfeed</a>