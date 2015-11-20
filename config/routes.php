<?php

$app->get('/', function(){
    echo "Hello.";
});

$app->get('/:name', function($name) use ($app) {
    //echo "Hello Slim.";
    $app->render('layouts/master.php', array('name' => $name));
});
