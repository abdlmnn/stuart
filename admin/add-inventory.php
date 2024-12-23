<?php
    $title = 'Inventory';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/SubcategoriesController.php';
    include_once 'controllers/InventoryController.php';

    $subcategories = new SubcategoriesController;
    $inventory = new InventoryController;
    $authenticated = new AuthenticateController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

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

                    <select name="inputSubCategory">
                        <?php
                                         // get came from my Class SubcategoriesController 
                            $resultGet = $subcategories->get();

                            // if resultGet return false or true
                            if(!$resultGet){
                                
                                // it return false, it show message
                                showMessage('No Subcategories Found');
                            }else{

                                 // if the resultGet of get function return the result
                                 foreach($resultGet as $subcategoriesRows) :

                                                  // rows came from my Class SubcategoriesController
                                    $data = $subcategories->rows($subcategoriesRows);
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

                    <input type="file" name="inputImage" accept=".jpg, .jpeg, .png">
                    <br><br>
                    
                    <input type="text" name="inputName" placeholder="Name" required autofocus>
                    <br><br>

                    <input type="number" min="1" name="inputPrice" placeholder="Price" required>

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
                <table class="child-table" id="inventoryTable">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>SubCategory</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Total Stock</th>
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
                                <?= $data['subcategoryName'] ?>
                            </td>
                            <td>
                                <img src="../images/<?= $data['image'] ?>" width="50" title="<?= $data['image'] ?>">
                            </td>
                            <td>
                                <?= $data['name'] ?>
                            </td>
                            <td>
                                <?= number_format($data['price']) ?> 
                            </td>
                            <td>
                                <?= $data['totalStock'] ?>
                                <?php
                                    $stockMessage = '';

                                    if($data['totalStock'] <= 5 && $data['totalStock'] > 0) :
                                        $stockMessage = 'Low Stock';

                                        if($data['status'] == 'Unavailable') :

                                            $id = $data['id'];
                                            $status = 'Available';

                                            // updateStatusAvail came from my Class InventoryController
                                            $inventory->updateStatusAvail($status,$id);
                                        endif;

                                    elseif($data['totalStock'] == 0) :

                                        $stockMessage = 'Out Stock';

                                        if($data['status'] == 'Available'):

                                            $id = $data['id'];
                                            $status = 'Unavailable';

                                            // updateStatusUnavail came from my Class InventoryController
                                            $inventory->updateStatusUnavail($status,$id);
                                        endif;

                                    else :

                                        if($data['status'] === 'Unavailable') :

                                            $id = $data['id'];
                                            $status = 'Available';

                                            // updateStatusAvail came from my Class InventoryController
                                            $inventory->updateStatusAvail($status,$id);
                                        endif;

                                    endif;
                                ?>
                                <p style="font-size: 10px;">
                                    <?php echo $stockMessage; ?>
                                </p>
                            </td>
                            <td>
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