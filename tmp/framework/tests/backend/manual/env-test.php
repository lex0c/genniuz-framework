<?php

require_once (dirname(dirname(dirname(__DIR__))) . '/../../system/kernel/system.php');

echo "<pre>";
var_dump(env('APP_ENV', 'production'));
echo "<br>";
var_dump(env('APP_DEBUG', false));
echo "<br>";
var_dump(env('APP_URL', 'http://localhost'));
echo "<br>";
var_dump(env('APP_KEY', ''));
echo "<br>";
var_dump(env('APP_CHARSET', 'utf-8'));
echo "<br>";
var_dump(env('APP_LANG', 'pt-br'));

echo "<br>";
echo "<br>";

var_dump(env('DB_NAME', 'genniuz'));
echo "<br>";
var_dump(env('DB_PREFIX', ''));
echo "<br>";
var_dump(env('DB_HOST', 'localhost'));
echo "<br>";
var_dump(env('DB_PORT', '3306'));
echo "<br>";
var_dump(env('DB_DRIVER', 'pdo_mysql'));
echo "<br>";
var_dump(env('DB_USER', 'root'));
echo "<br>";
var_dump(env('DB_PASS', 'root'));
echo "<br>";
var_dump(env('DB_ENGINE', 'innoDB'));

echo "<br>";
echo "<br>";

var_dump(env('MAIL_DRIVER', ''));
echo "<br>";
var_dump(env('MAIL_HOST', ''));
echo "<br>";
var_dump(env('MAIL_PORT', ''));
echo "<br>";
var_dump(env('MAIL_USER', ''));
echo "<br>";
var_dump(env('MAIL_PASS', ''));

echo "<br>";
echo "<br>";

echo "</pre>";

//$email  = 'name@example.com= ';
// $domain = strstr($email, '@');
// if(!strcasecmp($email, strstr($email, '@'))){
// 	echo "string";
// }else{
// 	echo "stringw";
// }
// //echo $domain; // prints @example.com

// $user = strstr($email, '@', true); // PHP 5.3.0
// //echo $user; // prints name

//$email = trim($email);
//var_dump(substr($email, -1) !== '=');