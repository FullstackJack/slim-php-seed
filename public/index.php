<?php

// Composer Autoloader
if(file_exists(__DIR__.'/../vendor/autoload.php')){
    require_once __DIR__.'/../vendor/autoload.php';
}

// App Instance
$app = new Slim\Slim(array(
    'templates.path' => '../views',
    'view' => new \Slim\Views\Twig(),
    'debug' => true
));

// Load Routes
if(file_exists(__DIR__.'/../config/routes.php')){
    require_once __DIR__.'/../config/routes.php';
}

// Run the app!
$app->run();
