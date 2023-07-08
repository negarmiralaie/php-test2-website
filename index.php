<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <main>
        <h1>Welcome</h1>
        <?php
            ini_set('display_errors', 1);
            error_reporting(-1);             
            
            // CONNECT TO DB           
            include(__DIR__ . '/connect.php');
        ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>