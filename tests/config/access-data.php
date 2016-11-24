<?php

require_once (__DIR__ . '/../../public/index.php');
use \System\VariablesEnvironment as Env;

echo "<b>----- App -----</b>";
echo "<br>";
var_dump(Env::app('env'));
echo "<br>";
var_dump(Env::app('debug'));
echo "<br>";
var_dump(Env::app('url'));
echo "<br>";
var_dump(Env::app('pubdir'));
echo "<br>";
var_dump(Env::app('root'));
echo "<br>";
var_dump(Env::app('ds'));
echo "<br>";
var_dump(Env::app('charset'));
echo "<br>";
var_dump(Env::app('lang'));
echo "<br>";

echo "<br>";
echo "<br>";

echo "<b>----- Database -----</b>";
echo "<br>";
var_dump(Env::db('name'));
echo "<br>";
var_dump(Env::db('prefix'));
echo "<br>";
var_dump(Env::db('host'));
echo "<br>";
var_dump(Env::db('port'));
echo "<br>";
var_dump(Env::db('driver'));
echo "<br>";
var_dump(Env::db('username'));
echo "<br>";
var_dump(Env::db('password'));
echo "<br>";
var_dump(Env::db('fetch'));
echo "<br>";
var_dump(Env::db('charset'));
echo "<br>";
var_dump(Env::db('engine'));
echo "<br>";

echo "<br>";
echo "<br>";

echo "<b>----- Aliases -----</b>";
echo "<br>";
var_dump(Env::alias('modules'));
echo "<br>";
var_dump(Env::alias('autoload'));
echo "<br>";

echo "<br>";
echo "<br>";