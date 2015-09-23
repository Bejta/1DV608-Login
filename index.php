<?php

require_once('model/LoginModel.php');
require_once('controller/LoginController.php');

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');


//CREATE OBJECTS OF THE VIEWS
$m = new \model\LoginModel();

$v = new \view\LoginView($m);
$dtv = new \view\DateTimeView();
$lv = new \view\LayoutView();

$c = new \controller\LoginController($v, $m);

$c->runApp();
$lv->render($m->isLoggedIn(), $v, $dtv);


