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
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    
    include 'message.php';
?>

<link rel="stylesheet" href="css/mycart.css?v5.5">

<?php if(isset($_SESSION['authenticated'])) : ?>

    <?php if(!empty($_SESSION['cart']) && isset($_SESSION['cart'])) : ?>

<div class="main-cart-item-container">
    
    <div class="main-text-display">
        <div class="text-cont">
            <p class="text-selected">Cart</p> >
            <p class="text-display">Place Order</p> >
            <p class="text-display">Pay</p> >
            <p class="text-display">Order Complete</p>
        </div>

        <!-- <a href="view-landing.php" class="continue-button"><h1 class="text-continue">
            CONTINUE SHOPPING >
        </h1></a> -->
    </div>

    <div class="child-cart-container">

        <div class="cart-info-container">

            <section class="item-button">

            <?php if(isset($_SESSION['cart'])) : ?>

            <?php $totalQuantity = 0; ?>

                <!-- first array cart, second array inventoryID then value -->
                <?php foreach ($_SESSION['cart'] as $inventoryID => $inventoryData): ?>

                    <!-- third array item, fourth array size then data inside of cart array -->
                    <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                        <?php $totalQuantity = $totalQuantity + $data['quantity']; ?>

                    <?php endforeach; ?>

                <?php endforeach; ?>

                <h2 class="all-items">ALL ITEMS (<?= $totalQuantity; ?>)</h2>

            <?php endif; ?>

                <form action="" method="post">

                    <input type="hidden" name="inventoryID" class="inventoryID" value="<?= $data['id'] ?>">
                    <input type="hidden" name="sizeID" class="inventoryID" value="<?= $data['size'] ?>">

                    <button type="submit" name="delete-all-order-button" class="action-delete-all-btn">
                        CLEAR ALL
                    </button>
                    
                </form>

            </section>

        <!-- first array cart, second array inventoryID then value -->
        <?php foreach($_SESSION['cart'] as $inventoryID => $inventoryData) : ?>

            <!-- third array item, fourth array size then data inside of cart array -->
            <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                <?php 
                    $sizeID = $data['size'];

                    // print_r($size);
                    // print_r($inventoryID);

                             // getSizeName came from my Class SizesController
                    $sizeRow = $sizes->getSizeName($sizeID);
                ?>
                
                <div class="cart-items">

                    <img src="images/<?= $data['image']; ?>" alt="<?= $data['name']; ?>">

                    <div class="cart-items-info">
                        <h4 class="cart-item-name"><?= $data['name']; ?></h4>
                        
                        <p class="cart-item-price">&#x20B1; <?= number_format($data['price'] * $data['quantity']); ?></p>

                    <!-- <div class="cart-size-quantity-container"> -->

                    <p class="cart-item-size">size: <?= $sizeRow['sizeName']; ?></p>
                    
                    <form action="" method="post">

                    <div class="item-quantity-container">
                        <!-- <h6 class="item-quantity-name">Qty:</h6> -->

                        <div class="quantity-selector qtyBox">
                            <!-- <input type="hidden" name="inputID" class="inventoryID" value="<?= $id ?>"> -->

                            <button type="button" class="quantity-button decrement">-</button>

                            <input type="number" name="inputQuantity" class="qty quantity-input" value="<?= $data['quantity']; ?>" min="0">

                            <button type="button" class="quantity-button increment">+</button>
                        </div>
                    </div>

                    <!-- </div> -->

                    <!-- <form action="" method="post"> -->
                        <div class="cart-item-delete">
                            
                            <button type="submit" name="update-quantity-order-button" class="action-update-btn" value="">
                                <ion-icon name="bag-check-outline"></ion-icon>
                            </button>

                            <input type="hidden" name="inventoryID" class="inventoryID" value="<?= $data['id'] ?>">
                            <input type="hidden" name="sizeID" class="inventoryID" value="<?= $data['size'] ?>">
                            
                            <button type="submit" name="delete-order-button" class="action-delete-btn" value="">
                                <ion-icon name="bag-remove-outline"></ion-icon>
                            </button>

                        </div>
                    </form>

                </div>

            </div>

            <?php endforeach; ?>
            
        <?php endforeach; ?>

        </div>

        <div class="order-cash-container">

            <div class="order-summary-container">
                <h3 class="order-summary">Order Summary</h3>

                <?php $total = 0; ?>

                <?php foreach($_SESSION['cart'] as $inventoryID => $inventoryData) : ?>

                    <?php foreach($inventoryData['item'] as $size => $data) : ?>

                        <?php 
                            $sizeID = $data['size'];

                                    // getSizeName came from my Class SizesController
                            $sizeRow = $sizes->getSizeName($sizeID);

                            $total = $total + $data['price'] * $data['quantity'];
                        ?>

                        <div class="order-summary-item">
                            <h3 style="font-weight: 100;"><?= $data['name'] ?></h3>
                            <p style="font-weight: 100;">
                                <?= $sizeRow['sizeName'] ?> 
                                x 
                                <?= $data['quantity'] ?>
                            </p>
                        </div>

                    <?php endforeach; ?>
            
                <?php endforeach; ?>

                <hr>

                <div class="checkout-container">
                    <span class="estimated-price"><strong>Estimated Price:</strong></span>

                    <span class="subtotal-price"><strong>&#x20B1; <?= number_format($total) ?></strong></span>
                </div>


                <form action="" method="post">
                    <?php $totalQuantity = 0; ?>

                    <!-- first array cart, second array inventoryID then value -->
                    <?php foreach ($_SESSION['cart'] as $inventoryID => $inventoryData): ?>

                        <!-- third array item, fourth array size then data inside of cart array -->
                        <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                            <?php $totalQuantity = $totalQuantity + $data['quantity']; ?>

                        <?php endforeach; ?>

                    <?php endforeach; ?>
                    
                    <div class="checkout-btn-container" style="display: flex; flex-direction: column; gap: 10px; width: 100%;">

                        <button type="submit" name="add-checkout-button" class="checkout-btn">Checkout Now (<?php echo $totalQuantity; ?>)</button>

                        <button type="button" onclick="shopping()" class="checkout-btn">Continue Shopping</button>

                    </div>
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

        <?php endif; ?>

