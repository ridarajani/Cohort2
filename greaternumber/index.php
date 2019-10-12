<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <script type="text/javascript">
        function checkGreater(numOne,numTwo,numThree){
            if(numOne > numTwo && numOne > numThree){
                console.log(numOne+" is greater than "+numTwo " and "+numThree);
            }
            else if(numTwo > numOne && numTwo > numThree){
                console.log(numTwo+" is greater than "+numOne " and "+numThree);
            }
            else if(numThree > numOne && numThree > numTwo){
                console.log(numThree+" is greater than "+numOne " and "+numTwo);
            }
        }

        checkGreater(12,16,45);
    </script>
</body>
</html>