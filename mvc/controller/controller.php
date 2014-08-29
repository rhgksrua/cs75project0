<?php

$menuPage = 1;
include(M. "model.php");

if (isset($_GET['page'])) {
    $menuPage = $_GET['page'];
}

$itemList = getItems($xml, $menuPage);
include(V. "view.php");

?>
