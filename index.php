<!DOCTYPE html>
<html>
<head>
    <title>Project 0</title>
</head>
<body>
    <?
        $menu = simplexml_load_file("mvc/model/menu2.xml");
        foreach ($menu->xpath("/menu/category") as $category) {
            print $category->cname;
            print "<ul>";
            foreach ($category->item as $item) {
                print "<li>";
                print $item->iname;
                foreach ($item->sizes->type as $type) {
                    print " - " . $type->tname . ": " . $type->price;
                }
                print "</li>";
            }
            print "</ul>";
            print "<br>";
        }
    ?>

    <div>
        ---------------------------
    </div>
</body>
</html>
