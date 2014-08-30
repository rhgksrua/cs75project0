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
    <h1>CART</h1>
<?
    showCart($xml);
?>
    <p>Total: <? print "$ " . number_format(getCartTotal($xml), 2, '.', ''); ?></p>
<a href="threeaces.php">go back</a>
</body>
</html>
