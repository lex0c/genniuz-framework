<?php

require_once (__DIR__ . '/../encryption/src/Disguise.php');

$disguise = new Disguise();
var_dump($disguise->illumin($disguise->obscure('Testando hoje pq simmm')));
