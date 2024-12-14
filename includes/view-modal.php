<?php if(isset($_SESSION['authenticated'])) : ?>

<div id="itemModal" class="view-modal-container">

    <div class="first-child-container">

        <div class="second-child-container">

            <div class="item-modal-container">
                        
                <div class="item-image-container">
                    <div class="child-image-container">
                        <img src="images/shirt1.png" alt="" class="item-images">
                    </div>
                </div>

                <div class="item-info-container">
                    <h5 class="item-category">Top / Men</h5>
                    <p class="item-name">Running Shoe</p>
                    <p class="item-quantity">5 item left</p>

                    <div class="item-price-container">
                        <span class="item-price">&#x20B1; 2,999</span>
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

                    <div class="add-cart-container">
                        <button class="add-to-cart-button">
                            ADD TO CART
                        </button>
                    </div>

                </div>

            </div>

        </div>

     </div>

</div>

<?php else : ?>

<div id="itemModal" class="view-modal-container">

    <div class="first-child-container">

        <div class="second-child-container">

            <div class="item-modal-container">
                        
                <div class="item-image-container">
                    <div class="child-image-container">
                        <img src="images/shoes1.png" alt="" class="item-images">
                    </div>
                </div>

                <div class="item-info-container">
                    <h5 class="item-category">Top / Men</h5>
                    <p class="item-name">Running Shoe</p>
                    <p class="item-quantity">5 item left</p>

                    <div class="item-price-container">
                        <span class="item-price">&#x20B1; 2,999</span>
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

                    <div class="add-cart-container">
                        <button class="add-to-cart-button">
                            ADD TO CART
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php endif; ?>