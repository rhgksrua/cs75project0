
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

$i = 0;
foreach ($categoryList as $category) {
    $i++;
    print "<a href='/threeaces.php?page={$i}'><span>{$category}</span></a>";
}
print "<br>";

showItems($xml, $menuPage);
?>
    
</body>
</html>
