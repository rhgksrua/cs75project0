<?php

function getMenuList($xml, $page) {
    $menuList = array();
    if (isset($page)) {
        $menuList = $xml->xpath("/menu/category");
        return array($menuList[$page]->cname);

    }
    else {
        foreach ($xml->xpath("/menu/category") as $category) {
            $menuList[] = $category->cname;

        }
        return $menuList;
    }
}

function getSubMenuList($xml, $page) {
    $itemList = array();
    $selectCat = $xml->xpath("/menu/category");
    $currentCat = $selectCat[$page]->item;
    foreach($currentCat as $cat) {
        $itemList[] = $cat->iname;
    }
    return $itemList;

}

?>
