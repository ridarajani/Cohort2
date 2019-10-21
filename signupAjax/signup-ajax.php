<?php
    require ("connection.php");
    $response = [];

    if(isset($_POST['submit']))
    {

        $full_name      = $_POST['full_name'];
        $email_address  = $_POST['email_address'];
        $password       = $_POST['password'];
        $re_password    = $_POST['re_password'];
        $phone_number   = $_POST['phone_number'];

        if(!empty(trim($full_name)) && !empty(trim($email_address)) && !empty(trim($password)))
        {
            if($password == $re_password){
                $hash_password = password_hash($password,PASSWORD_DEFAULT);
                $query = "INSERT INTO users (full_name, email_address, password, phone_number) VALUES ('$full_name','$email_address','$hash_password','$phone_number')";
                $result_set = mysqli_query($connection,$query);
                if($result_set)
                {
                    $response["status"]     = "success";
                    $response["msg"]        = "Signup Successful";
                }else
                {
                    $response["status"]     = "error";
                    $response["msg"]        = "error :".mysqli_error($connection);
                }
            }else
            {
                $response["status"]     = "error";
                $response["msg"]        =  "Your passwords don't match.";
            }
        }
        else{
            $response["status"]     = "error";
            $response["msg"]        =  "Please submit your form.";
        } 
    echo json_encode($response);
    }