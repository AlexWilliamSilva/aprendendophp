<?php
    include_once 'includes/register.inc.php';
    include_once 'includes/functions.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login: Registration Form</title>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <link rel="stylesheet" href="styles/main.css"/>
</head>
<body>
    <!-- caso ocorra um erro nas variaveis POST, quando não estiverem definidas ou seu o script de registro causar erro -->
    <h1>Register with us</h1>

    <?php
        if(!empty($error_msg)) {
            echo $error_msg;
        }
    ?>

    <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</body>
</html>