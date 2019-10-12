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
            $fullName        = $_REQUEST['FullName'];
            $Password        = $_REQUEST['Password'];
            $confirmPassword = $_REQUEST['confirmPassword'];
            $PhoneNumber     = $_REQUEST['PhoneNumber'];
            $EmailAddress    = $_REQUEST['EmailAddress'];

            if(!empty(trim($fullName)) && !empty(trim($Password)) && !empty(trim($confirmPassword)) && !empty(trim($EmailAddress))){
                if($Password == $confirmPassword){
                    $query = "INSERT INTO users(Full_name,user_password,phone_number,emailAddress) VALUES('$fullName','$Password','$PhoneNumber','$EmailAddress')";

                    $data_insert = mysqli_query($connection,$query);

                    if($data_insert){
                        echo "Sign Up Successful";
                    }
                    else{
                        echo "Error = ".mysqli_error($data_insert);
                        $error = true;
                    }
                }
                else{
                    echo "Your passwords don't match";
                    $error = true;
                }
            }
            else{
                echo "The form is not filled";
                $error = t;
            }
        }
    ?>
    <h1>Sign Up</h1>
    <form method="post">
        <div>
            <label for="FullName">Full Name</label>
        </div>
        <div>
            <input type="text" name="FullName" value="<?php echo $error ? $_REQUEST['FullName'] : ""; ?>">
        </div>
        <div>
            <label for="Password">Password</label>
        </div>
        <div>
            <input type="password" name="Password">
        </div>
        <div>
            <label for="ConfirmingPassword" >Re-Type Password</label>
        </div>
        <div>
            <input type="password" name="confirmPassword">
        </div>
        <div>
            <label for="PhoneNumber">Phone Number</label>
        </div>
        <div>
            <input type="number" name="PhoneNumber" value="<?php echo $error ? $_REQUEST['PhoneNumber'] : ""; ?>">
        </div>
        <div>
            <label for="EmailAddress">Email Address</label>
        </div>
        <div>
            <input type="email" name="EmailAddress" value="<?php echo $error ? $_REQUEST['EmailAddress'] : ""; ?>">
        </div>
        <div>
            <input type="submit" value="Submit" name="Submit">
        </div>
    </form>
    <a href="index.php">Sign In</a>
</body>
</html>