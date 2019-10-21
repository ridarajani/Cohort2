<?php
    session_start();
    require ('connection.php');
    $response          = [];

    if(isset($_POST['submit_login'])){
        $email_Address = $_POST['email_address_login'];
        $password      = $_POST['password_login'];

        $query         = "SELECT * FROM users WHERE email_address = '$email_Address'"; 
        $result_set    = mysqli_query($connection,$query);

            if(mysqli_num_rows($result_set) > 0){
                $user_details = mysqli_fetch_assoc($result_set);
                if(password_verify($password,$user_details['password'])){
                    $_SESSION['user_id'] = $user_details['id'];
                    $response['error'] = false;
                }
                else{
                    $response['error'] = true;
                    $response['msg'] = "Incorrect Password.";    
                }
            }else{
                $response['error'] = true;
                $response = "Incorrect Email Address.";
            }
        echo json_encode($response);
    }