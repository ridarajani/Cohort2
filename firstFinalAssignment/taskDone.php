<?php
    session_start();
    
    if(isset($_COOKIE['taskList'])){
        $_SESSION['taskCompleted'] = true;
        $taskDone = $_GET['taskCompleted'];
        
        if(!isset($_COOKIE['TaskComplete']) && empty($_COOKIE['TaskComplete'])){
            $ArrOfCompletedTasks[] = $taskDone;

            $serializedTaskList = serialize($ArrOfCompletedTasks);
            $encodedTaskList = base64_encode($serializedTaskList);
            
            setcookie('TaskComplete',$encodedTaskList,time()+86400*30,"/");
        }
        else{
            $decodedTaskList = base64_decode($_COOKIE['TaskComplete']);
            $UnserializedTaskList = unserialize($decodedTaskList);
            $UnserializedTaskList[] = $taskDone;

            $serializedTaskList = serialize($UnserializedTaskList);
            $encodedTaskList = base64_encode($serializedTaskList);

            setcookie('TaskComplete',$encodedTaskList,time()+86400*30,"/");
        }

        header('Location: toDoList.php');
    }
?>