<?php
// Define routes and their corresponding actions
$routes = [
    '/' => './resources/views/index.php',
    '/academics' => './resources/views/academics.php',
    '/about-us' => './resources/views/about-us.php',
    '/apply' => './resources/views/apply.php',
    '/home' => './resources/views/home.php',
    '/admin-controls' => './resources/views/admin-controls.php',
    '/create-account' => './resources/views/create-account.php',
    '/ideas' => './resources/views/ideas.php',
    '/idea-details' => './resources/views/idea_details.php',
    '/add-idea' => './resources/views/add_idea.php',
    '/qa-coordinator' => './resources/views/qaco_Dashboard.php',
    '/qa-manager-controls' => './resources/views/qamanager_Controls.php',
    '/qa-manager-statistics' => './resources/views/qamanager_Statistics.php'
];

// Get the requested URL path
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);

// Check if the requested path exists in the defined routes
if (isset($routes[$path])) {
    require_once __DIR__ . '/Helpers/helpers.php';
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
