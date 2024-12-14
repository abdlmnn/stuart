<?php
    include_once 'controllers/CartController.php';

    $cart = new CartController;

    // It set the session cart into an empty array
    if(!isset($_SESSION['cart']))
    {
        $_SESSION['cart'] = [];
    }

    // ADD ORDER or CART
    if(isset($_POST['add-order-button']))
    {
        $inventoryID = $post['add-order-button'];

                        // getStock came from my Class CartController
        $resultGetStock = $cart->getStock($inventoryID);

        if($resultGetStock){

            $quantity = 1;

            if($resultGetStock['itemStock'] >= $quantity){

                if(!isset($_SESSION['cart'][$inventoryID])){

                    
                }
            }


        }
    }
?>