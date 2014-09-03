<?php

function showCart($xml) {
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {

?>
<form action="threeaces.php?cart=true" method="post">
    <table>
<?
        foreach ($_SESSION["cart"] as $i => $item) {
?>
            <tr>
                <td><?= $item["cat"] ?></td>
                <td><?= $item["item"] ?></td>
                <td><?= $item["price"] ?></td>
                <input type='hidden' name="update[<?= $i ?>][cat]" value="<?= $item['cat'] ?>">
                <input type='hidden' name="update[<?= $i ?>][item]" value="<?= $item['item'] ?>">
                <input type='hidden' name="update[<?= $i ?>][price]" value="<?= $item['price'] ?>">
                <td><input type="text" name="update[<?= $i ?>][quantity]" value='<?= $item["number"] ?>'></td>
                <td><a href="threeaces.php?cart=true&remove=true&id=<?= $i ?>">remove</a></td>
            </tr>

<?
        }
?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
    </table>

</form>
<div><a href="threeaces.php?checkout=true">Check Out</a></div>
<?
    } else {
?>
<p>Cart is Empty</p>

<?
    }
}
?>

<?

function getCartTotal($xml) {
    if (!isset($_SESSION["cart"])) {
        return 0;
    }
    $total = 0.00;
    foreach ($_SESSION["cart"] as $item) {
        $xp = "/menu/category[@type='{$item['type']}']/item[@name='{$item['name']}']/price[@choice='{$item['choice']}']";
        $price = $xml->xpath($xp);
        $total += floatval($price[0]) * $item["quantity"];
    }
    return $total;
}
?>

<?php
function getItems($xml, $page) {
    $xp = "/menu/category[{$page}]/item/@name";
    $items = $xml->xpath($xp); 
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
    $heading = $xml->xpath("/menu/category[{$page}]/@type");
    $category = $heading[0];
    $i = 0;
?>
    <h1><?= $category ?></h1>
<?
    foreach ($items as $item) {
        $itemName = $item->attributes()->name;
?>
    <form action="threeaces.php" method="post">
    <p> <?= $itemName ?></p>
    <table>
<?
        foreach ($item->price as $price) {
?>

<?
            $choice = $price->attributes()->choice;
?>
            <?= $choice ?>
                
            <? print "$ " . $price; ?>
            <input type='text' name="sel[<?= $i ?>][number]" >
            <input type='hidden' name="sel[<?= $i ?>][cat]" value="<?= $category ?>">
            <input type='hidden' name="sel[<?= $i ?>][item]" value="<?= $itemName ?>">
            <input type='hidden' name="sel[<?= $i ?>][price]" value="<?= $choice ?>">
            <br>
            <? $i++; ?>
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

