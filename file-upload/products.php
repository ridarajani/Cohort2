<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Product </h1>  

<?php 
    require("connection_db.php");
    if(isset($_POST['submit']))
    {    
        $product_name  = $_POST['product_name'];
        $price          = $_POST['price'];
        $color          = $_POST['color'];

        $ext        = ["png","jpg","jpeg","bmp"];
        $name       = $_FILES["image"]["name"];
        $size       = $_FILES["image"]["size"];
        $tmp_name   = $_FILES["image"]["tmp_name"];
        $file_ext   = explode(".",$name);
        $dir        = './uploads/';

        $file_ext   = end($file_ext);
        $file_ext   = strtolower($file_ext);

        // var_dump($_FILES); die;
        
        if(in_array($file_ext,$ext)){

            if( 1024 >=  ( $size / 1024 )  )
            {
                if(!file_exists($dir.$name)){
                    $__ = move_uploaded_file($tmp_name,$dir.$name);

                    if(!empty( trim($product_name)) && !empty( trim($price))){
                        $query = "insert into products(product_name,price,color,uploaded_file) values('$product_name',$price,'$color','$name')";
                        $result_set = mysqli_query($con,$query);
                        if(!$result_set)
                        {
                            echo "Error : ".mysqli_error($con);
                        }
                        else{
                            echo "Product Inserted.";
                        }
                    }
                        
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

                    if(!empty( trim($product_name)) && !empty( trim($price))){
                        $query = "insert into products(product_name,price,color,uploaded_file) values('$product_name',$price,'$color','$new_name')";
                        $result_set = mysqli_query($con,$query);
                            if(!$result_set)
                            {
                                echo "Error : ".mysqli_error($con);
                            }
                            else{
                                echo "Product Inserted.";
                            }
                    }

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
    
    <form method="post" enctype="multipart/form-data">
        <label>Product:</label>
        <input type="text" name="product_name" required>
        <label>Color:</label>
        <input type="text" name="color" required>
        <label>Price:</label>
        <input type="text" name="price" required>
        <input type="file" name="image" >
        <input type="submit" name="submit" value="Add Product">
    </form>

    <?php 

    if(isset($_POST['search']))
    {

        $PriceCondition         = "" ;
        $NameCondition          = "" ;
        $ColorCondition         = "" ;
        $Count                  = 0 ;
        $WHERE                  = "" ;
        $AND                    = "";
        
        
        if(!empty(trim($_POST['name'])))
        {
            if($Count)
            {
                $AND = " AND ";
            }
            $NameCondition  = $AND." product_name LIKE  '%" .$_POST['name']. "%' ";
            $Count++;
        } 
        if(!empty(trim($_POST['pro_price'])))
        {
            if($Count)
            {
                $AND = " AND ";
            }
            $PriceCondition  = $AND." price = ".$_POST['pro_price'];
            $Count++;
        } 
        if(!empty(trim($_POST['pro_color'])))
        {
            if($Count)
            {
                $AND = " AND ";
            }
            $ColorCondition         = $AND." color  LIKE  '%" .$_POST['pro_color']. "%' ";
            $Count++;
        } 
        if($Count)
        {
            $WHERE = " WHERE ";
        }
        $query = " select * from products ".$WHERE.$NameCondition.$PriceCondition.$ColorCondition; 
      //  var_dump( $query);die;
    }
    else
    {
        $query = " select * from products "; 
        
    }
    
    $result_set = mysqli_query($con,$query);
    $products = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
        

    ?>
     <h1> Product Listing </h1>  
    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot style="display: table-header-group !important;">
                <tr>
                    <th>Search</th>
                    <th><input placeholder="Product Name" name="name" value="<?php echo isset($_POST['name'])  ? $_POST['name'] : ""  ?>" ></th>
                    <th><input placeholder="Product Color" name="pro_color" value="<?php echo isset($_POST['pro_color'])  ? $_POST['pro_color'] : ""  ?>"></th>
                    <th><input placeholder="Product Price" name="pro_price" value="<?php echo isset($_POST['pro_price'])  ? $_POST['pro_price'] : ""  ?>"></th>
                    <th><input  type="submit" name="search" value="Search"></th>
                </tr>
            </tfoot>
            <tbody> 
                <?php 
                    foreach($products as $product)
                    {   ?>
                        <tr>
                            <td><?php echo $product['id']?></td>
                            <td><?php echo $product['product_name']?></td>
                            <td><?php echo $product['color']?></td>
                            <td><?php echo $product['price']?></td>
                            <td><img src="<?php echo $dir.$product['uploaded_file'] ?>" alt="<?php echo $product['uploaded_file'] ?>"></td>
                        </tr>

                <?php   }
                ?>

            </tbody>
        </table>
    </form>
</body>
</html>