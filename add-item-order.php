<?php
    $title = 'Item';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/cart-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'admin/controllers/InventoryController.php';
    include_once 'admin/controllers/SizesController.php';
    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;
    $sizes = new SizesController;

    $authenticated->customerOnly();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    include 'includes/categories.php';
    
    include 'message.php';
?>

<?php

    if(isset($_SESSION['authenticated']))
    {

    // if get itemID is set false 
    if(!isset($_GET['itemID'])){

        // it show the message
        showMessage('Something went wrong');
    }else{
        $itemID = $_GET['itemID'];

                       // exact came from my class CategoriesController 
        $resultExact = $inventory->exact($itemID);

        // if result of exact is return false
        if(!$resultExact){
            
            // it show the message
            showMessage('No item id found');
        }else{

            // if the resultExact of exact function return the result
            foreach($resultExact as $inventoryRows) :

                      // rows came frin ny Class InventoryController
                $data = $inventory->rows($inventoryRows);
?>
    <form action="" method="post">
        
        <div class="item-add-container">

            <div class="item-modal-container">

                <div class="item-image-container">
                    <div class="child-image-container">
                        <img src="images/<?= $data['image'] ?>" alt="" class="item-images">
                    </div>
                </div>

                <div class="item-info-container">
                    <h5 class="item-category"><?= $data['categoryName'] ?> / <?= $data['gender'] ?></h5>
                    <p class="item-name"><?= $data['name'] ?></p>
                    <p class="item-quantity"><?= $data['stock'] ?> item left</p>

                    <div class="item-price-container">
                        <span class="item-price">&#x20B1; <?= $data['price'] ?></span>
                    </div>

                    <div class="item-size-container">
                        <h6 class="item-size-name">Size</h6>

                        <div class="size-option-container">
                            <button type="button" name="" class="size-button"><?= $data['size'] ?></button>
                        </div>

                    </div>

                    <div class="item-quantity-container">
                        <h6 class="item-quantity-name">Qty:</h6>
                        <div class="quantity-selector qtyBox">
                            <input type="hidden" name="inputID" class="inventoryID" value="<?= $data['id'] ?>"">

                            <button type="button" class="quantity-button decrement">-</button>

                            <input type="number" name="inputQuantity" class="qty quantity-input" value="1" min="1">

                            <button type="button" class="quantity-button increment">+</button>
                        </div>
                    </div>

                    <div class="add-cart-container">
                        <button type="submit" class="add-to-cart-button" name="add-order-button" value="<?= $data['id'] ?>">
                            ADD TO CART
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </form>
<?php
                endforeach;
            }
        }
    }else{
        showMessage('Register/Login to place an order');

        // if get itemID is set false 
        if(!isset($_GET['itemID'])){

            // it show the message
            showMessage('Something went wrong');
        }else{
            $itemID = $_GET['itemID'];

                        // exact came from my class CategoriesController 
            $resultExact = $inventory->exact($itemID);

            // if result of exact is return false
            if(!$resultExact){
                
                // it show the message
                showMessage('No item id found');
            }else{

                // if the resultExact of exact function return the result
                foreach($resultExact as $inventoryRows) :

                        // rows came frin ny Class InventoryController
                    $data = $inventory->rows($inventoryRows);
?>
    <form action="" method="post">
        
        <div class="item-add-container">

            <div class="item-modal-container">

                <div class="item-image-container">
                    <div class="child-image-container">
                        <img src="images/<?= $data['image'] ?>" alt="" class="item-images">
                    </div>
                </div>

                <div class="item-info-container">
                    <h5 class="item-category"><?= $data['categoryName'] ?> / <?= $data['gender'] ?></h5>
                    <p class="item-name"><?= $data['name'] ?></p>
                    <p class="item-quantity"><?= $data['stock'] ?> item left</p>

                    <div class="item-price-container">
                        <span class="item-price">&#x20B1; <?= $data['price'] ?></span>
                    </div>

                    <div class="item-size-container">
                        <h6 class="item-size-name">Size</h6>

                        <div class="size-option-container">
                            <button class="size-button">XS</button>
                            <button class="size-button">S</button>
                            <button class="size-button">M</button>
                            <button class="size-button disabled">L</button>
                        </div>

                    </div>

                    <div class="item-quantity-container">
                        <h6 class="item-quantity-name">Qty:</h6>
                        <div class="quantity-selector qtyBox">
                            <input type="hidden" name="inputID" class="inventoryID" value="<?= $data['id'] ?>"">

                            <button type="button" class="quantity-button decrement">-</button>

                            <input type="text" name="inputQuantity" class="qty quantity-input" value="1" min="1">

                            <button type="button" class="quantity-button increment">+</button>
                        </div>
                    </div>

                    <div class="add-cart-container">
                        <button type="submit" class="add-to-cart-button" name="add-order-button" value="<?= $data['id'] ?>">
                            ADD TO CART
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </form>
<?php
                endforeach;
            }
        }
    }
?>
<?php
    include 'includes/footer.php';
?>