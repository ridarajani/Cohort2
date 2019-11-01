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
        if(isset($_POST['submit']))
        {
            
            $ext        = ["png","jpg","jpeg","bmp"];
            $name       = $_FILES["image"]["name"];
            $size       = $_FILES["image"]["size"];
            $tmp_name   = $_FILES["image"]["tmp_name"];
            $file_ext   = explode(".",$name);
            $dir        = './uploads/';

            $file_ext   = end($file_ext);
            $file_ext   = strtolower($file_ext);
            
            if(in_array($file_ext,$ext)){

                if( 500 >=  ( $size / 1024 )  )
                {
                    if(!file_exists($dir.$name)){
                        $__ = move_uploaded_file($tmp_name,$dir.$name);
                         
                        if(!$__){
                            echo "Your file wasn't uploaded";
                        }
                    }
                    else{
                        $explode_name   = explode(".",$name);
                        $explode_name   = array_splice($explode_name,0,-1);
                        $imploded_name  = implode("_",$explode_name);
                        $new_name       = $imploded_name.time().".".$file_ext;
                        
                        $__ = move_uploaded_file($tmp_name,$dir.$new_name);

                        if(!$__){
                            echo "Your file wasn't uploaded";
                        }
                    }
                }else{

                    echo "File size is not valid";

                }

            }
            else
            {
                echo "Extension is not valid";
            }

        }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" >
        <input type="submit" name="submit" value="Upload Image">
    </form>
</body>
</html>