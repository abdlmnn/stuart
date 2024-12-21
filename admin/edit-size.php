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

                <h1>EDIT Category</h1>

                <?php
                    // if get updateID is set false
                    if(!isset($_GET['updateID'])){

                        // it show the message
                        showMessage('Something Went Wrong');
                    }else{
                        $updateID = $_GET['updateID'];

                                    // exact came from my class SizesController 
                        $resultExact = $sizes->exact($updateID);

                        // if result of the exact function return the data which is true
                        if($resultExact){

                            // if the resultExact of exact function return the result
                            foreach($resultExact as $sizesRows) :
                                
                                      // rows came from my Class SizesController
                                $data = $sizes->rows($sizesRows);

                ?>
                        <form action="codes/sizes-code.php" method="post">

                            <input type="hidden" name="sizeID" value="<?= $data['id'] ?>">
                            <input type="hidden" name="inventoryID" value="<?= $data['inventoryID'] ?>">
                            
                            <input type="text" name="inputName" value="<?= $data['name'] ?>" placeholder="Size" required autofocus>
                            <br><br>
                            
                            <input type="text" name="inputStock" min="1" value="<?= $data['stock'] ?>" placeholder="Stock" required autofocus>

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
            <button type="submit" class="add-button" onclick="addSizesForm()">
                <ion-icon name="add-circle-outline" class="circle-icon"></ion-icon>
            </button>

            <div class="scroll-table">
                <table class="child-table">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                                       // getExact came from my Class SizesController  
                            $resultGetExact = $sizes->getExact($updateID);
                            
                            // if the result of get function return false
                            if(!$resultGetExact){
                                
                                // it show the message
                                showMessage('No Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGetExact as $sizesRows) :
                                
                                    // rows came from my Class SizesController
                                $data = $sizes->rows($sizesRows);
                        ?>
                        <tr>
                            <td>
                                <?= $data['id'] ?>
                            </td>
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
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>