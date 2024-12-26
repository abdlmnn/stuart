<?php
    $title = 'My Cart';

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
    // $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    // include 'includes/categories.php';
    
    include 'message.php';
?>

<link rel="stylesheet" href="css/mycart.css?v1.1">

<div class="main-cart-item-container">

    <div class="child-cart-container">

        <div class="cart-info-container">

            <section class="item-button">

                <h2 class="all-items">ALL ITEMS (2)</h2>

                <form action="" method="post">
                    <button class="action-delete-all-btn">
                        Delete All
                    </button>
                </form>

            </section>

            <div class="cart-items">

                <img src="images/shirt1.png" alt="">

                <div class="cart-items-info">
                    <h4 class="cart-item-name">Red T-shirt</h4>

                    <p class="cart-item-price">&#x20B1; 399</p>

                <!-- <div class="cart-size-quantity-container"> -->

                    <p class="cart-item-size">size: S</p>

                    <div class="item-quantity-container">
                        <h6 class="item-quantity-name">Qty:</h6>

                        <div class="quantity-selector qtyBox">
                            <input type="hidden" name="inputID" class="inventoryID" value="">

                            <button type="button" class="quantity-button decrement">-</button>

                            <input type="number" name="inputQuantity" class="qty quantity-input" value="1" min="1">

                            <button type="button" class="quantity-button increment">+</button>
                        </div>
                    </div>

                <!-- </div> -->

                    <form action="" method="post">
                        <div class="cart-item-delete">

                            <button class="action-update-btn">
                                <ion-icon name="bag-check-outline"></ion-icon>
                            </button>
                            
                            <button class="action-delete-btn">
                                <ion-icon name="bag-remove-outline"></ion-icon>
                            </button>

                        </div>
                    </form>
                </div>
            </div>

            <div class="cart-items">

                <img src="images/PngItem_2635105.png" alt="">

                <div class="cart-items-info">
                    <h4 class="cart-item-name">Jordan 1</h4>

                    <p class="cart-item-price">&#x20B1; 12,000</p>

                <!-- <div class="cart-size-quantity-container"> -->

                    <p class="cart-item-size">size: 41</p>

                    <div class="item-quantity-container">
                        <h6 class="item-quantity-name">Qty:</h6>

                        <div class="quantity-selector qtyBox">
                            <input type="hidden" name="inputID" class="inventoryID" value="">

                            <button type="button" class="quantity-button decrement">-</button>

                            <input type="number" name="inputQuantity" class="qty quantity-input" value="1" min="1">

                            <button type="button" class="quantity-button increment">+</button>
                        </div>
                    </div>

                <!-- </div> -->

                    <form action="" method="post">
                        <div class="cart-item-delete">
                            
                            <button class="action-update-btn">
                                <ion-icon name="bag-check-outline"></ion-icon>
                            </button>

                            <button class="action-delete-btn">
                                <ion-icon name="bag-remove-outline"></ion-icon>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        
        </div>

    <div class="order-cash-container">

        <div class="order-summary-container">
            <h3 class="order-summary">Order Summary</h3>

            <div class="order-summary-item">
                <h3 style="font-weight: 100;">Red T-shirt</h3>
                <p style="font-weight: 100;">S x 1</p>
            </div>

            <div class="order-summary-item">
                <h3 style="font-weight: 100;">Jordan 1</h3>
                <p style="font-weight: 100;">41 x 1</p>
            </div>

            <hr>

            <div class="checkout-container">
                <span class="estimated-price"><strong>Estimated Price:</strong></span>

                <span class="subtotal-price"><strong>&#x20B1; 12,399</strong></span>
            </div>


            <form action="">
                <button type="submit" class="checkout-btn">Checkout Now (2)</button>
            </form>
        </div>

        <div class="cash-summary-container">
            <h3 class="cash-summary">We Accept</h3>

            <div class="main-cash-container">

                <img src="gcash/cod.png" alt="COD">
                <img src="gcash/gcash.png" alt="GCASH">

            </div>
            
        </div>

    </div>

    </div>

</div>

<?php
    include 'includes/footer.php';
?>