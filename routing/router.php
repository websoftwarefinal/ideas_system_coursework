<?php
// router.php

// Define routes
$routes = [
    '/' => 'home.php',
    '/about' => 'about.php',
    // Add more routes as needed
];

// Get requested URL
$requestUri = $_SERVER['REQUEST_URI'];

// Find corresponding route
if (isset($routes[$requestUri])) {
    $viewFile = __DIR__ . '/resources/views/' . $routes[$requestUri];
    if (file_exists($viewFile)) {
        // Load and render the view
        require $viewFile;
    } else {
        // Handle 404 Not Found
        http_response_code(404);
        echo '404 Not Found';
    }
} else {
    // Handle other routes or 404 Not Found
    http_response_code(404);
    echo '404 Not Found';
}
