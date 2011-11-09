<?php

require __DIR__.'/../Slim/Slim.php';
require __DIR__.'/../Mustache.php';

$projects = array(
    array(
        'id' => 1,
        'name' => 'SimDAL',
        'description' => 'SimDAL Description',
	'more' => '...'
    ),
    array(
        'id' => 2,
        'name' => 'Jquery Descriptify',
        'description' => 'Descriptify Description',
	'more' => '...'
    ),
    array(
        'id' => 3,
        'name' => 'UBelt-GrayLog2-Logger',
        'description' => 'Graylog2 Logger for Zend_Log',
	'more' => '...'
    ),
    array(
        'id' => 4,
        'name' => 'WatchMen',
        'description' => 'Desktop app to keep track of movies you have watched on the file system',
	'more' => '...'
    )
);

$app = new Slim();

$index = function() {
    $template = file_get_contents('templates/index.tmpl');
    echo $template;
};

$app->get('/', $index);

$app->get('/projects', $index);

$app->get('/project/:id', $index);

$app->get('/models/projects', function() use($projects) {
    echo json_encode($projects);
});

$app->get('/models/projects/:id', function($id) use ($projects) {
    echo json_encode($projects[$id-1]);
});

$app->run();
