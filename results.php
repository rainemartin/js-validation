<?php
    if ($_SERVER['REQUEST_METHOD']) {
        $errors = array();
        
        //employee id
        if (!isset($_POST['emp-id']) || strlen($_POST['emp-id']) != 10) {
            $errors[] = 'Please enter a valid employee id with 10 characters';
        }
        
        //hours
        if (!isset($_POST['hours']) || !is_numeric($_POST['hours']) ||
            $_POST['hours'] < 1 || $_POST['hours'] > 100) {
            $errors[] = 'Please enter hours between 1-100';
        } 
        
        //payrate
        if (!isset($_POST['payrate']) || !is_numeric($_POST['payrate']) ||
            $_POST['payrate'] < 0) {
            $errors[] = 'Please enter a positive payrate';
        }
        
        //enter data into db...
        
    } else {
        header("location: form.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="">
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <?php
                    if (sizeof($errors) > 0) {
                        echo '<h3>Error!</h3><p>Please fix the following errors:</p>';
                        
                        echo '<ul>';
                        foreach ($errors as $error) {
                            echo "<li>$error</li>";
                        }
                        echo '</ul>';
                    } else {
                        echo '<h3>Success!</h3><p>Thanks for entering a new payroll record!</p>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>