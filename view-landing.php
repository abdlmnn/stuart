<?php
    $title = 'Shop';

    include 'config/connect.php';

    include 'codes/authentication-code.php'; 
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'controllers/ItemController.php';
    $authenticated = new AuthenticateController;
    $item = new ItemController;

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    include 'includes/categories.php';
    
    include 'message.php';
?>

    <!-- if the user is logged in it can access the landing page add order -->
    <?php if(isset($_SESSION['authenticated']) === true) : ?>

        <div class="item-container">

            <?php if(isset($_GET['category']) && $_GET['category'] == 'Men') : ?>

            <?php
                            // displayMen came from my Class ItemController 
                $resultGetMen = $item->displayMen();

                if(!$resultGetMen){
                    
                    exit("
                        <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                        >
                    <h1 
                        style='
                            // box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            color: red;
                        '
                    >
                        Item is empty
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetMen as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

            <form action="" method="post">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?> / <?= $data['gender'] ?></h1>
                            <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                        </div>

                        <div class="add-to-cart">
                            <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                            <button type="submit" class="add-cart-button">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </button>
                        </div>
                    </div>

                </div>

            </form>
            
            <?php 
                    endforeach;
                }   
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Women') : ?>

            <?php
                                // displayWomen came from my Class ItemController 
                $resultGetWomen = $item->displayWomen();

                if(!$resultGetWomen){
                    
                    exit("
                    <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                    >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >
                        Item is empty
                    </h1>
                    </section>");
                    // redirect('No item found','view-landing.php?category=Women');
                }else{
                    foreach($resultGetWomen as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

                <form action="" method="post">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?> / <?= $data['gender'] ?></h1>
                                <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                            </div>

                            <div class="add-to-cart">
                                <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                                <button type="submit" class="add-cart-button">
                                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Accessories') : ?>

            <?php
                                // displayWomen came from my Class ItemController 
                $resultGetAccessories = $item->displayAccessories();

                if(!$resultGetAccessories){
                    
                    exit("
                    <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                    >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >
                        Item is empty
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAccessories as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

                <form action="" method="post">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?> / <?= $data['gender'] ?></h1>
                                <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                            </div>

                            <div class="add-to-cart">
                                <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                                <button type="submit" class="add-cart-button">
                                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            <?php
                    endforeach;
                }
            ?>

            <?php else : ?>

                <?php 
                            // displayAll came from my Class ItemController 
                $resultGetAll = $item->displayAll();

                if(!$resultGetAll){

                    exit("
                        <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                        >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >   
                        Item is empty
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAll as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

            <form action="" method="post">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                        </div>

                        <div class="add-to-cart">
                            <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                            <button type="submit" class="add-cart-button">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </button>
                        </div>
                    </div>

                </div>

            </form>
        
            <?php
                    endforeach;
                }
            ?>

            <?php endif; ?>    
                
        </div>
    
    <!-- if the user is not log in it can access the landing page but can't add order -->
    <?php else : ?>

        <div class="item-container">

            <?php if(isset($_GET['category']) && $_GET['category'] == 'Men') : ?>

            <?php
                            // displayMen came from my Class ItemController 
                $resultGetMen = $item->displayMen();

                if(!$resultGetMen){
                    
                    exit("
                        <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                        >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >
                        Item is empty
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetMen as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

            <form action="" method="post">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?> / <?= $data['gender'] ?></h1>
                            <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                        </div>

                        <div class="add-to-cart">
                            <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                            <button type="submit" class="add-cart-button">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </button>
                        </div>
                    </div>

                </div>

            </form>
            
            <?php 
                    endforeach;
                }   
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Women') : ?>

            <?php
                                // displayWomen came from my Class ItemController 
                $resultGetWomen = $item->displayWomen();

                if(!$resultGetWomen){
                    
                    exit("
                    <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                    >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >
                        Item is empty
                    </h1>
                    </section>");
                    // redirect('No item found','view-landing.php?category=Women');
                }else{
                    foreach($resultGetWomen as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

                <form action="" method="post">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?> / <?= $data['gender'] ?></h1>
                                <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                            </div>

                            <div class="add-to-cart">
                                <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                                <button type="submit" class="add-cart-button">
                                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Accessories') : ?>

            <?php
                                // displayWomen came from my Class ItemController 
                $resultGetAccessories = $item->displayAccessories();

                if(!$resultGetAccessories){
                    
                    exit("
                    <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                    >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >
                        Item is empty
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAccessories as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

                <form action="" method="post">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?> / <?= $data['gender'] ?></h1>
                                <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                            </div>

                            <div class="add-to-cart">
                                <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                                <button type="submit" class="add-cart-button">
                                    <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            <?php
                    endforeach;
                }
            ?>

            <?php else : ?>

                <?php 
                            // displayAll came from my Class ItemController 
                $resultGetAll = $item->displayAll();

                if(!$resultGetAll){

                    exit("
                        <section
                        style='
                            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
                            padding: 35px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            margin: 0 auto;
                            border-radius: 10px;
                        '
                        >
                    <h1 
                        style='
                            // box-shadow: 0 1px 10px rgba(0,0,0,.5);
                            padding: 35px;
                            color: red;
                        '
                    >   
                        Item is empty
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAll as $itemRows) :

                        $data = $item->rows($itemRows);
            ?>

            <form action="" method="post">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= $data['price'] ?></p>
                        </div>

                        <div class="add-to-cart">
                            <!-- <ion-icon name="cart-outline" class="cart-logo"></ion-icon> -->
                            <button type="submit" class="add-cart-button">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </button>
                        </div>
                    </div>

                </div>

            </form>
        
            <?php
                    endforeach;
                }
            ?>

            <?php endif; ?>    
                
        </div>

    <?php endif; ?>

<?php
    include 'includes/footer.php';
?>
