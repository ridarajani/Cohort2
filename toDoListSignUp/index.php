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
        require ('connection.php');
        $error = false;

        if(isset($_REQUEST['Submit'])){
            $EmailAddress = $_REQUEST['EmailAddress'];
            $Password     = $_REQUEST['Password'];

            $query = "SELECT id FROM users WHERE emailAddress = '$EmailAddress' AND user_password = '$Password'" ; 
            $select_credentials = mysqli_query($connection,$query);

            if(mysqli_num_rows($select_credentials) > 0){
                $userNum= mysqli_fetch_assoc($select_credentials);
                $_Session['user_id'] = $userNum['id'];
            }
            else{
                echo "Incorrect Credentials";
                $error = true;
            }
        }
        if(!isset($_Session['user_id']) && empty($_Session['user_id'])){
    ?>
        <form method="post">
        <div>
            <label for="EmailAddress">Email Address</label>
        </div>
        <div>
            <input type="email" name="EmailAddress" value="<?php echo $error ? $_REQUEST['EmailAddress'] : ""; ?>">
        </div>
        <div>
            <label for="Password">Password</label>
        </div>
        <div>
            <input type="password" name="Password">
        </div>
        <div>
            <input type="submit" name="Submit" value="Sign In">
        </div>
        </form>
        <a href="signup.php">Register</a>
    <?php
        }
        else{
            header('Location: products.php');
        }
    ?>
</body>
</html>