<?php

// The Autoloader
require_once __DIR__ . '/../autoloader.php';
// Configs
$config = require_once __DIR__ . '/../app/bootstrap/config.php';
// Load The Router
(new \Src\Application($config))->run();