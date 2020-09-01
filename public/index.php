<?php

require_once __DIR__ . '/../src/autoloader.php';

$emailClass = new Email('greatemail@icool.com');
$name = $emailClass->getName();

echo "This is an email -- $emailClass -- from the class -- $name --<br>";

echo 'Hello! I\'m a test app. Please contact my owner to get more information about me by Telegram @palexandrite';