<?php

$_GET = $_GET ?? [];
$_POST = $_POST ?? [];

$in = array_merge($_GET, $_POST);

include_once "ske_Controller/".$_GET['dir']."/".$_GET['file']."Controller.php";
