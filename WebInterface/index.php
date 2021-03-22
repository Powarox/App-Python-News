<?php

namespace WebInterface;

session_start();

require_once('App/Control.php');
require_once('App/View.php');

$view = new App\View();
$control = new App\Control($view);
$control->execute();
