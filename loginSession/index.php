<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Session</title>
</head>
<body>
    <?php
        require ('constant.php');
        if(!isset($_SESSION['EmailAdd']) && !isset($_SESSION['Pass'])){
    ?>
    <form method="post" action="form_submit.php">
        <div>
            <label for="EmailAddress">Email Address:</label>
            <input type="text" name="EmailAdd">
        </div>
        <div>
        <label for="Password">Password:</label>
        <input type="password" name="Pass">
        </div>
        <div>
            <input type="submit" name="Submit" value="Submit">
        </div>
        <p>
            Prepared by: Taha Fatima
        </p>
    </form>
    <?php
        }
        elseif(isset($_SESSION['EmailAdd']) && isset($_SESSION['Pass'])){
            header("Location: form_submit.php");
        }
    ?>
</body>
</html>