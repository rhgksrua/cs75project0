
<!DOCTYPE html>
<html leng='en'>
<head>
    <title>Three Aces</title>
</head>
<body>
<?

    print "<div>";
    $navNum = 0;
    foreach ($navList as $cat) {
        print "<a href='/threeaces.php?page=$navNum'>$cat</a>";
        $navNum += 1;
    }
    print "</div>";    

    print "current page" . ": " . $navList[$currentPage];
    foreach ($menu as $cat) {
        print "<li>";
        print $cat;
        print "</li>";
    }
    foreach ($subMenu as $item) {
        print "<li>";
        print $item;
        print "</li>";
    }
?>
    
</body>
</html>
