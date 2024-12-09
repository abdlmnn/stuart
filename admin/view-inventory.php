<?php
    $title = 'Categories';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/InventoryController.php';

    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;

    $authenticated->adminOnly();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Inventory</h1>
    <hr>

    <div class="whole-container">

        <div class="table-container">

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
                                <?= $data['stock'] ?> <p class="stock-status" style="font-size: 10px; background-color: grey;">Low Stock</p>
                            </td>
                            <td>
                                <?= $data['price'] ?> 
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