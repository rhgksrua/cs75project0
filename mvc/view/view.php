
<!DOCTYPE html>
<html leng='en'>
<head>
    <title>Three Aces</title>
    <style>
        span {
            margin: 10px;
        }
    </style>
</head>
<body>
<?
foreach ($categories as $i => $category) {
?>
    <a href='/threeaces.php?page=<?= $i ?>'><span><?= $category ?></span></a>
<?
}
?>
<br />
<?
// Get menu type
$type = $items[$page]->attributes()->type;

// counter for multi array POST
$i = 0;
?>

<h1><?= $type ?></h1>
<form action="threeaces.php?page=<?= $page ?>" method="post">

<?

foreach ($items[$page] as $category) {
    echo "<table>";
    $name = $category->attributes()->name;
    echo "<h3>$name</h3>";

    foreach ($category->price as $price) {
        $choice = $price->attributes()->choice;

?>
        <tr>
            <td>
                <p><?= $choice ?></p>
            </td>
            <td>
                <p><?= $price ?></p>
            </td>
            <td>
                <input type='hidden' name="cart[<?= $i ?>][type]" value="<?= $type ?>">
            </td>
            <td>
                <input type='hidden' name="cart[<?= $i ?>][name]" value="<?= $name ?>">
            </td>
            <td>
                <input type='hidden' name="cart[<?= $i ?>][choice]" value="<?= $choice ?>">
            </td>
            <td>
                <input type='text' name="cart[<?= $i ?>][quantity]" >
            </td>
        </tr>
    <?php
        $i++;
    }
    echo "</table>";
}
?>
    <br />
    <input type="submit" value="Add To Cart">
</form>
    <p>Total: <?= number_format($total, 2) ?></p>
    <a href="threeaces.php?go=cart">Go to cart</a>
    <br />
    <a href="threeaces.php?go=reset">RESET</a>
</body>
</html>
