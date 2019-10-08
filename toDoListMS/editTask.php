<?php
    require ('connection.php');
    $Key = $_GET['EditKey'];
    $query = "SELECT * FROM ToDoList";
    $result_set = mysqli_query($connection,$query);
    $taskList = mysqli_fetch_all($result_set,MYSQLI_ASSOC);
    $toUse = $taskList[$Key]['Task'];
?>
<form method="post">
    <input type="text" name="editedTask" value="<?php echo $toUse ?>">
    <input type="submit" name="submit-edit" value="Edit Task">
</form>
<?php
    if(isset($_REQUEST['submit-edit'])){
        $idToChange = $_GET['toEdit'];
        $taskChanged = $_REQUEST['editedTask']; 
        $query = "update ToDoList set Task='$taskChanged' where id=".$idToChange;

        $taskEdit = mysqli_query($connection,$query);

        if(!$taskEdit){
            echo "Error No:".mysqli_connect_errno($taskEdit);
            echo "Error:".mysqli_connect_error($taskEdit);
            die;
        }
        else{
            header("Location: index.php");
        }
    }
?>