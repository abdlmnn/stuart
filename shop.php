<?php
    $title = 'Shop';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->customerOnly();

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    
    include 'message.php';
?>

    <div class="item-container">

    
        <div class="card">

            <div class="card-image">
                <img src="images/shoes3.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Red Sneaker</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt2.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt3.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shoes2.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Air Force Ones Nike Air</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt2.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt3.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shirt1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">T-shirt</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/shoes1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Shoes</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>

        <div class="card">

            <div class="card-image">
                <img src="images/heel1.png" alt="" class="image-item">
            </div>

            <div class="description-container">
                <div class="item-description">
                    <h1 class="item-name">Heel</h1>
                    <p class="item-price">&#x20B1;999</p>
                </div>

                <div class="add-to-cart">
                    <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                </div>
            </div>

        </div>
        
    </div>

<?php
    include 'includes/footer.php';
?>
