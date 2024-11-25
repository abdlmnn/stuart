<?php
    $title = 'Categories';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    // include_once 'controllers/InventoryController.php';

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

                <form action="codes/inventory-code.php" method="post">

                    <select name="inputCategory">
                        <option selected>Select Categories</option>
                        <?php

                        ?>
                            <option value=""></option>
                        <?php

                        ?>
                    </select>
                    <br><br>

                    <input type="file" name="inputImage" accept=".jpg, .jpeg, .png">
                    <br><br>
                    
                    <input type="text" name="inputName" placeholder="Name" required autofocus>
                    <br><br>

                    <select name="inputSize">
                        <option selected>Select Size</option>

                        
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

                    <input type="number" min="0" name="inputPrice" placeholder="Stock" required>
                    <br><br>

                    <input type="number" min="0" name="inputStock" placeholder="Price" required>

                    <button type="submit" name="add-button">
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                    </button>

                </form>
            </div>
        </div>

        <div class="table-container">

            <button type="submit" class="add-button" onclick="showForm()">
                <ion-icon name="add-circle-outline" class="circle-icon"></ion-icon>
            </button>
            <button type="submit" class="add-button" onclick="closeForm()">
                <ion-icon name="close-circle-outline" class="circle-icon"></ion-icon>
            </button>

            <div class="scroll-table">
                <table class="child-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Stock</th>
                            <th>Price</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class CategoriesController  
                            $resultGet = $categories->get();
                            
                            // if the result of get function return false or true
                            if(!$resultGet){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGet as $categoriesRows) :

                                          // rows came from my Class CategoriesController
                                    $data = $categories->rows($categoriesRows);
                        ?>
                        <tr>
                            <td>
                                <?= $data['id'] ?>
                            </td>
                            <td>
                                <?= $data['name'] ?>
                            </td>
                            <td>
                                <?= $data['gender'] ?>
                            </td>
                            <td>
                                <a href="edit-categories.php?updateID=<?= $data['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>              
                                </a>
                                <!-- <a href="categoryProcess.php?deleteID=<?= $data['id'] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a> -->
                                <form action="codes/categories-code.php" method="post">

                                    <button type="submit" name="delete-button" value="<?= $data['id'] ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </form>
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