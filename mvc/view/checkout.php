<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
<? $total = getCartTotal($xml); ?>
<div>Your total: <?= "$ " . number_format($total, 2, '.', '') ?></div>
<div>You order has been checked out</div>
<div>THANKS!</div>
<? session_destroy(); ?>
<a href="threeaces.php">HOME</a>
</body>
</html>
