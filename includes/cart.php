<?php if(isset($_SESSION['authenticated'])) : ?>
    
    <div class="cart-container" id="cartContainer">
        
        <div class="close-cart" id="cartClose">
            <ion-icon name="chevron-back-outline" class="close-icon"></ion-icon>
        </div>

        <h1 class="cart-title">Order</h1>
        
        <?php if(isset($_SESSION['order'])) : ?>    

            <?php foreach ($_SESSION['order'] as $key => $value) : ?>
            
            <div class="cart-item-container">

                <div class="each-cart">

                    <div class="cart-image-container">
                        <img src="images/<?= $value['image'] ?>" alt="" class="cart-image">
                    </div>

                    <div class="cart-description">
                        <h1 class="cart-item-name"><?= $value['name'] ?></h1>

                        <p class="cart-item-totalprice">&#x20B1; <?= number_format($value['price']) ?></p>
                        
                        <p class="cart-item-size">size : L</p>

                        <div class="quantity-controls">
                            <button class="quantity-button minus">-</button>
                                <span class="quantity-display">1</span>
                            <button class="quantity-button plus">+</button>
                        </div>

                        <div class="cart-button-action">
                            <button class="remove-button">
                                <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon>
                            </button>
                            <!-- <button class="remove-button">
                                <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon>
                            </button> -->
                        </div>

                    </div>

                </div>

            </div>

            <?php endforeach; ?>
            
        <div class="cart-checkout-container">

            <div class="total-price-container">
                <p class="total-price-display">Total : <span id="total-Price">&#x20B1; 0</span></p>
                <button type="submit" class="remove-button-two">View Order</button>
            </div>
            
        </div>

        <?php else : ?>

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