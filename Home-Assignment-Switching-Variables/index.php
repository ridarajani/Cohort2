<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home-Assignment-Switching Variables</title>
</head>
<body>
    <header></header>
    <main>
        <?php
            $a = 25;
            $b = 95;

            $a += $b;
            $b = $a - $b;
            $a -= $b;

            echo " a = $a, b = $b";
        ?>
    </main>
    <footer></footer>
</body>
</html>