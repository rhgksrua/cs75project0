<?php
//  php 5.3

session_start();

// helper function
require("helper.php");

//include("helper.php");

// Initializing
$page = 0;
if (empty($_SESSION["cart"])) {
    // php 5.3 does not support shorthand [] for array().
    print "cart is empty";
    $_SESSION["cart"] = array();
}

// add to cart
if (isset($_POST["cart"])) {
    $update = $_POST["cart"];
    foreach ($update as $i => $item) {
        if (!empty($item["quantity"]) &&
            is_numeric($item["quantity"])) {
            $addToCart = True;
            // check if item exists in cart
            foreach($_SESSION["cart"] as $itemInCart) {
                if ($itemInCart["type"] == $item["type"] &&
                    $itemInCart["name"] == $item["name"] &&
                    $itemInCart["choice"] == $item["choice"]
                    ) {
                    $_SESSION["cart"][$i]["quantity"] += $item["quantity"];
                    $addToCart = False;
                    print "<p>already exists. updating quantity</p>";
                    break;
                } 
            }
            // add to cart if not exists
            if ($addToCart) {
                $_SESSION["cart"][] = $item;
            }
        }
    }
}


// remove item completely thru remove link
if (isset($_GET["remove"]) && $_GET["remove"] == True) {
    unset($_SESSION["cart"][$_GET["id"]]);
    $_SESSION["cart"] = array_values($_SESSION["cart"]);

}

// update quantity or remove item from cart
if (isset($_POST["update"])) {
    print "<p>update cart</p>";


    foreach($_POST["update"] as $key => $item) {
        if (is_numeric($item["quantity"])) {

            if ($item["quantity"] <= 0) {
                unset($_SESSION["cart"][$key]);
            } else {
                $_SESSION["cart"][$key]["quantity"] = $item["quantity"];
            }
        }
    }
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    

}

//print_r($_POST["cart"]);
//print "<br>";
print_r($_SESSION["cart"]);

// routing logic 
if (isset($_GET["go"])) {
    switch ($_GET["go"]) {
        // temporary reset link to empty cart
        case "reset":
            session_destroy();
            break;
        case "cart":
            include(M . "model.php");
            include(V . "cart.php");
            exit;
            break;
        case "checkout":
            include(M . "model.php");
            $total = number_format(getCartTotal($xml), 2);
            include(V . "checkout.php");
            exit;
            break;
        default:
            break;
    }
}
    

// show menu route
if (isset($_GET["page"]) &&
    is_numeric($_GET["page"])) {
    $page = $_GET["page"];
}
include(M . "model.php");

$total = getCartTotal($xml);

include(V . "view.php");


    

?>
