<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
</head>
<body>
    <?php
        $error = [];
        if(isset($_POST['Submit'])){
            if(empty(trim($_POST['Name']))){
                $error[] = "Name is required";
            }
            if(empty(trim($_POST['FatherName']))){
                $error[] = "Father's Name is required";
            }
            if(empty($_POST['Gender'])){
                $error[] = "Gender is required";
            }
            if(empty(trim($_POST['Cities']))){
                $error[] = "City is required";
            }
            if(!isset($_POST['Skill'])){
                $error[] = "Skills are required";
            }
            if(count($error) > 0){
                foreach($error as $Value){
    ?>
        <p>
    <?php
                echo $Value;
    ?>
        </p>
    <?php
                }
            }
            else{
                echo $_POST['Name'];
                echo $_POST['FatherName'];
                echo $_POST['Gender'];
                echo $_POST['Cities'];
                print_r($_POST['Skill']);
            }
        }
    ?>
    <form method="post">
        <div>
            <label for="Name">Name</label>
            <input type="text" name="Name">
        </div>
        <div>
            <label for="FathersName">Father's Name</label>
            <input type="text" name="FatherName">
        </div>
        <div>
            <label for="Gender">Gender</label>
            <input type="radio" value="Male" name="Gender">Male
            <input type="radio" value="Female" name="Gender">Female
        </div>
        <div>
            <select name="Cities">
                <option value="">Select your City</option>
                <option value="Lahore">Lahore</option>
                <option value="Islamabad">Islamabad</option>
                <option value="Karachi">Karachi</option>
            </select>
        </div>
        <div>
            <label for="Skills">Skills:</label>
            <input type="checkbox" value="SkillOne" Name="Skill[]">Skill One
            <input type="checkbox" value="SkillTwo" Name="Skill[]">Skill Two
            <input type="checkbox" value="SkillThree" Name="Skill[]">Skill Three
            <input type="checkbox" value="SkillFour" Name="Skill[]">Skill Four
        </div>
        <div>
            <input type="submit" value="Submit" name="Submit">
        </div>
    </form>
</body>
</html>