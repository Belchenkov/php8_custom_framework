<?php

if (PHP_MAJOR_VERSION < 8) {
    die('Project require php version >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';

new \wfm\App();

var_dump(\wfm\App::$app->getProperties());