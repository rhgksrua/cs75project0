
<!DOCTYPE html>
<html leng='en'>
<head>
    <title>Three Aces</title>
    <style>
        span.type {
            color: red;
            font-size: 1.2em;
        }
        body {
            margin-left: 3%;
        }
        dtd {
            text-align: center;
        }
        th {
            text-align: left;
        }
        span.nav {
            margin: 10px;
            border: 2px solid black;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
        .typelink:link {
            text-decoration: none;
        }
        a.typelink:visited {
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class='navbar'>
<?
foreach ($categories as $i => $category) {
?>
    <a class="typelink" href='/threeaces.php?page=<?= $i ?>'><span class="nav"><?= $category ?></span></a>

<?
}
?>
</div>

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
    echo "<table>";

foreach ($items[$page] as $category) {
    $name = $category->attributes()->name;
    echo "<tr><th colspan='2'><span class='type'>$name<span></th></tr>";
    echo "<tr><th>size</th><th>price</th><th></th><th></th><th></th><th>quantity</th></tr>";

    foreach ($category->price as $price) {
        $choice = $price->attributes()->choice;

?>
        <tr>
            <td>
                <?= $choice ?>
            </td>
            <td>
               $ <?= $price ?>
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
                <input type='text' name="cart[<?= $i ?>][quantity]" maxlength="4" size="4">
            </td>
        </tr>
    <?php
        $i++;
    }
}
    echo "</table>";
?>
    <br />
    <input type="submit" value="Add To Cart">
</form>
    <p>Total: $ <?= number_format($total, 2) ?></p>
    <a href="threeaces.php?go=cart">Go to cart</a>
    <br />
    <a href="threeaces.php?go=reset">RESET</a>
</body>
</html>
