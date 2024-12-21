<?php
    $title = 'Dashboard';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/InventoryController.php';
    include_once 'controllers/SubcategoriesController.php';
    include_once 'controllers/SizesController.php';

    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;
    $subcategories = new SubcategoriesController;
    $sizes = new SizesController;

    $authenticated->adminOnly();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Dashboard</h1>
    <hr>
    
    <div class="whole-dashboard-container">
        <div class="content-cont">

            <div class="box-cont">
    
                <div class="cards">

                    <div class="card">
                        <div class="box">
                            <span class="total-number">0</span>
                            <span class="text-box">Total Orders</span>
                        </div>
                        <div class="case">
                            <ion-icon name="bag-outline" class="icon"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div class="box">
                            <span class="total-number"><?php echo $inventory->totalItems(); ?></span>
                            <span class="text-box">Total Items</span>
                        </div>
                        <div class="case">
                            <ion-icon name="cube-outline" class="icon"></ion-icon>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="box">
                            <span class="total-number">0</span>
                            <span class="text-box">Total Sales</span>
                        </div>
                        <div class="case">
                            <ion-icon name="shirt-outline" class="icon"></ion-icon>
                        </div>
                    </div>

                </div>

                <hr style="color: #000;">

                <h2 class="available-item">Available Items</h2>

                <div class="search-container">
                    <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search here available item . . ." title="Type in a name">
                </div>
                
                <div class="table-container">

                    <div class="scroll-table">

                        <table class="child-table" id="inventoryTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Size Stock</th>
                                    <th>Status</th>
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

                                                            // getCategory came from my Class SubcategoriesController
                                            $resultGetCategory = $subcategories->getCategory($data['subcategoryID']);

                                            if(!$resultGetCategory){

                                                showMessage('No Category Record Found');
                                            }else{
                                                
                                                foreach($resultGetCategory as $categoryRow) :
                                                    
                                                                // rows came from my Class SubcategoriesController 
                                                    $categoryData = $subcategories->rows($categoryRow);

                                                                    // getSizeOnly came from my Class SizesController 
                                                    $resultGetSizeOnly = $sizes->getSizeOnly($data['id']);

                                                    if(!$resultGetSizeOnly){

                                                        showMessage('No Size Record Found');
                                                    }else{

                                                        $collectSize = [];
                                                        $collectStock = [];

                                                        foreach ($resultGetSizeOnly as $sizeRow) :

                                                                    // rows came from my Class SizesController
                                                            $sizeData = $sizes->rows($sizeRow);

                                                            // collect the sizeName in array 
                                                            $collectSize[] = $sizeData['name'];
                                                            $collectStock[] = $sizeData['stock'];

                                                            // print_r($collectSize);
                                                            // print_r($collectStock);
                                                            
                                                            $eachSizes = implode(' | ',$collectSize);
                                                            $eachStock = implode(' | ',$collectStock);

                                                        endforeach;
                                ?>
                                <tr>
                                    <td>
                                        <?= $data['id'] ?>
                                    </td>
                                    <td>
                                        <?= $categoryData['categoryName'] ?>
                                    </td>
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
                                        <?= $eachSizes ?> 
                                    </td>
                                    <td>
                                        <?= $eachStock ?> 
                                    </td>
                                    
                                    <td>
                                        <p class="stock-status <?= ($data['status'] == 'Available') ? 'available' : 'unavailable'; ?>">
                                            <?= $data['status'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php               
                                                        
                                                    }   
                                                endforeach;
                                            }   
                                        endforeach;
                                    } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>