<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php 
    

?>

<body>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" value="" > 
        <label>Email:</label>
        <input type="email" name="email"  value="" >
        <label>Password:</label>
        <input type="password" name="password" >
        <label>Confrm Password:</label>
        <input type="password" name="re_password" >
        <label>Number</label>
        <input type="text" name="number" value="" >
        <input type="submit" value="Submit" name="submit">
    </form>
    <a href="index.php">Login</a>
    <div class="loader" style="position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;text-align: center;background: url('http://themirchievous.consulnet.net/assets/images/loader-2.gif') center no-repeat #fff; opacity:0.25;display:none;">
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   
    <script>
        $("form").on("submit",function(e){

            $(".loader").show();
 
                e.preventDefault();
                var obj = {};
                $(this).find("input").each(function(){
                obj[$(this).attr("name")] = $(this).val(); 
                }) 
                $.ajax({
                    url:"signup_ajax.php",
                    data:obj,
                    type:"POST",
                    dataType:"json",
                    success:function(response){
                        //   response = JSON.parse(response)
                        $(".loader").hide();
                        swal("", response.msg, response.status)
                        .then(function(e){
                            $("form").trigger("reset");
                        });
                        
                    }
                }) 
            
        })
        
    </script>
</body>
</html>