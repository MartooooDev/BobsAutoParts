<?php
    //Defining a variable for the root foledr

    //defining constants for the price
    define('TIREPRICE', 100.00);
    define('OILPRICE', 10.00);
    define('SPARKPRICE', 4.00);

    $tire_qty           =   $_POST['tire_qty'];
    $oil_qty            =   $_POST['oil_qty'];
    $spark_qty          =   $_POST['spark_qty'];
    $find_option        =   $_POST['find_option'];
    $shipping_address   =   $_POST['shipping_address'];
    $total_value        =   0.00;
    $tax_rate           =   0.10;
    $tire_discount      =   0;
    $oil_discount       =   0;
    $spark_discount     =   0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Bob's Auto Parts - Order Results
    </title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <h1>Bob's Auto Parts</h1>
    <h2>Order results</h2>

    <?php 
        //----------------------------------------------------------------------------------------------------------------
        //Date and time order was processed
        $date= date('H:i jS F');
        echo "<p>Order processed at $date</p>"; 

        //----------------------------------------------------------------------------------------------------------------
        //Verifies if there are any items in the cart
        echo ($tire_qty  ? "<br>$tire_qty tires"          : "<br>No tires added to the cart");
        echo ($oil_qty   ? "<br>$oil_qty bottles of oil"  : "<br>No bottles of oil added to the cart");
        echo ($spark_qty ? "<br>$spark_qty spark plugs"   : "<br>No spark plugs added to the cart");
        echo "<br>";

        //----------------------------------------------------------------------------------------------------------------
        //Calculates the total number of items
        $total_qty   =   $tire_qty + $oil_qty + $spark_qty;

        //----------------------------------------------------------------------------------------------------------------
        //If there are no items in the cart, return a simple message and ends the script
        if($total_qty == 0){
            echo "<font color = red>You didn't order anything</font>";
            exit;
        }

        //----------------------------------------------------------------------------------------------------------------
        //Calculating discount for tires
        if($tire_qty > 0){
            if($tire_qty >= 10 && $tire_qty < 50){
                $tire_discount= 5;
            } elseif ($tire_qty >=50 && $tire_qty <100) {
                $tire_discount= 10;
            } elseif ($tire_qty >=100){
                $tire_discount= 15;
            }
        }

        $tire_discount = TIREPRICE/100*$tire_discount;

        //----------------------------------------------------------------------------------------------------------------
        //Calculating total value, including the tire price with the discount
        $total_value =   ($tire_qty*(TIREPRICE - (TIREPRICE/100*$tire_discount))) + ($oil_qty*OILPRICE) + ($spark_qty*SPARKPRICE);

        //----------------------------------------------------------------------------------------------------------------
        //Prints the total amount of items and the subtotal (price without taxes);
        echo "Items ordered: $total_qty <br> Subtotal: R$".number_format($total_value,2);
        
        
        //----------------------------------------------------------------------------------------------------------------
        //Calculates the total value, adding taxes (10%)
        $total_value=   $total_value*(1+$tax_rate);
        echo ("<p>Total value with taxes included: R$".number_format($total_value,2)."</p>");
        
        //----------------------------------------------------------------------------------------------------------------
        //Identifies the option that the user selected in the option field
        switch($find_option){
            case 'regular_customer':
                echo '<p>Regular customer</p>';
                break;
            
            case 'tv_advertising':
                echo '<p>TV advertising</p>';
                break;

            case 'phone_directory':
                echo '<p>Phone directory</p>';
                break;

            case 'word_of_mouth':
                echo '<p>Word of mouth</p>';
                break;

            default:
                echo 'Uninformed';
                break;
            }
        
        //----------------------------------------------------------------------------------------------------------------
        //Print address
        
        echo "Address for delivery: $shipping_address";

    ?>
    
</body>
</html>

<?php

// what @ does is not letting php show the default error message for the function error when it happens; Doing this to show the custom error message below;
$file= @fopen("DOCUMENT_ROOT/../orders/orders.txt", 'ab');

//Shows a legible message if an error occurs when opening the file
if(!$file){
    echo '<p> Your order could not be processed at this time. Please, try again later. </p>';
    echo '(error opening file orders.txt)';
    exit;
}

$output_string= $date."\n".$tire_qty." tires \t".$oil_qty." oil \t".$spark_qty." spark plugs \t Total Value: \$".$total_value."\t Shipping address:". $shipping_address."\n--------------------------------------------------------------------------------------------------------\n";

fwrite($file, $output_string);
?>