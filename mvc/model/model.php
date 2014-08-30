<?php

$xml = simplexml_load_file("mvc/model/menu3.xml");
$categories = $xml->xpath("/menu/category");
$categoryList = array();
foreach ($categories as $category) {
    $categoryList[] = $category->attributes()->type;
}

?>
