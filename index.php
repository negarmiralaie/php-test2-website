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
                case '/php-test-website/admin/add-product':
                    require __DIR__ . '/views/admin/add-product.php';
                    break;
                default:
                    http_response_code(404);
                    require __DIR__ . '/views/404.php';
                    break;
            };

            // $url = '';

            // echo $request;
            // $parseUrl = parse_url($request);

            // if (isset($parsedUrl['path']) && !empty($parsedUrl['path'])) {
            //     echo 'hiii';
            //     // Get the path component
            //     $path = $parsedUrl['path'];
            
            //     // Check if the path contains any script file extensions
            //     $allowedExtensions = ['.php', '.html', '.htm']; // Add more extensions if needed
            //     $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            //     if (in_array($extension, $allowedExtensions)) {
            //         // Invalid URL, contains a script file extension
            //         echo "Invalid URL";
            //         // Handle the error or redirect the user
            //     } else {
            //         // Valid URL, continue processing
            //         echo "Valid URL";
            //         // Proceed with your logic
            //     }
            // } else {
            //     // Invalid URL, no path component
            //     echo "Invalid URLll";
            //     // Handle the error or redirect the user
            // }


?>
    </main>
</body>
</html>