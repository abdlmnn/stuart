<?php   
    $title = 'Shop';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    
    include_once 'controllers/AuthenticateController.php';
    include_once 'admin/controllers/InventoryController.php';
    
    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;

    include 'includes/header.php';
    include 'includes/navbar.php';
    include 'includes/cart.php';
    include 'includes/categories.php';
    
    include 'message.php';
?>

    <!-- if the user is logged in it can access the landing page add order -->
    <?php if(isset($_SESSION['authenticated'])) : ?>

        <div class="item-container">

            <?php if(isset($_GET['category']) && $_GET['category'] == 'Men Clothing') : ?>

            <?php
                            // displayMen came from my Class InventoryController 
                $resultGetMen = $inventory->displayMen();

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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetMen as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

            <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                        </div>

                        <div class="add-to-cart">
                            <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                        </div>
                    </div>

                </div>

            </a>
            
            <?php 
                    endforeach;
                }   
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Women Clothing') : ?>

            <?php
                                // displayWomen came from my Class InventoryController 
                $resultGetWomen = $inventory->displayWomen();

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
                        No item
                    </h1>
                    </section>");
                    // redirect('No item found','view-landing.php?category=Women');
                }else{
                    foreach($resultGetWomen as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Men Footwear') : ?>

            <?php
                                // displayMenFootwear came from my Class InventoryController 
                $resultGetMenFootwear = $inventory->displayMenFootwear();

                if(!$resultGetMenFootwear){
                    
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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetMenFootwear as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Women Footwear') : ?>

            <?php
                                // displayWomenFootwear came from my Class ItemController 
                $resultGetWomenFootwear = $inventory->displayWomenFootwear();

                if(!$resultGetWomenFootwear){
                    
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
                        No item
                    </h1>
                    </section>");
                    // redirect('No item found','view-landing.php?category=Women');
                }else{
                    foreach($resultGetWomenFootwear as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Accessories') : ?>

            <?php
                                // displayWomen came from my Class ItemController 
                $resultGetAccessories = $inventory->displayAccessories();

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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAccessories as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php else : ?>

                <?php 
                            // displayAll came from my Class InventoryController 
                $resultGetAll = $inventory->displayAll();

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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAll as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

            <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        <input type="hidden" name="itemImage" value="<?= $data['image'] ?>">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                        </div>

                        <div class="add-to-cart">
                            <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                        </div>
                    </div>

                </div>

            </a>
        
            <?php
                    endforeach;
                }
            ?>

            <?php endif; ?>    
                
        </div>

            <!-- <div id="itemModal" class="view-modal-container">
                <div class="first-child-container">
                    <div class="second-child-container">
                        <div class="item-modal-container">
                            <span class="close-modal">&times;</span>
                            <div id="content">

                            </div>
                        </div>
                    </div>
                </div>
            </div> -->









































        
    
    <!-- if the user is not log in it can access the landing page but can't add order -->
    <?php else : ?>

        <div class="item-container">

            <?php if(isset($_GET['category']) && $_GET['category'] == 'Men Clothing') : ?>

            <?php
                            // displayMen came from my Class InventoryController 
                $resultGetMen = $inventory->displayMen();

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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetMen as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

            <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                        </div>

                        <div class="add-to-cart">
                            <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                        </div>
                    </div>

                </div>

            </a>
            
            <?php 
                    endforeach;
                }   
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Women Clothing') : ?>

            <?php
                                // displayWomen came from my Class InventoryController 
                $resultGetWomen = $inventory->displayWomen();

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
                        No item
                    </h1>
                    </section>");
                    // redirect('No item found','view-landing.php?category=Women');
                }else{
                    foreach($resultGetWomen as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Men Footwear') : ?>

            <?php
                                // displayMenFootwear came from my Class InventoryController 
                $resultGetMenFootwear = $inventory->displayMenFootwear();

                if(!$resultGetMenFootwear){
                    
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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetMenFootwear as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Women Footwear') : ?>

            <?php
                                // displayWomenFootwear came from my Class ItemController 
                $resultGetWomenFootwear = $inventory->displayWomenFootwear();

                if(!$resultGetWomenFootwear){
                    
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
                        No item
                    </h1>
                    </section>");
                    // redirect('No item found','view-landing.php?category=Women');
                }else{
                    foreach($resultGetWomenFootwear as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php elseif(isset($_GET['category']) && $_GET['category'] == 'Accessories') : ?>

            <?php
                                // displayWomen came from my Class ItemController 
                $resultGetAccessories = $inventory->displayAccessories();

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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAccessories as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

                <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                    <div class="card">

                        <div class="card-image">
                            <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        </div>

                        <div class="description-container">
                            <div class="item-description">
                                <h1 class="item-name"><?= $data['name'] ?></h1>
                                <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                            </div>

                            <div class="add-to-cart">
                                <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                            </div>
                        </div>

                    </div>

                </a>

            <?php
                    endforeach;
                }
            ?>

            <?php else : ?>

                <?php 
                            // displayAll came from my Class InventoryController 
                $resultGetAll = $inventory->displayAll();

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
                        No item
                    </h1>
                    </section>");
                }else{
                    foreach($resultGetAll as $itemRows) :

                        $data = $inventory->rows($itemRows);
            ?>

            <a href="add-item-order.php?itemID=<?= $data['id'] ?>" class="add-cart-button">

                <div class="card">

                    <div class="card-image">
                        <img src="images/<?= $data['image'] ?>" alt="" class="image-item">
                        <input type="hidden" name="itemImage" value="<?= $data['image'] ?>">
                    </div>

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                        </div>

                        <div class="add-to-cart">
                            <ion-icon name="bag-add-outline" class="cart-logo"></ion-icon>
                        </div>
                    </div>

                </div>

            </a>
        
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