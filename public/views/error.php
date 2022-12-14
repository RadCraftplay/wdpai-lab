<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">
    <link rel="Stylesheet" type="text/css" href="public/css/base.css"/>
    <link rel="icon" href="public/img/svg/favicon.svg" type="image/svg+xml">
</head>
<body>
<?php include 'common/navbar.php'?>
<div id="container">
    <h1>Error</h1>
    <p>
        <?php
        if (isset($message)) {
            echo $message;
        } else {
            echo 'Unknown error occured';
        }
        ?>
    </p>
    <a href="/">Go back to the main page</a>
</div>
</body>
</html>