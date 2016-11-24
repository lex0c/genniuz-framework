<?php

require_once (__DIR__ . '/../../public/index.php');
use \Resources\Helpers\Slug;

$str = 'Testando o slugin PHP.php';
echo "<br>";
echo $str;

echo "<br>";
echo "<br>";

echo Slug::convert($str)[0];

echo "<br>";
echo "<br>";

print_r(Slug::convert($str, true));

echo "<br>";
echo "<br>";

echo Slug::convert($str, true)[0];
echo "<br>";
echo Slug::convert($str, true)[1];

echo "<br>";
echo "<br>";

