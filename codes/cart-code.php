<?php
    include_once 'controllers/CartController.php';
    include_once 'admin/controllers/InventoryController.php';

    $cart = new CartController;
    $inventory = new InventoryController;

    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :

    // if the session order is not set or not exists
    if(!isset($_SESSION['order']))
    {
        // session order array will exists

        // emptyOrder came from my Class CartController
        $cart->emptyOrder();
        
        // print_r($_SESSION['order']);
    }

    // DELETE ALL ORDER or CLEAR ALL ORDER in order modal
    if(isset($_POST['delete-all-order-button']))
    {
        // it set an empty session order array 
        
        // emptyOrder came from my Class CartController
        $cart->emptyOrder();

        // print_r($_SESSION['order']);
    }

    if(isset($_POST['delete-order-button']))
    {
        $inventoryID = $_POST['delete-order-button'];

        // it delete the order with exact id

        // removing the exact key or inventoryID on session order array 
        unset($_SESSION['order'][$inventoryID]);
    }

    // UPDATE QUANTITY ORDER in order modal
    if(isset($_POST['update-quantity-order-button']))
    {
        $inventoryID = $_POST['update-quantity-order-button'];
        $updateQuantity = $_POST['updateQuantity'];

        $newQuantity = $updateQuantity - $_SESSION['order'][$inventoryID]['quantity'];

        // getStock came from my Class CartController
        $data = $cart->getStock($inventoryID);

        // if newQuantity is less than itemStock
        if($newQuantity <= $data['itemStock']){
            
            if(isset($_SESSION['order'][$inventoryID])){
            // check if the quantity is equal to 0
            if($updateQuantity == 0){

                // it delete the order with exact id

                // removing the exact key or inventoryID on session order array 
                unset($_SESSION['order'][$inventoryID]);
            }else{

                // if not equal to 0, it update the quantity
                $_SESSION['order'][$inventoryID]['quantity'] = $updateQuantity;

                // updateStock came from my Class CartController
                $cart->updateStock($inventoryID,$newQuantity);
            }
            }
        }else{

            showMessage('Not enough stock');
        }
        // print_r($quantity);
    }
    
    // ADD ORDER
    if(isset($_POST['add-order-button']))
    {
        $inventoryID = $_POST['add-order-button'];
        $quantity = $_POST['inputQuantity'];

        // print_r($inventoryID);
        
              // getStock came from my Class CartController
        $data = $cart->getStock($inventoryID);

        // if my itemStock is greater than quantity
        if($data['itemStock'] >= $quantity){

            // if the item id exists in the session order array
            if(isset($_SESSION['order'][$inventoryID])){

                showMessage('This item already placed in order');
            }else{
                // if the item id is not exists in session order array 

                            // exact came from my Class CartController 
                $resultExact = $cart->exact($inventoryID);

                if($resultExact){

                        // rows came from my Class CartController 
                    $data = $cart->rows($resultExact);

                    // storing the rows value to the session order array with exact id
                    $_SESSION['order'][$inventoryID] = [
                        'categoryName' => $data['categoryName'],
                        'gender' => $data['gender'],
                        'image' => $data['image'],
                        'name' => $data['name'],
                        'size' => $data['size'],
                        'price' => $data['price'],
                        'quantity' => $quantity
                    ];

                    // updateStock came from my Class CartController
                    $cart->updateStock($inventoryID,$quantity);
                }

            }

        }else{

            // if the itemStock is quantity or 0
            showMessage('Out of Stock');
        }

        // print_r($_SESSION['order']);
    }

    endif;
?>