<?php
    //defining constants for the price
    define('TIREPRICE', 100.00);
    define('OILPRICE', 10.00);
    define('SPARKPRICE', 4.00);

    $tireqty        =   $_POST['tireqty'];
    $oilqty         =   $_POST['oilqty'];
    $sparkqty       =   $_POST['sparkqty'];
    $totalValue     =   0.00;
    $taxrate        =   0.10;
    $tireDiscount   =   0;
    $oilDiscount    =   0;
    $sparkDiscount  =   0;

    switch($find){
        
    }

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
        echo "<p>Order processed at ".date('H:i jS F')."</p>"; 


        echo ($tireqty ? "<br>$tireqty tires" : "<br>No tires added to the cart");
        echo ($oilqty? "<br>$oilqty bottles of oil" : "<br>No bottles of oil added to the cart");
        echo ($sparkqty? "<br>$sparkqty spark plugs" : "<br>No spark plugs added to the cart");

        echo "<br>";

        $totalqty   =   $tireqty + $oilqty + $sparkqty;

        if($tireqty >= 10 && $tireqty < 50){
            $tireDiscount= 5;
        } elseif ($tireqty >=50 && $tireqty <100) {
            $tireDiscount= 10;
        } elseif ($tireqty >=100){
            $tireDiscount= 15;
        }

        $tireDiscount = TIREPRICE/100*$tireDiscount;

        $totalValue =   ($tireqty*(TIREPRICE - (TIREPRICE/100*$tireDiscount))) + ($oilqty*OILPRICE) + ($sparkqty*SPARKPRICE);

        echo ($totalqty ? "Items ordered: $totalqty <br> Subtotal: R$".number_format($totalValue,2) :  "<font color = red> No items in the cart </font>");
        
        $totalValue=   $totalValue*(1+$taxrate);
        echo ("<p>Total value with taxes included: R$".number_format($totalValue,2)."</p>");

        
    ?>
    
</body>
</html>