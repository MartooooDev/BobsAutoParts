# BobsAutoParts

Example Project from a PHP book to learn PHP x SQL

Book: PHP and SQL Web Development

---

## Learning proccess

### The HTML

In HTML, we can use the `<form>` tag to create a form for the user to input info. This form can be then used by php scripts to process the data entered so the website can be useful.

We'll start with the following form:

```html
<!-- File: index.html -->
<form action="processorder.php" method=post>
        <table>
            <tr>
                <td width="150">item</td>
                <td width="150">quantity</td>
            </tr>
            <tr>
                <td>Tires</td>
                <td><input type=text name="tireqty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td>Oil</td>
                <td><input type=text name="oilqty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td>Spark Plugs</td>
                <td><input type=text name="sparkqty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit Order"></td>
            </tr>
        </table>
    </form>
```

As seen, all the inputs have the atribute "name", that will be useful for using this data on PHP scripts.

In the form tag, we have two important details: the action and the method.

* action refers to the process file. This is the file where all the inputs will be directed for processing, allowing for them to be used as variables by the developers.
* method refers to the HTTP method, being POST (to store), GET (to retrieve) and REQUEST.


### Form variables

To access HTML forms via PHP variables, we use the 'name' atribute defined in the HTML fields. There are three ways to acces these these informations and store them in variables:

```php
<?php
	//file: 'process.php'
	$tireqty;			//abreviated
	$_POST['tireqty'];		//medium
	$HTTP_POST_VARS['tireqty';	//long

?>
```

In the HTML form, we can specify the method the variable will be stored in, if its in `$_POST` or in `$_GET`. Bein stored in any of them, the variable can always be recovered via the superglobal `$_REQUEST`.

For this project, i'm using the medium format, as suggested by the author of the book.

We then can print the inputs in a legible format, setting values to the variables on the file and using them later.

```php
<?php
	$tireqty	=	$_POST['tireqty'];
	$oilqty		=	$_POST['oilqty'];
	$sparkqty	=	$_POST['sparkqty'];
?>

<html lang="en">
<head>
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
        echo $oilqty." bottles of oil";
        echo "<br>";
        echo $sparkqty." spark plugs";
    ?>
  
</body>
</html>
```


---

### Super global variables

* $GLOBALS- array of all the global variables
* $_SERVER- array of all server environment variables
* $_GET- array of all the variables passed with the method GET
* $_POST- array of all the variables passed with the method POST
* $_COOKIE- array of cookies variables
* $_FILES- array of variables related to file upload
* $_ENV- array of environment variables
* $_REQUEST- array of all user input variables
* $_SESSION- array of session variables.
