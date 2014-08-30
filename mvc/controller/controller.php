<?php
session_start();

include(M. "model.php");
include("helper.php");


if (isset($_GET["checkout"])) {
    include(V. "checkout.php");
    exit;
}

// update cart
if (isset($_POST["update"])) {
    foreach($_POST["update"] as $key => $item) {
        if (is_numeric($item["quantity"])) {

            if ($item["quantity"] <= 0) {
                unset($_SESSION["cart"][$key]);
            } else {
                $_SESSION["cart"][$key]["number"] = $item["quantity"];
            }
        }
    }
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
}

if (isset($_GET["cart"]) && $_GET["cart"]) {
    if (isset($_GET["remove"])) {
        unset($_SESSION["cart"][$_GET["id"]]);
        $_SESSION["cart"] = array_values($_SESSION["cart"]);
    }
    include (V. "cart.php");
    exit;
}

// reset cart
if (isset($_GET["reset"])) {
    session_destroy();
}


$menuPage = 1;

if (isset($_GET['page'])) {
    $menuPage = $_GET['page'];
}

// adding to cart
if (isset($_POST["sel"])) {
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    $addToCart = True;
    foreach ($_POST["sel"] as $item) {
        if (is_numeric($item["number"])) {
            // add item if cart is empty
            if (empty($_SESSION["cart"])) {
                $_SESSION["cart"][] = $item;
            } else {
                // check cart for same item
                foreach ($_SESSION["cart"] as $key => $cartItem) {
                    if (
                        $cartItem["cat"] == $item["cat"] &&
                        $cartItem["item"] == $item["item"] &&
                        $cartItem["price"] == $item["price"]
                    ) {
                        $_SESSION["cart"][$key]["number"] += $item["number"];
                        $addToCart = False;
                        break;
                    } 
                }
                // add if not in cart
                if ($addToCart) {
                    $_SESSION["cart"][] = $item;
                }
            }
        }
    }
}

$itemList = getItems($xml, $menuPage);
$total = number_format(getCartTotal($xml), 2, '.', '');
include(V. "view.php");

?>
