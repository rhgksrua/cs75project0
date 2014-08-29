<?php

$xml = simplexml_load_file("mvc/model/menu3.xml");
$categories = $xml->xpath("/menu/category");
$categoryList = array();
foreach ($categories as $category) {
    $categoryList[] = $category->attributes()->type;
}

$testItem = $xml->xpath("/menu/category[@type='Pizzas']/item[@name='Tomato & Cheese']/price[@choice='small']");

function getItems($xml, $page) {
    $xp = "/menu/category[{$page}]/item/@name";
    $items = $xml->xpath($xp); 
    //print_r($items);
    $itemList = array();
    foreach ($items as $item) {
       $itemList[] = $item;
    }
    return $items;
}
?>

<?
function showItems($xml, $page) {
    $xp = "/menu/category[{$page}]/item";
    $items = $xml->xpath($xp);
    foreach ($items as $item) {
?>
    <form action="threeaces.php" method="post">
    <p> <?= $item->attributes()->name; ?>
    <br>
<?
        foreach ($item->price as $price) {
?>
            <?= $price->attributes()->choice; ?>
            <? print "$ " . $price; ?>
            <input type='text'>
            <br>
<? 
        } 
?>
    </p>
<?
    }
?>
    <input type='submit' value='add to cart'>
</form>
<?
}
?>

