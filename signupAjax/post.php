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
        $user_id    = $_SESSION['user_id'];
    ?>

    <a href="user-profile.php">Profile</a>

    <form class="form_post" method="post">
        <textarea name="my_post" placeholder="What's on your mind, <?php echo $_SESSION['user_name'] ?>?" cols="30" rows="10"></textarea>
        <input type="submit" name="post_submit" value="post">
    </form>
    <?php
        $query = "select * from posts where user_id='$user_id' order by id desc";
        $result_set = mysqli_query($connection,$query);
        $result_posts = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
    ?>
    <table>
        <tbody> 
                <?php
                    foreach($result_posts as $newsfeed)
                    { ?>
                        <tr>
                            <td><?php echo $newsfeed['post']?></td>
                            <td>
                                <a href="edit.php?post_id=<?php echo $newsfeed['id'] ?>">Edit</a>
                            </td>
                            <td>
                                <a href="delete.php?post_id=<?php echo $newsfeed['id'] ?>">Delete</a>
                             </td>
                        </tr>
                <?php
                }
                ?>
    
            </tbody>
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
    
    $("form").on('submit',function(e){

        e.preventDefault();

        formData = {};

            $(this).find('textarea').each(function(){
                formData[$(this).attr('name')] = $(this).val();
            });
 
        $.ajax({
            url:"post-ajax.php",
            type:"POST",
            dataType:"html",
            cache: false,
            data:formData,
            success:function(response){
                     
                    $("table > tbody").prepend(response);

                } 
            
        })
    })
    </script>

    <a href="logout.php">logout</a>
</body>
</html>