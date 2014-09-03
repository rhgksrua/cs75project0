<?php

$xml = simplexml_load_file("mvc/model/menu3.xml");
$categories = $xml->xpath("/menu/category/@type");
$items  = $xml->xpath("/menu/category");


?>
