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
        session_start();
        require ('connection.php');

        if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
    ?>
    <form class="form_login" method="post">
        <span name="Error"></span>
        <div>
            <label for="email_address_login">Email Adress</label>
        </div>
        <div>
            <input type="email" name="email_address_login">
        </div>
        <div>
            <label for="password_login">Password</label>
        </div>
        <div>
            <input type="text" name="password_login">
        </div>
        <div>
            <input type="submit" name="submit_login" value="Log In">
        </div>
    </form>
    
    <form class="form_signup" method="post">
        <div>
            <label for="full_name">Full Name</label>
        </div>
        <div>
            <input type="text" name="full_name">
        </div>
        <div>
            <label for="email_address">Email Address</label>
        </div>
        <div>
            <input type="email" name="email_address">
        </div>
        <div>
            <label for="password">Password</label>
        </div>
        <div>
            <input type="password" name="password">
        </div>
        <div>
            <label for="re_password">Confirm Password</label>
        </div>
        <div>
            <input type="password" name="re_password">
        </div>
        <div>
            <label for="phone_number">Phone Number</label>
        </div>
        <div>
            <input type="number" name="phone_number">
        </div>
        <div>
            <input type="submit" name="submit" value="Sign Up">
        </div>
    </form>
    <?php
        }
    else{
        header('Location: user-profile.php');
    }
    ?>
    <!-- <div class="loader" style="position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;text-align: center;background: url('http://themirchievous.consulnet.net/assets/images/loader-2.gif') center no-repeat #fff; opacity:0.25;display:none;">
    </div> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(".form_signup").on('submit',function(e){

            e.preventDefault();

            var formData = {};

            $(this).find("input").each(function(i,v){ 
            formData[$(this).attr("name")] = $(this).val();
            }) ;

            $.ajax({
                url:"signup-ajax.php",
                type:"POST",
                dataType:"json",
                data:formData,
                success:function(response){
                    swal("", response.msg, response.status).then(function(e){
                        $("form").trigger("reset");
                    });  
                }
            });
        });

        $(".form_login").on('submit',function(e){

            e.preventDefault();

            var formData = {};

            $(this).find("input").each(function(i,v){ 
            formData[$(this).attr("name")] = $(this).val();
            }) ;

            $.ajax({
                url:"login-ajax.php",
                type:"POST",
                dataType:"json",
                data:formData,
                success:function(response){
                    if(response.error){
                        $("span").text(response);  
                    }
                    else{
                        window.location.href = 'user-profile.php';
                    }
                }
            });
            });
    </script>
</body>
</html>