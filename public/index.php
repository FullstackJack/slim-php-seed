<?php

// Composer Autoloader
if(file_exists(__DIR__.'/../vendor/autoload.php')){
    require_once __DIR__.'/../vendor/autoload.php';
}

// Load Environment Variables
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// App Instance
$app = new Slim\Slim(array(
    'templates.path' => '../views',
    'view' => new \Slim\Views\Twig(),
));

// Only invoked if mode is "production"
$app->configureMode('production', function () use ($app) {
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

// Only invoked if mode is "development"
$app->configureMode('development', function () use ($app) {
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

// Load Routes
if(file_exists(__DIR__.'/../config/routes.php')){
    require_once __DIR__.'/../config/routes.php';
}

// Run the app!
$app->run();
