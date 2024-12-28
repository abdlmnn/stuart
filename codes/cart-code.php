<?php
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    include_once 'controllers/CartController.php';
    include_once 'controllers/AuthenticateController.php';

    $inventory = new InventoryController;
    $sizes = new SizesController;
    $cart = new CartController;
    $authenticate = new AuthenticateController;

    // the user is need to login to place an order
    if(isset($_SESSION['authenticated'])) :

    // if the session cart is not set or not exists
    if(!isset($_SESSION['cart']))
    {
        // session cart array will exists

        // emptycart came from my Class CartController
        $cart->emptyCart();
        
        // print_r($_SESSION['cart']);
    }
    // if the session cart is not set or not exists
    // CHECKOUT
    if(isset($_POST['add-checkout-button'])){
        
        if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
            
            redirect('Please select the items you like to checkout with','view-cart.php');
        }

        direct('add-place-order.php');
    }
    // CHECKOUT
    // DELETE ALL ITEM AND UPDATE STOCK CART
    if(isset($_POST['delete-all-order-button']))
    {
        $inventoryID = $_POST['inventoryID'];
        $size = $_POST['sizeID'];

        // print_r($_SESSION['cart']);

        if(isset($_SESSION['cart'][$inventoryID]['item'][$size])){

            foreach($_SESSION['cart'] as $inventoryID => $inventoryData){

                foreach($inventoryData['item'] as $size => $data){
                    $quantity = $data['quantity'];

                    // updateStockDelete came from my Class SizeController
                    $sizes->updateStockDelete($size,$inventoryID,$quantity);

                    // it set an empty session order array 

                    // emptyCart came from my Class CartController
                    $cart->emptyCart();
                }
                
            }
            
        }

    }
    // DELETE ALL ITEM AND UPDATE STOCK CART
    // DELETE ITEM AND UPDATE STOCK CART
    if(isset($_POST['delete-order-button']))
    {
        $inventoryID = $_POST['inventoryID'];
        $size = $_POST['sizeID'];
        $quantity = $_POST['inputQuantity'];

        // updateStockDelete came from my Class CartController
        $sizes->updateStockDelete($size,$inventoryID,$quantity);

        // it delete the cart with exact inventoryID
        // removing the exact key or inventoryID on session cart array 
        unset($_SESSION['cart'][$inventoryID]['item'][$size]);
    }
    // DELETE ITEM AND UPDATE STOCK CART
    // UPDATE QUANTITY CART
    if(isset($_POST['update-quantity-order-button']))
    {
        $inventoryID = $_POST['inventoryID'];
        $size = $_POST['sizeID'];
        $updateQuantity = $_POST['inputQuantity'];

        if(isset($_SESSION['cart'][$inventoryID]['item'][$size])){

            $newQuantity = $updateQuantity - $_SESSION['cart'][$inventoryID]['item'][$size]['quantity'];

                  //  getExactStock came from my Class SizesController
            $data = $sizes->getExactStock($inventoryID,$size);

            // if newQuantity is less than sizeStock
            if($newQuantity <= $data['sizeStock']){

                // print_r($data['sizeStock']);
                
                if(isset($_SESSION['cart'][$inventoryID]['item'][$size])){

                    // check if the quantity is equal to 0
                    if($updateQuantity == 0){

                        $quantity = $_SESSION['cart'][$inventoryID]['item'][$size]['quantity'];

                        // updatStockDelete came from my Class SizesController
                        $sizes->updateStockDelete($size,$inventoryID,$quantity);
                            
                        // it delete the cart with exact inventoryID

                        // removing the exact key or inventoryID on session cart array 
                        unset($_SESSION['cart'][$inventoryID]);
                    }else{

                        // if not equal to 0, it update the quantity
                        $_SESSION['cart'][$inventoryID]['item'][$size]['quantity'] = $updateQuantity;

                        // updatStock came from my Class SizesController
                        $sizes->updateStock($size,$inventoryID,$newQuantity);
                    }

                }
            }else{

                showMessage('Not enough stock');
            }
        // print_r($quantity);

        }
    }
    // UPDATE QUANTITY CART
    // ADD CART
    if(isset($_POST['add-order-button']))
    {
        $inventoryID = $_POST['add-order-button'];
        $quantity = $_POST['inputQuantity'];
        $size = $_POST['inputSize'];
        
                  // getStock came from my Class CartController
        $sizeData = $sizes->getExactStock($inventoryID,$size);

        // if my sizeStock is greater than quantity
        if($sizeData['sizeStock'] >= $quantity){

            // print_r($sizeData['sizeStock']);

            if(isset($_SESSION['cart'][$inventoryID]['item'][$size])){

                showMessage('This item already placed in cart');
            }else{

                             // exact came from my Class CartController 
                $resultExact = $cart->exact($inventoryID);

                if($resultExact){

                          // rows came from my Class CartController 
                    $data = $cart->rows($resultExact);

                    // storing the rows value to the session cart array with exact id, size
                    $_SESSION['cart'][$inventoryID]['item'][$size] = [
                        'id' => $inventoryID, 
                        'name' => $data['name'], 
                        'image' => $data['image'],
                        'price' => $data['price'],
                        'size' => $size,
                        'quantity' => $quantity
                    ];

                    showMessage('Your item has been added to the cart');

                    // print_r($_SESSION['cart']);

                    // unset($_SESSION['cart']);

                    // updateStock came from my Class SizesController
                    $sizes->updateStock($size,$inventoryID,$quantity);
                }

            }

        }else{

            showMessage('Not Enough Stock');
        }

    }
    // ADD CART

    endif;
?>