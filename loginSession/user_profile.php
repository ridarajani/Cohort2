<?php
    session_start();
    echo $_SESSION['Name']."<br>";
    echo $_SESSION['Age']."<br>";
    echo $_SESSION['PhoneNumber']."<br>";
?>
<a href="logout.php">Logout</a>