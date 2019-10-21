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
            session_start();
            require ('connection.php');

            $post_to_edit_id = $_GET['post_id'];

            $query           = "SELECT post FROM posts where id=$post_to_edit_id";
            $result_post     = mysqli_query($connection,$query);

            $to_edit         = mysqli_fetch_assoc($result_post);

            ?>
                <form method="post">
                    <textarea name="edited_post" placeholder="<?php echo $to_edit['post'] ?>" cols="30" rows="10"></textarea>
                    <input type="submit" name="edited" value="Edit">
                </form>
            <?php
            if(isset($_POST['edited'])){
                $post_edit = $_POST['edited_post'];
                $query      = "UPDATE `posts` SET `post`='$post_edit' where id=$post_to_edit_id" ;
                $result_set = mysqli_query($connection,$query);

                if(!$result_set){
                    echo "Error: ".mysqli_error($connection);
                }else{
                    header('Location: post.php');
                }
            }
        ?>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $('textarea').on('click', function(e){
                $(this).val = '';
            })
        </script> -->
    </body>
</html>