<?php endif; ?>


    
    <?php if(!isset($_SESSION['cart']) || empty($_SESSION['cart']) && count($_SESSION['cart']) === 0) : ?>

<div class="main-cart-item-container" style="height: 100%;">
    
    <div class="main-text-display">
        <div class="text-cont">
            <p class="text-selected">Cart</p> >
            <p class="text-display">Place Order</p> >
            <p class="text-display">Pay</p> >
            <p class="text-display">Order Complete</p>
        </div>
    </div>

    <div class="child-cart-container" style="height: 100%;">

        <div class="cart-info-container">

            <section class="item-button">

                <h2 class="all-items">ALL ITEMS</h2>

                    <button type="button" class="action-delete-all-btn">
                        Delete All
                    </button>

            </section>

            <div class="empty-container">
                <h1>Empty Cart</h1>
            </div>

        </div>

        <div class="order-cash-container">

            <div class="order-summary-container">
                <h3 class="order-summary">Order Summary</h3>

                <hr>

                <div class="checkout-container">
                    <span class="estimated-price"><strong>Estimated Price:</strong></span>

                    <span class="subtotal-price"><strong>&#x20B1; 0</strong></span>
                </div>

                <form action="" method="post">
                <div class="checkout-btn-container" style="display: flex; flex-direction: column; gap: 10px; width: 100%;">
                    <button type="submit" name="add-checkout-button" class="checkout-btn">Checkout Now</button>
                    <button type="button" onclick="shopping()" class="checkout-btn">Continue Shopping</button>
                </div>
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

<?php endif; ?>

<script>
    function shopping(){
        window.location.href = 'view-landing.php';
    }
</script>
<?php
    include 'includes/footer.php';
?>