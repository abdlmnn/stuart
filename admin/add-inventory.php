<?php
    $title = 'Categories';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/CategoriesController.php';
    include_once 'controllers/SizesController.php';
    include_once 'controllers/InventoryController.php';

    $categories = new CategoriesController;
    $sizes = new SizesController;
    $inventory = new InventoryController;
    $authenticated = new AuthenticateController;

    $authenticated->adminOnly();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Inventory</h1>
    <hr>

    <div class="whole-container">
        <div class="child-cont" id="form">
            <div class="form-container">

                <h1>ADD Item</h1>

                <form action="codes/inventory-code.php" method="post" enctype="multipart/form-data">

                    <select name="inputCategory">
                        <option selected>Select Categories</option>
                        <option></option>
                        <option>Men Category:</option>
                        <?php
                                         // getMen came from my Class CategoriesController 
                            $resultGetMen = $categories->getMenCategory();

                            // if resultGetMen return false or true
                            if(!$resultGetMen){
                                
                                // it return false, it show message
                                showMessage('No Men Categories Found');
                            }else{

                                 // if the resultGetMen of get function return the result
                                 foreach($resultGetMen as $categoriesRow) :

                                                  // rows came from my Class CategoriesController
                                    $categoryData = $categories->rows($categoriesRow);
                        ?>
                            <option value="<?= $categoryData['id'] ?>">
                                <?= $categoryData['name'] ?> | <?= $categoryData['gender'] ?>
                            </option>
                        <?php
                                endforeach;
                            }
                        ?>  
                        <option></option>
                        <option>Women Category:</option>
                        <?php
                                         // getMen came from my Class CategoriesController 
                            $resultGetWomen = $categories->getWomenCategory();

                            // if resultGetWomen return false or true
                            if(!$resultGetWomen){
                                
                                // it return false, it show message
                                showMessage('No Men Categories Found');
                            }else{

                                 // if the resultGetWomen of get function return the result
                                 foreach($resultGetWomen as $categoriesRow) :

                                                  // rows came from my Class CategoriesController
                                    $categoryData = $categories->rows($categoriesRow);
                        ?>
                            <option value="<?= $categoryData['id'] ?>">
                                <?= $categoryData['name'] ?> | <?= $categoryData['gender'] ?>
                            </option>
                        <?php
                                endforeach;
                            }
                        ?>

                        
                    </select>
                    <br><br>

                    <input type="file" name="inputImage" accept=".jpg, .jpeg, .png">
                    <br><br>
                    
                    <input type="text" name="inputName" placeholder="Name" required autofocus>
                    <br><br>

                    <select name="inputSize">
                        <option selected>Select Sizes</option>
                        <option></option>
                        <option>Clothing Size:</option>
                        <?php
                                         // get came from my Class SizesController 
                            $resultGet = $sizes->getClothSize();

                            // if resultGet return false or true
                            if(!$resultGet){
                                
                                // it return false, it show message
                                showMessage('No Sizes Found');
                            }else{

                                 // if the resultGet of get function return the result
                                 foreach($resultGet as $sizesRow) :

                                                  // rows came from my Class SizesController 
                                    $data = $sizes->rows($sizesRow);
                        ?>
                            <option value="<?= $data['id'] ?>">
                                <?= $data['name'] ?>
                            </option>
                        <?php
                                endforeach;
                            }
                        ?>
                        <option></option>
                        <option>Shoes Size:</option>
                        <?php
                                         // get came from my Class SizesController 
                            $resultGet = $sizes->getShoeSize();

                            // if resultGet return false or true
                            if(!$resultGet){
                                
                                // it return false, it show message
                                showMessage('No Sizes Found');
                            }else{

                                 // if the resultGet of get function return the result
                                 foreach($resultGet as $sizesRow) :

                                                  // rows came from my Class SizesController 
                                    $data = $sizes->rows($sizesRow);
                        ?>
                            <option value="<?= $data['id'] ?>">
                                <?= $data['name'] ?>
                            </option>
                        <?php
                                endforeach;
                            }
                        ?>

                    </select>
                    <br><br>

                    <input type="number" min="0" name="inputStock" placeholder="Stock" required>
                    <br><br>

                    <input type="number" min="0" name="inputPrice" placeholder="Price" required>

                    <button type="submit" name="add-button">
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                    </button>

                </form>
            </div>
        </div>

        <div class="table-container">

            <button type="submit" class="add-button" onclick="closeForm()">
                <!-- <ion-icon name="close-circle-outline" class="circle-icon"></ion-icon> -->
                <ion-icon name="arrow-back-circle-outline" class="circle-icon"></ion-icon>
            </button>
            <button type="submit" class="add-button" onclick="showForm()">
                <!-- <ion-icon name="add-circle-outline" class="circle-icon"></ion-icon> -->
                <ion-icon name="arrow-forward-circle-outline" class="circle-icon"></ion-icon>
            </button>

            <div class="scroll-table">
                <table class="child-table">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Category</th>
                            <th>Gender</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class InventoryController  
                            $resultGet = $inventory->get();
                            
                            // if the result of get function return false or true
                            if(!$resultGet){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Inventory Record Found');
                            }else{

                                $lowStock = 5;
                                $outStock = 0;

                                $outStockMessage = '';
                                $lowStockMessage = '';

                                // if the resultGet of get function return the result
                                foreach($resultGet as $inventoryRows) :

                                          // rows came from my Class InventoryController
                                    $data = $inventory->rows($inventoryRows);
                        ?>
                        <tr>
                            <!-- <td>
                                <?= $data['id'] ?>
                            </td> -->
                            <td>
                                <?= $data['categoryName'] ?>
                            </td>
                            <td>
                                <?= $data['gender'] ?>
                            </td>
                            <td>
                                <img src="../images/<?= $data['image'] ?>" width="50" title="<?= $data['image'] ?>">
                            </td>
                            <td>
                                <?= $data['name'] ?>
                            </td>
                            <td>
                                <?= $data['size'] ?>
                            </td>
                            <td>
                                <?= $data['stock'] ?> 
                                <?php

                                    $lowStockHold = 5;
                                    $outStockHold = 0;

                                    if($data['stock'] <= $lowStockHold && $data['stock'] > $outStockHold) :
                                        $stockMessage = 'Low Stock';

                                    elseif($data['stock'] == $outStockHold) :
                                        $stockMessage = 'Out of Stock';

                                        if($data['status'] == 'Available'):

                                            $id = $data['id'];
                                            $status = 'Unavailable';

                                            // updateStatus came from my Class InventoryController
                                            $inventory->updateStatus($status,$id);
                                        endif;

                                    else :
                                        $stockMessage = 'In Stock';

                                    endif;
                                ?>
                                <p style="font-size: 10px;">
                                    <?php echo $stockMessage; ?>
                                </p>
                            </td>
                            <td>
                                <?= number_format($data['price']) ?> 
                            </td>
                            <td>
                                <?php


                                ?>
                                <p class="stock-status <?= ($data['status'] == 'Available') ? 'available' : 'unavailable'; ?>">
                                    <?= $data['status'] ?>
                                </p>
                            </td>
                            <td>
                                <div class="a-cont">
                                    <a href="edit-inventory.php?updateID=<?= $data['id'] ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>              
                                    </a>

                                    <form action="codes/inventory-code.php" method="post" class="form">

                                        <button type="submit" name="delete-button" value="<?= $data['id'] ?>" class="delete-button">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php 
                                endforeach;
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>