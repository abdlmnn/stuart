<?php if(isset($_SESSION['authenticated'])) : ?>
    
    <div class="cart-container" id="cartContainer">
        
        <div class="close-cart" id="cartClose">
            <ion-icon name="chevron-back-outline" class="close-icon"></ion-icon>
        </div>

        <h1 class="cart-title">Order</h1>
     
        <!-- if the session order array is not empty -->
            <?php 
                include_once 'controllers/CartController.php';

                $cart = new CartController;

                // if sesssion order array is not empty
                if(!empty($_SESSION['order']) && isset($_SESSION['order'])) :

                // print_r($_SESSION['order']);

                $total = 0;

                foreach($_SESSION['order'] as $id => $data) : 

                        $itemTotalPrice = $data['price'] * $data['quantity'];

                        $total = $total + $itemTotalPrice;
            ?>
            <form action="" method="post">
            <div class="cart-item-container">

                <div class="each-cart">

                    <div class="cart-image-container">
                        <img src="images/<?= $data['image'] ?>" alt="<?= $data['name'] ?>" class="cart-image">
                    </div>

                    <div class="cart-description">
                        <h1 class="cart-item-name"><?= $data['name'] ?></h1>

                        <p class="cart-item-totalprice">&#x20B1; <?= number_format($data['price']) ?></p>
                        
                        <p class="cart-item-size">size : L</p>

                        
                        <div class="quantity-controls">
                            
                            <button type="button" class="quantity-button minus">-</button>
                        
                            <input type="number" name="updateQuantity" class="quantity-input" min="0" value="<?= $data['quantity'] ?>">

                            <button type="button" class="quantity-button plus">+</button>

                        </div>

                        <div class="cart-button-action">

                            <button type="submit" name="update-quantity-order-button" class="remove-button" value="<?= $id ?>">
                                <ion-icon name="bag-check-outline"></ion-icon>
                            </button>

                            <button type="submit" name="delete-order-button" class="remove-button" value="<?= $id ?>">
                                <!-- <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon> -->
                                <ion-icon name="bag-remove-outline"></ion-icon>
                            </button>

                        </div>
                        
                    </div>

                </div>

            </div>

            <?php 

                endforeach; 
            ?>
            
        <div class="cart-checkout-container">

            <div class="total-price-container">
                <p class="total-price-display">Total : <span id="total-Price">&#x20B1; <?=number_format( $total) ?></span></p>

                <button type="button" class="remove-button-two">View Order (<?= count($_SESSION['order']) ?>)</button>

                <button type="submit" name="delete-all-order-button" class="remove-button-two">Clear All</button>
            </div>
            
        </div>
        
        </form>

        <?php endif; ?>

        <!-- if the session order array is empty -->
        <?php if(empty($_SESSION['order'])) : ?>

            <p 
            style="
                /* border: 1px solid red; */
                margin: 200px auto;
                opacity: 0.5;
                font-size: 1rem;
            ">
                Place an Order
            </p>

        <?php endif; ?>
            
    </div>

<?php endif; ?>