<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main>
        <h1>Welcome</h1>
        <?php
           error_reporting(E_ALL);
           ini_set('display_errors', 1);
            
            // CONNECT TO DB           
            include(__DIR__ . '/connect.php');
            $request = $_SERVER['REQUEST_URI'];
            // echo $request;

            switch ($request) {
                case '/' :
                    // require __DIR__ . '/views/home.php';
                    break;
                case '/php-test-website/about' :
                    require __DIR__ . '/views/about.php';
                    break;
                default:
                    http_response_code(404);
                    require __DIR__ . '/views/404.php';
                    break;
            };

            // if (strpos($url, 'categoryId') !== false) {

            // }

            // if (strpos($url, 'filterName') !== false) {
                
            // }

?>
    </main>
</body>
</html>