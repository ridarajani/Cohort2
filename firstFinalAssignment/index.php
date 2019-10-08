<?php 
    session_start();
?>
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
        require ('constant.php');
    ?>
    <h1>
        Sign In
    </h1>
    <?php
        if(!isset($_SESSION['Name']) && empty($_SESSION['Name'])){
    ?>
    <span><?php if(isset($_SESSION['Error'])){ echo ERROR_MESSAGE;}elseif(isset($_SESSION['NotLogged'])){ echo NOTLOGGED; } ?></span>
    <form method="post" action="form_submit.php">
        <div>
            <label for="EmailAddress">Email Address :</label>
            <input type="email" name="EmailAdd">
        </div>
        <div>
            <label for="Password">Password :</label>
            <input type="password" name="Pass">
        </div>
        <div>
            <input type="submit" name="Submit" value="Sign In">
        </div>
    </form>
    <?php 
        }
        else{
            header('Location: toDoList.php');
        }
    ?>
</body>
</html>