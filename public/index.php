<?php

// Composer Autoloader
if(file_exists(__DIR__.'/../vendor/autoload.php')){
    require_once __DIR__.'/../vendor/autoload.php';
}

// Load View Tempalates


// App Instance
$app = new Slim\Slim(array(
    'templates.path' => '../views',
    'view' => new \Slim\Views\Twig(),
    'debug' => true
));

// Load Routes
if(file_exists('../app/Http/routes.php')){
    require_once __DIR__.'../app/Http/routes.php';
}
$app->get('/', function(){
    echo "Hello.";
});
$app->get('/:name', function($name) use ($app) {
    //echo "Hello Slim.";
    $app->render('layouts/master.php', array('name' => $name));
});

// Run the app!
$app->run();
