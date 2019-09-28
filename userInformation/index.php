<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Displaying User Information</title>
</head>
<body>
    <?php
        $User_Information = [
                                [
                                    "UserID"=>01,
                                    "Name"=>"Maham",
                                    "Age"=>25,
                                    "PhoneNumber"=>"090078601"
                                ],
                                [
                                    "UserID"=>02,
                                    "Name"=>"Aliza",
                                    "Age"=>19,
                                    "PhoneNumber"=>"090078602"
                                ],
                                [
                                    "UserID"=>03,
                                    "Name"=>"Hasan",
                                    "Age"=>32,
                                    "PhoneNumber"=>"090078603"
                                ],
                                [
                                    "UserID"=>04,
                                    "Name"=>"Zain",
                                    "Age"=>28,
                                    "PhoneNumber"=>"090078604"
                                ],
                                [
                                    "UserID"=>05,
                                    "Name"=>"Sumbul",
                                    "Age"=>65,
                                    "PhoneNumber"=>"090078605"
                                ]
                            ];
        $User_Credentials=[
                            [
                                "VisitingUser"=>01,
                                "Email"=>"thisisme@gmail.com",
                                "Password"=>"thisisme",
                                "UserInformationID"=>05
                            ],
                            [
                                "VisitingUser"=>02,
                                "Email"=>"thisismeagain@gmail.com",
                                "Password"=>"thisismeagain",
                                "UserInformationID"=>04
                            ],
                            [
                                "VisitingUser"=>03,
                                "Email"=>"testingid@gmail.com",
                                "Password"=>"testingid",
                                "UserInformationID"=>03     
                            ],
                            [
                                "VisitingUser"=>04,
                                "Email"=>"testingidone@gmail.com",
                                "Password"=>"testingidone",
                                "UserInformationID"=>02
                            ],
                            [
                                "VisitingUser"=>05,
                                "Email"=>"testingidtwo@gmail.com",
                                "Password"=>"testingidtwo",
                                "UserInformationID"=>01
                            ]
                        ];
        $Check = 0;
        $display_form = True;
        if (isset($_POST['Submit'])){
            $display_form = False;
            foreach($User_Credentials as $PValue){
                if($PValue['Email']==$_POST['EmailAdd'] && $PValue['Password']==$_POST['Pass']){
                    $Check = 1;
                    foreach($User_Information as $UIPValue){
                        if($UIPValue['UserID']== $PValue['UserInformationID']){
                            echo $UIPValue['Name']."<br>";
                            echo $UIPValue['Age']."<br>";
                            echo $UIPValue['PhoneNumber']."<br>";
                        }
                    }
                }
            }
            if ($Check == 0){
                $display_form = true;
                echo "Incorrect Email or Password";
            }
        }
        if($display_form){
    ?>
    <form method="post">
        <div>
            <label for="UserEmail">Email Address</label>
            <input type="email" name="EmailAdd">
        </div>
        <div>
            <label for="Password">Password</label>
            <input type="password" name="Pass">
        </div>
        <div>
        <input type="submit" name="Submit" value="Submit">
        </div>
    </form>
    <?php
    }
    ?>
</body>
</html>