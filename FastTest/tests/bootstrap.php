<?php

include_once "../vendor/autoload.php";

$FastTest = new FastTest\FastTest('./config/test_config.php');
$FastTest->start();