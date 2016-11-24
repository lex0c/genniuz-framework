<?php

require_once (__DIR__ . '/../../bootstrap/App.php');
App::run();

echo "<b>----- App -----</b>";
echo "<br>";
var_dump(App::get('env'));
echo "<br>";
var_dump(App::get('debug'));
echo "<br>";
var_dump(App::get('url'));
echo "<br>";
var_dump(App::get('pubdir'));
echo "<br>";
var_dump(App::get('root'));
echo "<br>";
var_dump(App::get('ds'));
echo "<br>";
var_dump(App::get('charset'));
echo "<br>";
var_dump(App::get('lang'));
echo "<br>";

echo "<br>";
echo "<br>";

echo "<b>----- Database -----</b>";
echo "<br>";
var_dump(App::db('name'));
echo "<br>";
var_dump(App::db('prefix'));
echo "<br>";
var_dump(App::db('host'));
echo "<br>";
var_dump(App::db('port'));
echo "<br>";
var_dump(App::db('driver'));
echo "<br>";
var_dump(App::db('username'));
echo "<br>";
var_dump(App::db('password'));
echo "<br>";
var_dump(App::db('fetch'));
echo "<br>";
var_dump(App::db('charset'));
echo "<br>";
var_dump(App::db('engine'));
echo "<br>";

echo "<br>";
echo "<br>";

echo "<b>----- Aliases -----</b>";
echo "<br>";
var_dump(App::alias('modules'));
echo "<br>";
var_dump(App::alias('autoload'));
echo "<br>";
var_dump(App::alias('interfaces/Loader'));
echo "<br>";

echo "<br>";
echo "<br>";