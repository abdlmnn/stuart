<?php
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    include_once 'controllers/CartController.php';

    $inventory = new InventoryController;
    $sizes = new SizesController;
    $cart = new CartController;

    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :

    // if the session cart is not set or not exists
    if(!isset($_SESSION['cart']))
    {
        // session cart array will exists

        // emptycart came from my Class CartController
        // $cart->emptyCart();
        $_SESSION['cart'] = [];
        
        // print_r($_SESSION['order']);
    }

    // DELETE ALL cart or CLEAR ALL cart in cart modal
    if(isset($_POST['delete-all-order-button']))
    {

        // updateStockDeleteAll came from my Class CartController
        $cart->updateStockDeleteAll();

        // it set an empty session order array 

        // emptyOrder came from my Class CartController
        $cart->emptyOrder();

        // print_r($_SESSION['order']);
    }

    if(isset($_POST['delete-order-button']))
    {
        $inventoryID = $_POST['delete-order-button'];

        // updateStockDelete came from my Class CartController
        $cart->updateStockDelete($inventoryID);

        // it delete the cart with exact id
        // removing the exact key or inventoryID on session cart array 
        unset($_SESSION['cart'][$inventoryID]);
    }

    // UPDATE QUANTITY CART in cart modal
    if(isset($_POST['update-quantity-order-button']))
    {
        $inventoryID = $_POST['update-quantity-order-button'];
        $updateQuantity = $_POST['updateQuantity'];

        $newQuantity = $updateQuantity - $_SESSION['cart'][$inventoryID]['quantity'];

        // getStock came from my Class CartController
        $data = $cart->getStock($inventoryID);

        // if newQuantity is less than itemStock
        if($newQuantity <= $data['itemStock']){
            
            if(isset($_SESSION['cart'][$inventoryID])){
            // check if the quantity is equal to 0
            if($updateQuantity == 0){

                // it delete the cart with exact id

                // removing the exact key or inventoryID on session cart array 
                unset($_SESSION['cart'][$inventoryID]);
            }else{

                // if not equal to 0, it update the quantity
                $_SESSION['cart'][$inventoryID]['quantity'] = $updateQuantity;

                // updateStock came from my Class CartController
                $cart->updateStock($inventoryID,$newQuantity);
            }
            }
        }else{

            showMessage('Not enough stock');
        }
        // print_r($quantity);
    }
    // UPDATE QUANTITY CART in cart modal
    // ADD CART
    if(isset($_POST['add-order-button']))
    {
        $inventoryID = $_POST['add-order-button'];
        $quantity = $_POST['inputQuantity'];
        $size = $_POST['inputSize'];
        
                  // getStock came from my Class CartController
        $sizeData = $sizes->getExactStock($inventoryID);

        // if my sizeStock is greater than quantity
        if($sizeData['sizeStock'] >= $quantity){

            // print_r($sizeData['sizeStock']);

            if(isset($_SESSION['cart'][$inventoryID][$size])){

                showMessage('This item already placed in cart');
            }else{

                             // exact came from my Class CartController 
                $resultExact = $cart->exact($inventoryID);

                if($resultExact){

                          // rows came from my Class CartController 
                    $data = $cart->rows($resultExact);

                    // storing the rows value to the session cart array with exact id, size
                    $_SESSION['cart'][$inventoryID]['item'][$size] = [
                        'name' => $data['name'],
                        'image' => $data['image'],
                        'price' => $data['price'],
                        'size' => $size,
                        'quantity' => $quantity
                    ];

                    // print_r($_SESSION['cart']);

                    unset($_SESSION['cart']);

                    // updateStock came from my Class SizesController
                    $sizes->updateStock($size,$quantity);
                }

            }

        }else{

            showMessage('Not Enough Stock');
        }

    }
    // ADD CART

    endif;
?>

<!-- 
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
                        'id' => $data['id'],
                        'subName' => $data['subName'],
                        'image' => $data['image'],
                        'name' => $data['name'],
                        'price' => $data['price'],
                        'quantity' => $quantity
                    ];

                    // print_r($_SESSION['order']);

                    // updateStock came from my Class CartController
                    // $cart->updateStock($inventoryID,$quantity);
                }

            }

            // if the item id exists in the session order array
            if(isset($_SESSION['order'][$inventoryID])){

                showMessage('This item already placed in order');
            }else{
                // if the item id is not exists in session order array 

                   
            }








//              if(isset($_SESSION['cart'][$inventoryID][$size])){

                // showMessage('This item already placed in cart');
            // }else{

                             // exact came from my Class CartController 
                $resultExact = $cart->exact($inventoryID);

                if($resultExact){

                          // rows came from my Class CartController 
                    $data = $cart->rows($resultExact);

                    // storing the rows value to the session cart array with exact id
                    // $_SESSION['cart'][$inventoryID][$size] = [
                    //     'id' => $data['id'],
                    //     'name' => $data['name'],
                    //     'image' => $data['image'],
                    //     'price' => $data['price'],
                    //     'size' => $size,
                    //     'quantity' => $quantity
                    // ];

                    // print_r($_SESSION['cart']);

                    // unset($_SESSION['cart']);

                    // updateStock came from my Class SizesController
                    $sizes->updateStock($size,$quantity);
                }

            // }
-->