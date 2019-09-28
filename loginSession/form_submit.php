<?php
    session_start();

    
    require ('data.php');
    require ('constant.php');
    $error = true;
    
    if (isset($_REQUEST['Submit'])){
        foreach($User_Credentials as $PValue){
            if($PValue['Email']==$_REQUEST['EmailAdd'] && $PValue['Password']==$_REQUEST['Pass']){
                $error = false;
                foreach($User_Information as $UIPValue){
                    if($UIPValue['UserID']== $PValue['UserInformationID']){
                        $_SESSION['EmailAdd']  = $_REQUEST['EmailAdd'];
                        $_SESSION['Pass'] = $_REQUEST['Pass'];
                        $_SESSION['Name'] = $UIPValue['Name'];
                        $_SESSION['Age'] = $UIPValue['Age'];
                        $_SESSION['PhoneNumber'] = $UIPValue['PhoneNumber'];
                        header("Location: user_profile.php");
                    }
                }
            }
            elseif($error){
                header("Location: index.php");
            }
        }
    }
    else{
        header("Location: user_profile.php");
    }
?>
