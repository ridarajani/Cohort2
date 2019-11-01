<?php
    require ('connection.php');

    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        $first_name    = $_POST['first_name'];
        $last_name     = $_POST['last_name'];
        $age           = $_POST['age'];
        $email_address = $_POST['email_address'];
        $password      = $_POST['password'];

        if(!empty(trim($first_name)) && !empty(trim($last_name)) && !empty(trim($age)) && !empty(trim($email_address)) && !empty(trim($password))){
            $query = "SELECT * FROM info_list WHERE email_address='$email_address'";
            $existing_add = mysqli_query($connection,$query);
            $num_rows = mysqli_num_rows($existing_add);

            if($num_rows > 0){
                echo "Email Address exists";
            }else{
                $password_hash = password_hash($password,PASSWORD_DEFAULT);
    
                $query = "INSERT INTO info_list (first_name,last_name,age,email_address,password) VALUES ('$first_name','$last_name',$age,'$email_address','$password_hash')";
                $inserted = mysqli_query($connection,$query);
    
                if(!$inserted){
                    echo "Values not inserted";
                }
                else{
                    $last_id = mysqli_insert_id($connection);
                    $query   = "SELECT id,first_name,last_name,age,email_address FROM info_list WHERE id=$last_id";
                    $info_received = mysqli_query($connection,$query);
                    $last_record = mysqli_fetch_assoc($info_received);
    
                    $html  = "<tr>";
                    $html .= "<td><input type='checkbox'></td>";
                    foreach($last_record as $record){
                        $html .= "<td>$record</td>";
                    }
                    $html .= "<td><a href=''>Edit</a><a href=''>Delete</a></td>";
                    $html .= "</tr>";
                    echo $html;
                }
            }
        }
    }