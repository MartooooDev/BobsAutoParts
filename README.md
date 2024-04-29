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
                <td><input type=text name="tire_qty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td>Oil</td>
                <td><input type=text name="oil_qty" size="3" maxlength="3"></td>
            </tr>
            <tr>
                <td>Spark Plugs</td>
                <td><input type=text name="spark_qty" size="3" maxlength="3"></td>
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
	$tire_qty;			//abreviated
	$_POST['tire_qty'];		//medium
	$HTTP_POST_VARS['tire_qty';	//long

?>
```

In the HTML form, we can specify the method the variable will be stored in, if its in `$_POST` or in `$_GET`. Bein stored in any of them, the variable can always be recovered via the superglobal `$_REQUEST`.

For this project, i'm using the medium format, as suggested by the author of the book.

We then can print the inputs in a legible format, setting values to the variables on the file and using them later.

```php
<?php
	$tire_qty	=	$_POST['tire_qty'];
	$oil_qty	=	$_POST['oil_qty'];
	$spark_qty	=	$_POST['spark_qty'];
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
        echo $tire_qty." tires";
        echo "<br>";
        echo $oil_qty." bottles of oil";
        echo "<br>";
        echo $spark_qty." spark plugs";
    ?>
  
</body>
</html>
```

### Storing and recovering data from files

Although it's not much used, as we intend to use a database for this, we'll learn how to write and read files with data from our system.

For doing this, we'll use the `fopen()` function, witch lets us open files to read, write or read and write. This functions expects two or three parameters, but we'll normally use only two.

```php
//this first line is needed if your 'register_globals' option is disabled. It is a good practice to put it on the start of the script
$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT']
$file= fopen("$DOCUMENT_ROOT/../orders/orders.txt", w);
```

The first parameter is the path to the file you want to open. Here, the variable `$DOCUMENT_ROOT` refers to the father directory of the directory we are working on, and that's why the "`/../`" are for.

Just like accessing forms data have different ways to be attributed to variables, the `$DOCUMENT_ROOT` also has a variety of ways to be called for using server's predefined variables.

```php
<?php
	$DOCUMENT_ROOT;
	$_SERVER['DOCUMENT_ROOT'];
	$HTTP_SERVER_VARS['DOCUMENT_ROOT'];
?>
```

If any file is indicated, the system will create the file so it can be accessed.

Now, I'm using windows for this, so when indicating a file path, I need to add an backslash ( \ ), so the command identifies it as a backslash, as it is a special character.

```php
$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
$file= fopen("DOCUMENT_ROOT\\..\\orders\\orders.txt", 'w');
```

The second parameter for the fopen() method is the mode. The modes will all be listed below:

| Mode symbol | Description                                                                                                                                                                     |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| r           | Read mode - Opens the file for read only, starting by the beggining of the file                                                                                                 |
| r+          | Read plus mode - Opens the file for reading and writing, starting by the beggining ofthe file                                                                                   |
| w           | Writing mode - Opens the file for writing. If the file exists, it deletes it. If it doesn't exists, it tries to create it                                                       |
| w+          | Writing plus mode - Opens the file for reading and writing. If the file exists, it deletes it. If it doesn't exists, it tries to create it                                      |
| x           | Careful writing mode - Opens the file of writing and reading. If the file exists, it won't be openede, fopen() will return False and PHP will show a warning                    |
| a           | Adding mode - Opens the file only for adding content (writing), starting by the end of the existing content. If there's no file or content, it tries to create it.              |
| a+          | Adding plus mode - Opens the file for adding content (writing) and reading, starting by the end of the existing content. If there's no file or content, it tries to create it. |
| b           | Binary mode - Used only together with one of the other modes. Used if you want to diferenciate binary and text files. Windows's systems doesn't diferenciate them.              |
| t           | Texto mode - Used only together with one of the other modes. Avaliable only on Windos.                                                                                          |

The third and optional parameter is a boolean that allows the system to search for the `include_path `of the file. If this is set true, you don't need to set the directory name or path, but before doing it, you need to set the `include_path `parameter as 1 in the PHP config file.

```php
$file= fopen('orders.txt', 'ab', true);
```


### Error handling

When opening a file, its possible that you're trying to open a file that you have no permission to access. If this happens, PHP will return an error to your web page.

It's important to keep your files on secure folders inside your system, so no one access sensible data.




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
