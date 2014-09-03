<!DOCTYPE html>
<html leng='en'>
<head>
    <title>Three Aces</title>
    <style>
        span.nav {
            margin: 10px;
        }
        span.type {
            color: red;
            font-size: 1.2em;
        }
        body {
            margin-left: 3%;
        }
        th {
            text-align: left;
        }
        th, td {
        }
        .type {
            width: 20%;
        }
        .name {
            width: 40%;
        }
        .choice {
            width: 10%;
        }
        .price {
            width: 10%;
        }
        .update {
            background-color: none;
        }


    </style>
</head>
<body>
    <h1>CART</h1>
<?
    showCart($xml);
?>
    <p>Total: <? print "$ " . number_format(getCartTotal($xml), 2, '.', ''); ?></p>
    <a href="threeaces.php?page=<?= $page ?>">go back</a>
</body>
</html>
