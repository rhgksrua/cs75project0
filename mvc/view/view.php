
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
foreach ($categoryList as $i => $category) {
?>
    <a href='/threeaces.php?page=<?= $i + 1 ?>'><span><?= $category ?></span></a>
<?
}
?>
    <br>
    <p>Total: <?= $total ?></p>
    <a href="threeaces.php?cart=true">Go to cart</a>
<?
showItems($xml, $menuPage);
?>
<a href="threeaces.php?reset=true">RESET</a>
</body>
</html>
