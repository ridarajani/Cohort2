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
    ?>
    <form class="sub_form" method="post">
        <label for="first_name">First Name : </label>
        <input type="text" name="first_name" required>
        <label for="last_name">Last Name : </label>
        <input type="text" name="last_name" required>
        <label for="age">Age : </label>
        <input type="number" name="age" required>
        <label for="email_address">Email Address : </label>
        <input type="email" name="email_address" required>
        <label for="password">Password : </label>
        <input type="password" name="password" required>
        <input type="submit" value="Submit" name="submit">
    </form>

    <h2>Information List</h2>
    <?php
        $query            = "SELECT * FROM info_list";
        $information_list = mysqli_query($connection,$query);
        $arr_info_list    = mysqli_fetch_all($information_list,MYSQLI_ASSOC);
    ?>
    <form class="search_form" method="post">
        <label>Search</label>
        <input class="to_search" placeholder="First Name" name="s_first_name" value="<?php echo isset($_POST['s_first_name'])  ? $_POST['s_first_name'] : ""  ?>" >
        <input class="to_search" placeholder="Last Name" name="s_last_name" value="<?php echo isset($_POST['s_last_name'])  ? $_POST['s_last_name'] : ""  ?>">
        <input class="to_search" placeholder="Age" name="s_age" value="<?php echo isset($_POST['s_age'])  ? $_POST['s_age'] : ""  ?>">
        <input class="to_search" placeholder="Email Address" name="s_email_address" value="<?php echo isset($_POST['s_email_address'])  ? $_POST['s_email_address'] : ""  ?>">
    </form>
    <table class="show_table" style="display : none;">
        <thead>
            <tr>
                <td>S.No.</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Age</td>
                <td>Email Address</td>
            </tr>
        </thead>
        <tbody class="to_append">

        </tbody>
    </table>

    <table class="remove_table">
        <thead>
            <tr>
                <th></th>
                <th>S.No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="insert_append">
            <?php
                foreach($arr_info_list as $info_list){
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" id="<?php echo $info_list['id']; ?>">
                        </td>
                        <td>
                            <?php echo $info_list['id']; ?>
                        </td>
                        <td>
                            <?php echo $info_list['first_name']; ?>
                        </td>
                        <td>
                            <?php echo $info_list['last_name']; ?>
                        </td>
                        <td>
                            <?php echo $info_list['age']; ?>
                        </td>
                        <td>
                            <?php echo $info_list['email_address']; ?>
                        </td>
                        <td>
                            <a href="edit.php?edit_id=<?php echo $info_list['id']; ?>" >Edit</a>
                            <a href="javascript:void(0)" class="to_del" id="<?php echo $info_list['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <a href="javascript:void(0)" class="to_del_all">Delete</a>

    <script src="assets/js/jquery-3.4.1.min.js"></script>

    <script>    
        $(".sub_form").on("submit",function(e){
            e.preventDefault();
            client_data = {};
            $(this).find("input").each(function(){
                client_data[$(this).attr('name')]= $(this).val();
            });

            $.ajax({
                url: "value-insertion-ajax.php",
                type: "post",
                dataType: "html",
                data: client_data,
                success: function(response){
                    $(".insert_append").append(response);
                    // .then(function(e){
                    //         $("form").trigger("reset");
                    //     });
                }
            })
        })
        $(document).ready(function(){
            $(document).on("click",".to_del",function(){
                var del_id = $(this).attr('id');
                $.ajax({
                    type:'POST',
                    url:'delete-ajax.php',
                    data: { delete_id : del_id },
                    success:function(response){
                        if(response == 1){
                            $("#"+del_id).closest('tr').fadeOut(800,function(){
	                            $(this).remove();
	                    });
                        }
                    }
                });
            });

            $(document).on("click",".to_del_all",function(){
                delete_data = [];
                $("table").find("input[type='checkbox']").each(function(){
                    if($(this).is(":checked")){
                        delete_data.push($(this).attr('id'));

                        $.ajax({
                            type:'POST',
                            url:'delete-multiple-ajax.php',
                            data: { delete_ids : delete_data },
                            success:function(response){
                                if(response == 1){
                                    $.each(delete_data, function( i,l ){
                                        $("#"+l).closest('tr').fadeOut(800,function(){
	                                        $(this).remove();
	                                    });
                                    });
                                };
                            }
                        });

                    }
                })
            })
        })
                $('.to_search').keyup(function(e){
                e.preventDefault();
                if(e.keyCode == 13) {
                    search_data = {};

                    $(".search_form").find("input").each(function(){
                        search_data[$(this).attr('name')]= $(this).val();
                    });

                    $.ajax({
                        url: "search-ajax.php",
                        type: "post",
                        dataType: "html",
                        data: search_data,
                        success: function(response){
                            $('.show_table').css('display', 'block');
                            $(".to_append").html(response);
                            $(".to_search").val("");
                            $(".to_del_all").hide();
                            $(".remove_table").hide();
                            }
                    }); 
                }

                        // $.each(response, function( i,l ){
                        //     $("#"+l).closest('tr').fadeOut(800,function(){
                        //         $(this).hide();
                        //     });
                        // $("#"+l).closest('tr').fadeOut(800,function(){
                        //     $(this).hide();
                        // });
                })
    </script>
</body>
</html>