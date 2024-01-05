<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ages = array('Bob' => 20 , 'Peter' => 35);

        echo "1 - ".$ages['Bob']."<br>";
        echo "2 - ".$ages['Peter']."<br>";

        $ages['Lek'] = 18;
        $ages['Ying'] = 42;

        echo "3 - ". ($ages['Lek'] + $ages['Peter']) ."<br>";

        $ages['Peter'] = $ages['Bob'] - $ages['Lek'];
        echo "4 - ".$ages['Peter']."<br>";
    ?>
</body>
</html>
