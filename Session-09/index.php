<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session- 09</title>
</head>
<body>
    <?php
        $error = [];

        if(isset($_POST['Submit'])){
            if(empty(trim($_POST['Name']))){
                $error[] = "Name is required.";
            }
            if(empty(trim($_POST['FathersName']))){
                $error[] = "Father's Name is required.";
            }
            if(empty(trim($_POST['Gender']))){
                $error[] = "Gender is required.";
            }
            if(empty(trim($_POST['Cities']))){
                $error[] = "City is required.";
            }
            if(!isset($_POST['Skills[]'])){
                $error[] = "Skill(s) are required.";
            }
            if(count($error) > 0){
                foreach($error as $Value)
            ?>
                <span>$Value</span>
            <?php
            }
            else{
                echo $_POST['Name'];
                echo $_POST['FathersName'];
                echo $_POST['Gender'];
                echo $_POST['Cities'];   
                print_r($_POST['Skills[]']);
            }
        }        
    ?>

    <form method="post">
        <input type="text" name="Name">
        <input type="text" name="FathersName">
        <input type="radio" name="Gender" value="Male">Male
        <input type="radio" name="Gender" value="Female">Female
        <select name="Cities">
            <option value="Karachi">Karachi</option>
            <option value="Lahore">Lahore</option>
            <option value="Islamabad">Islamabad</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Khairpur">Khairpur</option>
        </select>
        <input type="checkbox" name="Skills[]" value="Skill One"> Skill One
        <input type="checkbox" name="Skills[]" value="Skill Two"> Skill Two
        <input type="checkbox" name="Skills[]" value="Skill Three"> Skill Three
        <input type="checkbox" name="Skills[]" value="Skill Four"> Skill Four
        <input type="checkbox" name="Skills[]" value="Skill Five"> Skill Five
        <input type="submit" name="Submit" value="Submit">
    </form>
</body>
</html>