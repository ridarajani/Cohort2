<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation Of Form</title>
</head>
<body>
    <?php
    require ('constantList.php');

    $error = [];
    
        if(isset($_POST['Submit'])){
            if(empty(trim($_POST['Name']))){
                $error['N_ERROR'] = N_ERROR;
            }
            if(empty(trim($_POST['FatherName']))){
                $error['FN_ERROR'] = FN_ERROR;
            }
            if(empty($_POST['Gender'])){
                $error['GENDER_ERROR'] = GENDER_ERROR;
            }
            if(empty($_POST['Cities'])){
                $error['CITY_ERROR'] = CITY_ERROR;
            }
            if(!isset($_POST['Skill'])){
                $error['SKILL_ERROR'] = SKILL_ERROR;
            }
            if (count($error) == 0){
                echo SUCCESS;
            }
        }
    ?>
    <form method="post">
        <div>
            <label for="Name">Name</label>
            <input type="text" value="<?php echo !empty($error) ? (isset($_POST['Name']) ? $_POST['Name'] : '')   : '';
            ?>" name="Name">
            <span><?php echo array_key_exists('N_ERROR', $error)  ? $error['N_ERROR'] : '' ?></span>
        </div>
        <div>
            <label for="Father's Name">Father's Name</label>
            <input type="text" value="<?php echo !empty($error) ? (isset($_POST['FatherName']) ? $_POST['FatherName'] : '') : ''; ?>" name="FatherName">
            <span><?php echo array_key_exists('FN_ERROR', $error)  ? $error['FN_ERROR'] : '' ?></span>
        </div>
        <div>
            <label for="Gender">Gender</label>
            <input type="radio" value="Male" name="Gender" <?php echo !empty($error) ? (isset($_POST['Gender']) && $_POST['Gender']=="Male" ? "checked" : "") : ""; ?>>Male
            <input type="radio" value="Female" name="Gender" <?php echo !empty($error) ? (isset($_POST['Gender']) && $_POST['Gender']=="Female" ? "checked" : "") : ""; ?>>Female
            <span><?php echo array_key_exists('GENDER_ERROR', $error) ? $error['GENDER_ERROR'] : '' ?></span>
        </div>
        <div>
        <select name="Cities">
                <option value="" <?php echo !empty($error) ? (isset($_POST['Cities']) && $_POST['Cities']=="" ? "selected" : "") : ""; ?>>Select your City</option>
                <option value="Lahore" <?php echo !empty($error) ? (isset($_POST['Cities']) && $_POST['Cities']=="Lahore" ? "selected" : "") : ""; ?>>Lahore</option>
                <option value="Islamabad" <?php echo !empty($error) ? (isset($_POST['Cities']) && $_POST['Cities']=="Islamabad" ? "selected" : "") : ""; ?>>Islamabad</option>
                <option value="Karachi" <?php echo !empty($error) ? (isset($_POST['Cities']) && $_POST['Cities']=="Karachi" ?  "selected" : "") : ""; ?>>Karachi</option>
            </select>
            <span><?php echo array_key_exists('CITY_ERROR', $error) ? $error['CITY_ERROR'] : '' ?></span>
        </div>
        <div>
            <label for="Skills">Skills:</label>
            <input type="checkbox" value="SkillOne" Name="Skill[]" <?php echo !empty($error) ? (isset($_POST['Skill']) && in_array("SkillOne", $_POST['Skill']) ?  "checked" : '') : "" ; ?>>Skill One
            <input type="checkbox" value="SkillTwo" Name="Skill[]" <?php echo !empty($error) ? (isset($_POST['Skill']) && in_array("SkillTwo", $_POST['Skill']) ? "checked" : "") : ""; ?>>Skill Two
            <input type="checkbox" value="SkillThree" Name="Skill[]" <?php echo !empty($error) ? (isset($_POST['Skill']) && in_array("SkillThree", $_POST['Skill']) ? "checked" : "") : ""; ?>>Skill Three
            <input type="checkbox" value="SkillFour" Name="Skill[]" <?php echo !empty($error) ? (isset($_POST['Skill']) && in_array("SkillFour", $_POST['Skill']) ? "checked" : "") : ""; ?>>Skill Four
            <span><?php echo array_key_exists('SKILL_ERROR', $error) ? $error['SKILL_ERROR'] : '' ?></span>
        </div>
        <div>
            <input type="submit" value="Submit" name="Submit">
        </div>
    </form>
    <p>
        Prepared by: Taha Fatima
    </p>
</body>
</html>