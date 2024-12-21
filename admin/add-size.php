<?php
    $title = 'Sizes';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/SizesController.php';
    include_once 'controllers/InventoryController.php';

    $authenticated = new AuthenticateController;
    $sizes = new SizesController;
    $inventory = new InventoryController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Sizes</h1>
    <hr>

    <div class="whole-container">
        <div class="child-cont" id="form">
            <div class="form-container">

                <h1>ADD Size</h1>

                <form action="codes/sizes-code.php" method="post">

                    <select name="inputItem">

                        <?php
                                    // get came from my Class InventoryController 
                            $resultGet = $inventory->get();

                            if(!$resultGet){
                        ?>
                            <option><?php echo 'No item record'; ?></option>
                        <?php
                            }else{
                                
                                foreach($resultGet as $inventoryRows){
                                        
                                          // rows came from my Class InventoryController
                                    $data = $inventory->rows($inventoryRows);
                        ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                        <?php 
                                }
                            }
                        ?>
                    </select>
                    <br><br>

                    <input type="text" name="inputName" placeholder="Size" autofocus>
                    <br><br>

                    <input type="text" name="inputStock" min="1" placeholder="Stock" required>

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
                            <th>Image</th>
                            <th>Item</th>
                            <th>Size</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // getOrderBy came from my Class SizesController  
                            $resultGet = $sizes->getOrderBy();
                            
                            // if the result of get function return false or true
                            if(!$resultGet){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Sizes Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGet as $sizesRows) :

                                          // rows came from my Class SizesController
                                    $data = $sizes->rows($sizesRows);
                        ?>
                        <tr>
                            <!-- <td>
                                <?= $data['id'] ?>
                            </td> -->
                            <td>
                                <img src="../images/<?= $data['itemImage'] ?>" width="50" title="<?= $data['itemName'] ?>">
                            </td>
                            <td>
                                <?= $data['itemName'] ?>
                            </td>
                            <td>
                                <?= $data['name'] ?>
                            </td>
                            <td>
                                <?= $data['stock'] ?>
                            </td>
                            <td>
                            <?php
                                    $stockMessage = '';

                                    if($data['stock'] <= 5 && $data['stock'] > 0) :
                                        $stockMessage = 'Low Stock';

                                    elseif($data['stock'] == 0) :

                                        $stockMessage = 'Out Stock';

                                    else:
                                        
                                        $stockMessage='In Stock';

                                    endif;
                                ?>
                                <p style="font-size: 1rem;">
                                    <?php echo $stockMessage; ?>
                                </p>
                            </td>
                            <td>
                                <div class="a-cont">
                                    <a href="edit-size.php?updateID=<?= $data['id'] ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>              
                                    </a>

                                    <form action="codes/sizes-code.php" method="post" class="form">

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