<?php

function showCart($xml) {
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {

?>
<form action="threeaces.php?go=cart" method="post">
    <table>
<?
        foreach ($_SESSION["cart"] as $i => $item) {
?>
            <tr>
                <td><?= $item["type"] ?></td>
                <td><?= $item["name"] ?></td>
                <td><?= $item["choice"] ?></td>
<?
            $ty = $item['type'];
            $na = $item['name'];
            $ch = $item['choice'];
            $pr = $xml->xpath("/menu/category[@type='$ty']/item[@name='$na']/price[@choice='$ch']");


?>
                <td><?= $pr[0] ?></td>
                
                <input type='hidden' name="update[<?= $i ?>][type]" value="<?= $item['type'] ?>">
                <input type='hidden' name="update[<?= $i ?>][name]" value="<?= $item['name'] ?>">
                <input type='hidden' name="update[<?= $i ?>][choice]" value="<?= $item['choice'] ?>">
                <td><input type="text" name="update[<?= $i ?>][quantity]" value='<?= $item["quantity"] ?>'></td>
                <td><a href="threeaces.php?go=cart&remove=True&id=<?= $i ?>">remove</a></td>
            </tr>

<?
        }
?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
    </table>
</form>
<div><a href="threeaces.php?go=checkout">Check Out</a></div>
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
    if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
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

