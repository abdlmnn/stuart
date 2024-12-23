<?php   
    $title = 'Shop';

    include 'config/connect.php';

    include 'codes/authentication-code.php';
    include 'codes/cart-code.php';
    
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

<style>
.view-modal-container {
    /* border: 1px solid red; */
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
    /* background-color: rgba(0, 0, 0, 0.2); */
    z-index: 1050;
    overflow: auto;
    display: none;
    margin: 0 auto 5rem;
}

.view-modal-container.show-modal {
    display: flex;
}

.first-child-container {
    /* background: #fff; */
    max-width: 900px;
    /* max-width: 600px; */
    width: 90%;
    /* border: 3px solid red; */
    overflow: hidden;
    /* border-radius: 10px; */
}

.second-child-container {
    display: flex;
    padding: 15px;
    gap: 15px;
    /* border: 3px solid red; */
}

.item-modal-container {
    display: grid;
    grid-template-columns: 1fr 1fr; 
    grid-gap: 20px;
    width: 100%;
    max-width: 1200px;
    /* max-width: 700px; */
    /* height: 100vh; */
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.1);
    justify-content: center;
    align-items: center;
    /* border: 3px solid red; */
}

.item-image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 100%;
    width: 100%;
    /* background-color: #dfdada52; */
}

/* .item-image-container:hover {
    background-color: #dfdada52;
} */

.child-image-container .item-images {
    width: 70%;
    /* height: 100%; */
    object-fit: cover;
    /* border-radius: 8px; */
}

.item-info-container {
    /* width: 60%;
    border: 3px solid red;
    display: flex;
    flex-direction: column;
    justify-content: space-between;  */
    display: flex;
    flex-direction: column;
    justify-content: space-between; 
}

.item-category {
    color: #333;
    opacity: .5;
    font-weight: bold;
    font-size: 1.5em;
    /* border: 3px solid red; */
}

.item-name {
    font-size: 2.2em;
    margin: 5px 0;
    color: #111;
    /* border: 3px solid red; */
}

.item-quantity {
    font-size: 1rem;
    color: #7777779a;
    margin-bottom: 5px;
    /* border: 3px solid red; */
}

.item-price-container {
    font-size: 1.5em;
    font-weight: bold;
    margin: 5px 0;
    /* border: 3px solid red; */
}

.item-price {
    color: #E2A500;
    /* border: 3px solid red; */
}

.item-size-container {
    /* border: 3px solid red; */
    /* padding: 25px; */
    margin-bottom: 20px;
}

.item-size-name {
    /* font-size: .7rem; */
    font-size: 1rem;
    font-weight: bold;
    margin-top: 5px;
    margin-bottom: 5px; 
}

