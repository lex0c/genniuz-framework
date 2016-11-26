<?php

require_once (__DIR__ . '/../encryption/src/HashGenerator.php');


$data = "Hello World! 1 abcdefghijklmnopq";
$tag = "<?php phpinfo(); ?>"; //Safety against scripts injections.

$hash1 = new HashGenerator();
$hash2 = new HashGenerator();
$hash3 = new HashGenerator();

$encryptedData1 = $hash1->encode($data);
$encryptedData2 = $hash2->encode($data);

echo "<br>";
var_dump($encryptedData1);
echo "<br>";

// // //$x = explode(strlen($encryptedData1)/2, $encryptedData1);
// // //var_dump($x[0]);
// // var_dump(str_replace("int()", "", substr($encryptedData1, 0, (strlen($encryptedData1)/2)-strlen($encryptedData1))));
// // echo "<br>";
// // var_dump(str_replace("int()", "", substr($encryptedData1, (strlen($encryptedData1)/2)-strlen($encryptedData1)), strlen($encryptedData1)));
// echo $encryptedData1;
// echo "<br>";
// $q =  base64_encode(str_replace("int()", "", substr($encryptedData1, (strlen($encryptedData1)/2)-strlen($encryptedData1)), strlen($encryptedData1))).base64_encode(str_replace("int()", "", substr($encryptedData1, 0, (strlen($encryptedData1)/2)-strlen($encryptedData1))));

// echo "<br>";
// echo base64_decode($q);




// echo "<br>";
// var_dump($encryptedData1);
// //echo "<br>";
// //var_dump($encryptedData2);
// //echo "<br>";

$output = $hash3->isEquals("Hello World! 1 abcdefghijklmnopq", $encryptedData2);
var_dump($output);
// //echo "<br>";

