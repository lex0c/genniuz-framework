<?php

require_once (__DIR__ . "/../../config/App.php");
require_once (__DIR__ . "/../../config/Database.php");

echo "<b>----- App -----</b>";
echo "<br>";
var_dump(App::get('env'));
echo "<br>";
var_dump(App::get('debug'));
echo "<br>";
var_dump(App::get('url'));
echo "<br>";
var_dump(App::get('root'));
echo "<br>";
var_dump(App::get('charset'));
echo "<br>";
var_dump(App::get('lang'));

echo "<br>";
echo "<br>";

echo "<b>----- Database -----</b>";
echo "<br>";
var_dump(Database::get('name'));
echo "<br>";
var_dump(Database::get('prefix'));
echo "<br>";
var_dump(Database::get('host'));
echo "<br>";
var_dump(Database::get('port'));
echo "<br>";
var_dump(Database::get('driver'));
echo "<br>";
var_dump(Database::get('username'));
echo "<br>";
var_dump(Database::get('password'));
echo "<br>";
var_dump(Database::get('fetch'));
echo "<br>";
var_dump(Database::get('charset'));
echo "<br>";
var_dump(Database::get('engine'));

echo "<br>";
echo "<br>";

