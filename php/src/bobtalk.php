<?php
require 'Bob.php';

echo 'Hello, I\'m Bob.' . PHP_EOL;

$bob = new Bob;

while (true) {
	$sentence = readline();
    echo $bob->reply($sentence) . PHP_EOL;
}

