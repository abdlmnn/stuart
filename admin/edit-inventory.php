<?php
    $title = 'Categories';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/CategoriesController.php';
    include_once 'controllers/InventoryController.php';

    $categories = new CategoriesController;
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

                <h1>EDIT Item</h1>

                <?php
                    // if get updateID is set false
                    if(!isset($_GET['updateID'])){

                        // it show the message
                        showMessage('Something Went Wrong');
                    }else{
                        $updateID = $_GET['updateID'];

                                    // exact came from my class InventoryController 
                        $resultExact = $inventory->exact($updateID);

                        // if result of the exact function return the data which is true
                        if($resultExact){

                            // if the resultExact of exact function return the result
                            foreach($resultExact as $inventoryRows) :
                                
                                      // rows came from my Class InventoryController
                                $data = $inventory->rows($inventoryRows);

                ?>

                        <form action="codes/inventory-code.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="inputID" value="<?= $data['id'] ?>">

                            <select name="inputCategory">
                                <option selected>
                                    Selected: <?= $data['categoryName'] ?> | <?= $data['gender'] ?>
                                </option>
                                <?php
                                                // get came from my Class CategoriesController 
                                    $resultGet = $categories->get();

                                    // if resultGet return false or true
                                    if(!$resultGet){
                                        
                                        // it return false, it show message
                                        showMessage('No Categories Found');
                                    }else{

                                        // if the resultGet of get function return the result
                                        foreach($resultGet as $categoriesRow) :

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

                            <input type="file" name="inputImage" accept=".jpg, .jpeg, .png" required>
                            <br><br>
                            
                            <input type="text" name="inputName" value="<?= $data['name'] ?>" placeholder="Name" required autofocus>
                            <br><br>

                            <select name="inputSize">
                                <option value="<?= $data['size'] ?>" selected>Selected: <?= $data['size'] ?></option>

                                
                                <option></option>
                                <option>No Size:</option>
                                <option value="None">None</option>
                                
                                <option></option>
                                <option>Clothing:</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                
                                <option></option>
                                <option>Shoes:</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>

                            </select>
                            <br><br>

                            <input type="number" min="0" name="inputStock" value="<?= $data['stock'] ?>" placeholder="Stock" required>
                            <br><br>

                            <input type="number" min="0" name="inputPrice" value="<?= $data['price'] ?>" placeholder="Price" required>

                            <button type="submit" name="update-button">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                    
                        </form>

                <?php
                            endforeach;

                        }else{

                            // if the resultEdit is false, it show the message
                            showMessage('No Record Found');
                        }
                    // }
                ?>
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
            <button type="submit" class="add-button" onclick="addInventoryForm()">
                <ion-icon name="add-circle-outline" class="circle-icon"></ion-icon>
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
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class InventoryController  
                            $resultGetExact = $inventory->getExact($updateID);
                            
                            // if the result of get function return false or true
                            if(!$resultGetExact){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Inventory Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGetExact as $inventoryRows) :

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
                            </td>
                            <td>
                                <?= $data['price'] ?> 
                            </td>
                            <td>
                            <div class="a-cont">
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
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>