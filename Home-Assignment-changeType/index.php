<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Assignment- ChangeType</title>
</head>
<body>
    <?php
        $foo = "100foo";
        $bar = "200bar";

        settype($foo, "integer");
        settype($bar, "integer");

        $c = $foo + $bar;
        echo $c;
    ?>
</body>
</html>