.size-option-container {
    /* border: 1px solid red; */
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.size-option {
    /* border: 1px solid red; */
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    border: 1px solid #cccccca1;
    border-radius: 50%;
    text-align: center;
    font-size: .9rem;
    font-weight: bold;
    cursor: pointer;
    position: relative;
    background-color: transparent;
}

.size-option:hover {
    border: 1px solid #232323;
}

.size-option input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.size-option input[type="radio"]:checked + .size-content {
    border: 1px solid #232323;
}

.size-content {
    /* border: 1px solid red;   */
    display: block;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.stock-quantity {
    /* border: 1px solid red; */
    display: block;
    font-size: 10px;
    color: #7777779a;
    position: absolute;
    bottom: -20px;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.item-quantity-container {
    margin-top: 10px;
    margin-bottom: 15px;
    /* border: 1px solid red; */
    display: flex;
    align-items: center;
    gap: 15px;
}

.item-quantity-name {
    font-size: .8rem;
    font-weight: 500;
    /* margin-bottom: 5px; */
    /* border: 1px solid red; */
}

/* .quantity-selector {
    display: flex;
    align-items: center;
    gap: 5px;
} */

.quantity-button {
    width: 35px;
    height: 35px;
    /* background-color:#f7f6f7; */
    background-color: transparent;
    border: 1px solid #cccccca1;
    border-radius: 25px;
    /* border: none; */
    /* border-radius: 0; */
    font-size: .9rem;
    cursor: pointer;
    text-align: center;
    font-weight: bold;
}

.quantity-button:hover {
    border: 1px solid #232323;
    background-color: transparent;
    color: #111;
}

.quantity-input {
    width: 35px;
    height: 35px;
    text-align: center;
    border: none;
    /* border: 1px solid #111; */
    background-color: transparent;
    outline: none;
    font-size: 1rem;
    color: #E2A500;
    font-weight: bold;
    /* border-radius: 8px; */
}

.add-to-cart-button {
    width: 55%;
    padding: 15px;
    background-color: #111;
    color: white;
    border: none;
    text-align: center;
    cursor: pointer;
    font-weight: 600;
    transition: opacity 0.3s ease;
}

.add-to-cart-button:hover {
    opacity: 0.8;
}

@media (max-width: 1024px) {
    .item-modal-container {
        grid-template-columns: 1fr 1fr; /* Keep the two columns, just reduce size */
        grid-gap: 20px;
    }

    .item-image-container, .item-info-container {
        padding: 0px;
    }

    .child-image-container .item-images {
        width: 70%;
        /* height: 100%; */
        object-fit: cover;
        /* border-radius: 8px; */
    }

    .item-category {
        font-size: 1.2em; /* Slightly reduce font size */
    }

    .item-name {
        font-size: 2em; /* Slightly reduce font size */
    }

    .item-price-container {
        font-size: 1.3em; /* Slightly reduce font size */
    }
}
@media (max-width: 785px) {

    .item-modal-container {
        grid-template-columns: 1fr; 
        padding: 0; 
        width: 90%; 
        /* height: 42%; */
        /* height: auto; */
    }

    .item-info-container {
        padding: 25px; 
    }

    .item-image-container {
        /* position: relative;
        top: 25px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.5); */
        /* margin-top: 25px; */
        padding-top: 35px;
        /* border: 1px solid red; */
    }

    .child-image-container .item-images {
        width: 50%;
        object-fit: cover;
    }

    .item-category {
        font-size: 1em; 
    }

    .item-name {
        font-size: 1.5em; 
    }

    .item-quantity {
        font-size: .8rem;
    }

    .item-price-container {
        font-size: 1.3em; 
    }

    .size-button {
        font-size: 0.9rem; 
    }

    .quantity-button {
        width: 35px;
        height: 35px;
        font-size: .9em;
    }

    .quantity-input {
        width: 50px;
        height: 30px;
        font-size: 1em;
    }

    .add-to-cart-button {
        padding: 12px; 
        font-size: 0.8em; 
        width: 100%;
    }
}


</style>

    <div id="itemModal" class="view-modal-container">
        
        <div class="first-child-container">
            
            <div class="second-child-container">
                
                <form action="" method="post">

                    <div class="item-modal-container">

                            <!-- View Modal -->
                            <!-- Content -->

                    </div>

                </form>

            </div>

        </div>

    </div>



    


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

                        <div class="add-to-cart view-data">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                        <div class="add-to-cart view-data">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                        <div class="add-to-cart view-data">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

                            <div class="add-to-cart view-data">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
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
                    </div>

                    <input type="hidden" name="id" value="<?= $data['id'] ?>">

                    <div class="description-container">
                        <div class="item-description">
                            <h1 class="item-name"><?= $data['name'] ?></h1>
                            <p class="item-price">&#x20B1; <?= number_format($data['price']) ?></p>
                        </div>

                        <div class="add-to-cart view-data">
                            <input type="hidden" name="id" value="<?= $data['id'] ?>">
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

<script>
    $(document).ready(function () {
        $('.view-data').click(function (e) {
            e.preventDefault();

            var id = $(this).find('input[name="id"]').val();

            $.ajax({
                method: "POST",
                url: "codes/modal-code.php",
                data: {
                    'click_view_bttn': true,
                    'id': id,
                },
                success: function(response) {

                    $('.item-modal-container').html(response);

                    $('#itemModal').addClass('show-modal'); 
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred:", status, error);
                }
            });
        });

        // $(document).on('click', '.close-modal', function () {
        //     $('#itemModal').removeClass('show-modal');
        // });

        $(document).mouseup(function(e) {
            var modalContent = $(".item-modal-container");

            if (!modalContent.is(e.target) && modalContent.has(e.target).length === 0) {

                $('#itemModal').removeClass('show-modal');
            }

        });
    });
</script>