<?php
    require ('connection.php');

        $first_name              = $_POST['s_first_name'];
        $last_name               = $_POST['s_last_name'];
        $age                     = $_POST['s_age'];
        $email_address           = $_POST['s_email_address'];
        $first_name_condition    = "" ;
        $last_name_condition     = "" ;
        $age_condition           = "" ;
        $email_address_condition = "" ;
        $Checker                 = 0 ;
        $WHERE                   = "" ;
        $AND                     = "";

        if(!empty(trim($first_name))){
            if($Checker){
                $AND = " AND ";
            }
            $first_name_condition = $AND."first_name LIKE '%$first_name%'";
            $Checker++;
        }
        if(!empty(trim($last_name))){
            if($Checker){
                $AND = " AND ";
            }
            $last_name_condition = $AND."last_name LIKE '%$last_name%'";
            $Checker++;
        }
        if(!empty(trim($age))){
            if($Checker){
                $AND = " AND ";
            }
            $age_condition = $AND."age LIKE '%$age%'";
            $Checker++;
        }
        if(!empty(trim($email_address))){
            if($Checker){
                $AND = " AND ";
            }
            $email_address_condition = $AND."email_address LIKE '%$email_address%'";
            $Checker++;
        }
        if($Checker)
        {
            $WHERE = " WHERE ";
        }
        $query     = "SELECT id,first_name,last_name,age,email_address FROM info_list ".$WHERE.$first_name_condition.$last_name_condition.$age_condition.$email_address_condition;
        $data_set = mysqli_query($connection,$query);
        $num_rows = mysqli_num_rows($data_set);

        if($num_rows > 0){
            $records = mysqli_fetch_all($data_set,MYSQLI_ASSOC);
            $html = "<tr>";
            foreach ($records as $value) {
                foreach($value as $details){
                    $html .= "<td>".$details."</td>";
                }
            $html .= "</tr>";
            }
            echo $html;
        }

        // $query        = " select id from info_list ".$WHERE.$first_name_condition.$last_name_condition.$age_condition.$email_address_condition;
        // $searched_ids = mysqli_query($connection,$query);
        // $searched     = mysqli_fetch_all($searched_ids,MYSQLI_ASSOC);

        // $id_arr = [];
        
        // foreach($searched as $Value){
        //     foreach($Value as $id_set){
        //         $id_arr[] .= $id_set;
        //     }
        // }

        // $query      = "SELECT id FROM info_list";
        // $all_ids    = mysqli_query($connection,$query);
        // $everything = mysqli_fetch_all($all_ids,MYSQLI_ASSOC);

        // $id_arr_all = [];
        
        // foreach($everything as $Value){
        //     foreach($Value as $id_set){
        //         $id_arr_all[] .= $id_set;
        //     }
        // }

        // $values_to_remove = array_diff($id_arr_all,$id_arr);
        // echo json_encode($values_to_remove);
        
        
