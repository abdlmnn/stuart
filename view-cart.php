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
    // $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    include 'includes/categories.php';
    
    include 'message.php';
?>

<style>

.main-cart-item-container {
    /* border: 2px solid red; */
    width: 90%;
    height: 100vh;
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
}

.child-cart-container {
    /* border: 2px solid red; */
    display: flex;
    justify-content: space-between;
    /* margin-top: 20px; */
}

.cart-info-container {
    flex: 3;
    background: #fff;
    padding: 20px;
    box-shadow: 0 0 15px 3px rgba(0,0,0,.1);
}

.order-summary-container {
    /* border: 2px solid red; */
    flex: 1;
    padding: 20px;
    margin-left: 20px;
    box-shadow: 0 0 15px 3px rgba(0,0,0,.1);
}

.cart-items {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.cart-items img {
    width: 100px;
    height: auto;
}

.cart-items-info {
    flex: 1;
    margin-left: 20px;
    /* border: 1px solid red; */
}

.cart-item-name {
    font-size: 1.2rem;
}

.cart-item-size {
    margin-top: 10px;
    font-size: 14px;
}

.cart-item-price {
    font-weight: bold;
    /* margin-top: 25px; */
    margin-bottom: 15px;
}

.cart-item-delete button {
    background-color: #111;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    text-align: center;
}

.order-summary-container .order-summary {
    /* border-bottom: 2px solid #f0f0f0; */
    padding-bottom: 10px;
    /* margin-bottom: 15px; */
}

.order-summary-item {
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
}

.checkout-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.estimated-price {
    font-size: 14px;
    margin-top: 10px;
    color: #111;
}

.subtotal-price {
    font-size: 24px;
    margin-top: 10px;
}

</style>

<div class="main-cart-item-container">

    <div class="child-cart-container">

        <div class="cart-info-container">

            <h2 class="all-items">All Items (2)</h2>

            <div class="cart-items">

                <img src="images/shirt1.png" alt="">

                <div class="cart-items-info">
                    <h4 class="cart-item-name">Red T-shirt</h4>
                    
                    <p class="cart-item-size">size: S</p>

                    <div class="item-quantity-container">
                        <h6 class="item-quantity-name">Qty:</h6>

                        <div class="quantity-selector qtyBox">
                            <input type="hidden" name="inputID" class="inventoryID" value="<?= $data['id'] ?>"">

                            <button type="button" class="quantity-button decrement">-</button>

                            <input type="number" name="inputQuantity" class="qty quantity-input" value="1" min="1">

                            <button type="button" class="quantity-button increment">+</button>
                        </div>
                    </div>

                    <div class="cart-item-price">&#x20B1; 399</div>

                    <form action="" method="post">
                        <div class="cart-item-delete">
                            <button class="action-update-btn">
                                Update
                            </button>
                            <button class="action-delete-btn">
                            <ion-icon name="bag-remove-outline" style="font-size: 15px;"></ion-icon>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <form action="" method="post">
                <button class="action-delete-all-btn">
                    Delete All
                </button>
            </form>

        </div>

        <div class="order-summary-container">
            <h3 class="order-summary">Order Summary</h3>

            <div class="order-summary-item">
                <h3>Red T-shirt</h3>
                <p>S</p>
                <p style="font-weight: bold;">x1</p>
            </div>

            <hr>

            <div class="checkout-container">
                <span class="estimated-price"><strong>Estimated Price:</strong></span>

                <span class="subtotal-price"><strong>&#x20B1; 399</strong></span>
            </div>


            <form action="">
                <button type="submit" class="checkout-btn">Checkout Now (1)</button>
            </form>
        </div>

    </div>

</div>

<?php
    include 'includes/footer.php';
?>