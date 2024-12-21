<?php
    $title = 'Sizes';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/SizesController.php';

    $authenticated = new AuthenticateController;
    $sizes = new SizesController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Sizes</h1>
    <hr>

    <div class="search-container">
        <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search here . . ." title="Type in a name">
    </div>

    <!-- <div class="whole-container"> -->

        <div class="table-container">

            <div class="scroll-table">
                <table class="child-table" id="inventoryTable">
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
                                       // get came from my Class SizesController  
                            $resultGet = $sizes->get();
                            
                            // if the result of get function return false or true
                            if(!$resultGet){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Size Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGet as $sizesRows) :

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
    <!-- </div> -->
</main>
<?php include 'includes/footer.php'; ?>