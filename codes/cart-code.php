<?php
    include_once 'controllers/CartController.php';
    include_once 'admin/controllers/InventoryController.php';

    $cart = new CartController;
    $inventory = new InventoryController;

    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :
    
        // ADD ORDER or CART
        if(isset($_POST['add-order-button']))
        {
            $inventoryID = $_POST['add-order-button'];

            // print_r($inventoryID);

                                // getExact came from my Class InventoryController
            $result = $cart->exact($inventoryID);

            if($result){

                    // rows came from my Class CartController
                $data = $cart->rows($result);

                // session array to put all the selected item exact id inside of order array
                $_SESSION['order'][] = [
                    'id' => $data['id'],
                    'image' => $data['image'],
                    'name' => $data['name'],
                    'price' => $data['price']
                ];

                showMessage('You placed an order');

                // $item->itemExists();
                // unset($_SESSION['order']);

                // print_r($_SESSION['order']);
                // session_destroy();

            }else{

                showMessage('No item select');
            }
        }

    endif;
?>