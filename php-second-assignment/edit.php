<?php
    require ('connection.php');

    $to_del_id        = $_GET['edit_id'];
    $query            = "SELECT * FROM info_list WHERE id=".$to_del_id;
    $information_list = mysqli_query($connection,$query);
    $arr_info_list    = mysqli_fetch_assoc($information_list);
?>
<form method="post">
    <label for="first_name">First Name : </label>
    <input type="text" name="first_name" value="<?php echo $arr_info_list['first_name']; ?>">
    <label for="last_name">Last Name : </label>
    <input type="text" name="last_name" value="<?php echo $arr_info_list['last_name']; ?>">
    <label for="age">Age : </label>
    <input type="number" name="age" value="<?php echo $arr_info_list['age']; ?>">
    <label for="email_address">Email Address : </label>
    <input type="email" name="email_address" value="<?php echo $arr_info_list['email_address']; ?>">
    <input type="submit" value="Submit" name="submit">
</form>
<?php
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        $first_name     = $_POST['first_name'];
        $last_name      = $_POST['last_name'];
        $age            = $_POST['age'];
        $email_address  = $_POST['email_address'];

        if(!empty(trim($first_name)) && !empty(trim($last_name)) && !empty(trim($age)) && !empty(trim($email_address))){

            $query = "UPDATE info_list set first_name='$first_name', last_name='$last_name',age=$age,email_address='$email_address' WHERE id=$to_del_id";
            $edited = mysqli_query($connection,$query);
            if(!$edited){
                echo "Values not updated";
            }
            else{
                header('Location: index.php');
            }
        }
    }
?>