<?php
include('redirect.php');

header('HTTP/1.1 404 Not Found');
header('Status: 404 Not Found');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page not found</title>
</head>
<body>
    <h1>Page not found</h1>
    <p>صفحه موردنظر یافت نشد.</p>
    <p><a href="/">Please return to the home page&hellip;</a></p>
</body>
</html>
