<div class="header">

    <div class="hamburger" onclick="toggleModal()">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <?php if(isset($_SESSION['authenticated'])) : ?>

        <div class="company-name">
            <a href="<?= base_url('view-landing.php') ?>" class="a-link">Stuart Boutique</a>
        </div>

    <?php else : ?>

        <div class="company-name" style="padding-left: 0;">
            <a href="<?= base_url('view-landing.php') ?>" class="a-link">Stuart Boutique</a>
        </div>

    <?php endif; ?>

    <div class="right-item">

    <?php if(isset($_SESSION['authenticated'])) : ?>

        <form action="" method="post">
            <button type="submit" name="logout-button" class="logout-btn">
                <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
            </button>
        </form>

        <a href="<?= base_url('view-profile.php') ?>" class="a-link">
            <ion-icon name="person-outline" class="user-icon"></ion-icon>
        </a>

        <!-- <a href="#" class="a-link">
            <span class="total-notification">5</span>
            <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
        </a> -->

        <!-- <a href="<?= base_url('view-cart.php') ?>" class="a-link">
            <span class="total-item">10</span>
            <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
            <ion-icon name="cart-outline" class="cart-icon"></ion-icon>
        </a> -->

        <div class="cart-icon-container">
            <span class="total-item">
                <?php if(isset($_SESSION['cart'])) : ?>

                    <?php $totalQuantity = 0; ?>

                    <!-- first array cart, second array inventoryID then value -->
                    <?php foreach ($_SESSION['cart'] as $inventoryID => $inventoryData): ?>

                        <!-- third array item, fourth array size then data inside of cart array -->
                        <?php foreach ($inventoryData['item'] as $size => $data) : ?>

                            <?php $totalQuantity = $totalQuantity + $data['quantity']; ?>

                        <?php endforeach; ?>

                    <?php endforeach; ?>

                    <?php echo $totalQuantity; ?>

                <?php else : ?>

                    <?php echo '0' ?>

                <?php endif; ?>
                
            </span>
            <ion-icon name="bag-outline" class="cart-icon" style="color: #fff; cursor: pointer;" id="cartOpen" onclick="cartOpen()"></ion-icon>
        </div>
        
    <?php else : ?>
        
        <div class="container" style="display: flex; justify-content: center; align-content: center; gap:30px;">

            <a href="<?= base_url('view-landing.php') ?>" class="a-link">Shop</a>
            <a href="<?= base_url('add-register.php') ?>" class="a-link">Register</a>
            <a href="<?= base_url('view-login.php') ?>" class="a-link">Login</a>
            
        </div>

    <?php endif; ?>

    </div>
</div>


<div class="modal-content">

    <?php if(isset($_SESSION['authenticated'])) : ?>

        <form action="" method="post">
            <button type="submit" name="logout-button" class="logout-btn">
                <ion-icon name="log-out-outline" class="logout-icon"></ion-icon>
            </button>
        </form>

        <a href="<?= base_url('view-profile.php') ?>">
            <ion-icon name="person-outline" class="user-icon"></ion-icon>
        </a>

        <!-- <a href="#" class="a-link">
            <span class="total-notification">5</span>
            <ion-icon name="notifications-outline" class="notification-icon"></ion-icon>
        </a> -->

        <!-- <a href="<?= base_url('shop.php') ?>" class="a-link">
            <ion-icon name="bag-outline" class="cart-icon"></ion-icon>
        </a> -->

        <a href="#" class="a-link">
            Men Clothing
        </a>

        <a href="#" class="a-link">
            Women Clothing
        </a>

        <a href="#" class="a-link">
            Men Shoes
        </a>

        <a href="#" class="a-link">
            Women Shoes
        </a>

        <a href="#" class="a-link">
            Accessories
        </a>

    <?php else : ?>

        <a href="<?= base_url('add-register.php') ?>" class="a-link">Register</a>
        <a href="<?= base_url('view-login.php') ?>" class="a-link">Login</a>

    <?php endif; ?>
</div>