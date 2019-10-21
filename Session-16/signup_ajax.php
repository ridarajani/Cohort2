<?php 

require("connection_db.php");
$response = [];
$error          = false;

if(isset($_POST['submit']))
{
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $re_password    = $_POST['re_password'];
    $number         = $_POST['number'];
 
    if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($password))  )
    {
        if($password == $re_password)
        {
            $query = "INSERT INTO users(full_name, email_address, password, phone_number) VALUES ('$name','$email','$password', $number)";

            $result_set = mysqli_query($con,$query);

            if( $result_set)
            {
                $response["status"]     = "success";
                $response["msg"]        = "Signup SuccessFully";
            }else
            {
                $response["status"]     = "error";
                $response["msg"]        = "ERROR :".mysqli_error($con);
                
                
            }
        }else
        {
            $response["status"]     = "error";
            $response["msg"]        =  "Check your password.";
     
            
        }

    }
    else{
        
        $response["status"]     = "error";
        $response["msg"]        =  "Please submit your form.";
 
      
    } 
echo json_encode($response);

}

?>