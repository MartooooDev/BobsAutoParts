<?php
    //defining constants for the price
    define('TIREPRICE', 100.00);
    define('OILPRICE', 10.00);
    define('SPARKPRICE', 4.00);

    $tireqty    =   $_POST['tireqty'];
    $oilqty     =   $_POST['oilqty'];
    $sparkqty   =   $_POST['sparkqty']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Bob's Auto Parts - Order Results
    </title>
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order results</h2>

    <?php 
        echo "<p>Order processed at</p>"; 
        echo date('H:i jS F');

        echo "<br>";
        echo $tireqty." tires";
        echo "<br>";
        echo $oilqty." oils";
        echo "<br>";
        echo $sparkqty." sparks";

        echo "<br>";

        $totalqty   =   $tireqty + $oilqty + $sparkqty;
        $totalValue =   ($tireqty*TIREPRICE) + ($oilqty*OILPRICE) + ($sparkqty*SPARKPRICE);

        echo "Quantity: $totalqty <br>";
        echo "Value: $totalValue";
    ?>
    
</body>
</html>