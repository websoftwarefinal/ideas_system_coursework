<?php
// Define routes and their corresponding actions
$routes = [
    '/' => 'resources/views/index.php',
    '/academics' => 'resources/views/academics.php',
    '/about-us' => 'resources/views/about-us.php',
    '/apply' => 'resources/views/apply.php',

    '/home' => 'resources/views/home.php',
    '/admin-controls' => 'resources/views/admin-controls.php',
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
    echo "
        <div style='display: flex; flex-direction: row; height: 100vh; width: 100%; align-items: center; justify-content: center;'>
            <p style='font-size: 25px;'>404 - Page Not Found</p>
        <div>
    ";
}
