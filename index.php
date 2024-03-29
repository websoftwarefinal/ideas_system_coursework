<?php
// Define routes and their corresponding actions
$routes = [
    '/' => 'resources/views/index.php',
    '/home' => 'resources/views/home.php',
    '/academics' => 'resources/views/academics.php',
    '/about-us' => 'resources/views/about-us.php',
    '/apply' => 'resources/views/apply.php'
];

// Get the requested URL path
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);

// Check if the requested path exists in the defined routes
if (isset($routes[$path])) {
    // Include the corresponding file
    include $routes[$path];
} else {
    // Handle 404 - Not Found
    http_response_code(404);
    echo '404 - Not Found';
}
