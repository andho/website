<?php

require __DIR__.'/../Slim/Slim.php';
require __DIR__.'/../Mustache.php';
require __DIR__.'/../MustacheTemplate.php';

function is_ajax() {
  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    return true;
  }

  return false;
}

function is_javascript_enabled() {
  $browser = get_browser();
  if ($browser->javascript == 1) {
    return true;
  }

  return false;
}

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

$nav = array('menuitems'=>array(
    array('label'=>'Home', 'link' => ''),
	array('label'=>'Projects', 'link'=>'projects'),
	array('label'=>'Blog', 'link'=>'http://blog.andho.com', 'class'=>'outer')
));

$mustache = new MustacheTemplate('templates', '.tmpl');

$app = new Slim();

$app->setName('andho');

$app->notFound(function() use($app, $mustache, $nav) {
    $nav = $mustache->render('nav', $nav);

    $app->response()->status(404);
    $content = $mustache->render('notfound');
    $twitter = $mustache->render('twitter-feed');

    $view = $mustache->render('index', array(), array('nav'=>$nav, 'content'=>$content, 'twitter-feed'=>$twitter));

    echo $view;
});

$app->get('/', function () use($app, $mustache, $nav) {
    $nav = $mustache->render('nav', $nav);

    $home = $mustache->render('home');
    $twitter = $mustache->render('twitter-feed');

    $view = $mustache->render('index', array(), array('nav'=>$nav, 'content'=>$home, 'twitter-feed'=>$twitter));

    echo $view;
});

$app->get('/projects', function() use ($app, $mustache, $projects, $nav) {
    $nav = $mustache->render('nav', $nav);

    $project_item = $mustache->getTemplate('project');

    $projects_tmpl = $mustache->render('projects', array('projects'=>$projects), array('projectitem'=>$project_item));

    $twitter = $mustache->render('twitter-feed');

    $view = $mustache->render('index', array(), array('nav'=>$nav, 'content'=>$projects_tmpl, 'twitter-feed'=>$twitter));

    echo $view;
});

$app->get('/project/:id', function($id) use ($app, $mustache, $projects, $nav) {
    $nav = $mustache->render('nav', $nav);

    if (!isset($projects[$id])) {
    	$app->notFound();
    }
							     
    $project = $mustache->render('project-details', $projects[$id]);
							     
    $twitter = $mustache->render('twitter-feed');

    $view = $mustache->render('index', array(), array('nav'=>$nav, 'content'=>$project, 'twitter-feed'=>$twitter));

    echo $view;
});

$app->get('/models/projects', function() use($projects) {
    echo json_encode($projects);
});

$app->get('/models/projects/:id', function($id) use ($projects) {
    echo json_encode($projects[$id-1]);
});

$app->run();
