<?php

$app = require_once (__DIR__ . '/../../config/app.php');
$db = require_once (__DIR__ . '/../../config/database.php');

echo "<b>----- App -----</b>";
echo "<br>";
var_dump($app['env']);
echo "<br>";
var_dump($app['debug']);
echo "<br>";
var_dump($app['url']);
echo "<br>";
var_dump($app['root']);
echo "<br>";
var_dump($app['charset']);
echo "<br>";
var_dump($app['lang']);

echo "<br>";
echo "<br>";

echo "<b>----- Database -----</b>";
echo "<br>";
var_dump($db['name']);
echo "<br>";
var_dump($db['prefix']);
echo "<br>";
var_dump($db['host']);
echo "<br>";
var_dump($db['port']);
echo "<br>";
var_dump($db['driver']);
echo "<br>";
var_dump($db['username']);
echo "<br>";
var_dump($db['password']);
echo "<br>";
var_dump($db['fetch']);
echo "<br>";
var_dump($db['charset']);
echo "<br>";
var_dump($db['engine']);

echo "<br>";
echo "<br>";

