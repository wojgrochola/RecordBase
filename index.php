<?php
require 'vendor/autoload.php';
include 'model/class.db.php';



$app = new \Slim\Slim(array(
 'debug' => true,
 'templates.path' => './templates'
));



// ... for HybridAuth
$config["hybridauth"]  = array(
  "base_url" => $app->request()->getUrl() . $app->request()->getRootUri() . "/callback",
  "providers" => array (
  "Google" => array (
    "enabled" => true,
    "keys" => array ("id" => "500084173129-u5vlfegn6n7uq0nj6s0pa5ivf1ekldu2.apps.googleusercontent.com", "secret" => "WpTSVIRT55GV_pLs85xAM0TV" ),
    "scope" => "https://www.googleapis.com/auth/userinfo.email"
)));

// start session
session_start();
	

$db = db::getDB();


// initialize HybridAuth client
$auth = new Hybrid_Auth($config["hybridauth"]);

// index page handlers
$app->get('/',  function () use ($app) {
  $app->redirect($app->urlFor('index'));
});


		   
$app->get('/index', function () use ($app) {
	$sql = 'SELECT * FROM event';
	$result = db::$db->query($sql)->fetchAll();
 $app->render('main.tpl.php', array('events' => $result));
  

})->name('index');
// hook to add request URI path as template variable


$app->hook('slim.before.dispatch', function() use ($app) {
 $app->view()->appendData(array(
 'baseUri' => $app->request()->getRootUri()
 ));
});

// addhandlers
$app->get('/save(/:id)', 'authenticate', function($id = NULL) use ($app) {
	if ($id == NULL) {
		$app->render('form.tpl.php');
	} else {
		$sql = 'SELECT * FROM event WHERE id = ' . $id . ';';
	$result = db::$db->query($sql)->fetch();
	
	$app->render('form.tpl.php', array('events' => $result));
	}
 
});


$app->post('/save', function () use ($app, $db) {
 $id = trim(strip_tags($app->request->params('id')));
 $date = trim(strip_tags($app->request->params('date')));
 $place = trim(strip_tags($app->request->params('place')));
 $title = trim(strip_tags($app->request->params('title')));
 $author = trim(strip_tags($app->request->params('author')));
 $details = trim(strip_tags($app->request->params('details')));
 // echo $date;
 // echo $place;
 // echo $title;
 // echo $author;
 // echo $details;
 if ($id == NULL) {
 	 db::addRecord($place, $date, $title, $author, $details);
 } else {
 	 db::updateRecord($id, $place, $date, $title, $author, $details);
 }

 $app->redirect($app->urlFor('index'));
});

$app->get('/delete/:id', 'authenticate', function ($id) use($app){
	db::deleteRecord($id);
	$app->redirect($app->urlFor('index'));
});


$app->get('/login', function () use ($app, $auth) {
  echo "JU MAS BI LOGIN";
  $app->render('login.tpl.php');
})->name('login');

// login handler
$app->get('/login2', function () use ($app, $auth) {
  $google = $auth->authenticate("Google");
  $currentUser = $google->getUserProfile();
  $_SESSION['uid'] = $currentUser->email;
  $app->redirect($app->urlFor('index'));

})->name('login2');

// logout handler
$app->get('/logout', 'authenticate', function () use ($app, $auth) {
  $auth->logoutAllProviders();
  session_destroy();
  $app->render('logout.tpl.php');
});
// OAuth callback handler
$app->get('/callback', function () {
  Hybrid_Endpoint::process();
});


// hook to add request URI path as template variable
$app->hook('slim.before.dispatch', function() use ($app) {
  $app->view()->appendData(array(
    'baseUri' => $app->request()->getRootUri()
  ));
}); 

$app->run();


// middleware to restrict access to authenticated users only
function authenticate () {
  $app = \Slim\Slim::getInstance();
  if (!isset($_SESSION['uid'])) {
    $app->redirect($app->urlFor('login'));
  }
}