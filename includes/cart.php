<?php if(isset($_SESSION['authenticated'])) : ?>
<!-- <div class="cart-icon-container">
    <span class="total-item">10</span>
    <ion-icon name="cart-outline" class="cart-icon" style="color: #111; cursor: pointer; font-size: 25px;" id="cartOpen"></ion-icon>
</div> -->

<div class="cart-container" id="cartContainer">
    <div class="close-cart" id="cartClose">
        <ion-icon name="chevron-back-outline" class="close-icon"></ion-icon>
    </div>

    <h1 class="cart-title">Order</h1>

    <div class="cart-item-container">
        <div class="each-cart">
            <div class="cart-image-container">
                <img src="images/shirt1.png" alt="" class="cart-image">
            </div>

            <div class="cart-description">
                <h1 class="cart-item-name">T shirt red</h1>
                <p class="cart-item-totalprice">&#x20B1; 199</p>
                <p class="cart-item-size">size : L</p>
                <div class="quantity-controls">
                    <button class="quantity-button minus">-</button>
                    <span class="quantity-display">1</span>
                    <button class="quantity-button plus">+</button>
                </div>
                <button class="remove-button">
                    <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <div class="cart-item-container">
        <div class="each-cart">
            <div class="cart-image-container">
                <img src="images/shirt2.png" alt="" class="cart-image">
            </div>

            <div class="cart-description">
                <h1 class="cart-item-name">T shirt black</h1>
                <p class="cart-item-totalprice">&#x20B1; 599</p>
                <p class="cart-item-size">size : S</p>
                <div class="quantity-controls">
                    <button class="quantity-button minus">-</button>
                    <span class="quantity-display">1</span>
                    <button class="quantity-button plus">+</button>
                </div>
                <button class="remove-button">
                    <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <div class="cart-item-container">
        <div class="each-cart">
            <div class="cart-image-container">
                <img src="images/shoes1.png" alt="" class="cart-image">
            </div>

            <div class="cart-description">
                <h1 class="cart-item-name">Running shoe</h1>
                <p class="cart-item-totalprice">&#x20B1; 1299</p>
                <p class="cart-item-size">size : 42</p>
                <div class="quantity-controls">
                    <button class="quantity-button minus">-</button>
                    <span class="quantity-display">1</span>
                    <button class="quantity-button plus">+</button>
                </div>
                <button class="remove-button">
                    <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <div class="cart-item-container">
        <div class="each-cart">
            <div class="cart-image-container">
                <img src="images/shoes2.png" alt="" class="cart-image">
            </div>

            <div class="cart-description">
                <h1 class="cart-item-name">Air Jordan</h1>
                <p class="cart-item-totalprice">&#x20B1; 2599</p>
                <p class="cart-item-size">size : 44</p>
                <div class="quantity-controls">
                    <button class="quantity-button minus">-</button>
                    <span class="quantity-display">1</span>
                    <button class="quantity-button plus">+</button>
                </div>
                <button class="remove-button">
                    <ion-icon name="close-outline" class="remove-cart-icon"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <div class="cart-checkout-container">
        <div class="total-price-container">
            <p class="total-price-display">Total : <span id="total-Price">&#x20B1; 299</span></p>
            <button type="submit" class="remove-button">Checkout</button>
        </div>
        <!-- <div class="checkout-button-container">
        </div> -->
    </div>
</div>
<?php endif; ?>