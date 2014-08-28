<?php
session_start();


include(M. "model.php");
include("helper.php");

// Navigation bar.  Contains all category in an array.
$navList = getMenuList($xml, null);
$navCount = count($navList);

if (isset($_GET['page'])) {
    if ($_GET['page'] < 0 || $_GET['page'] > $navCount) {
        header('Location: /error.html');
    } else {
        $currentPage = $_GET['page'];
    }
} else {
    $currentPage = 0;
}

$subMenu = getSubMenuList($xml, $currentPage);
$menu = getMenuList($xml, $currentPage);



include(V. "view.php");

?>
