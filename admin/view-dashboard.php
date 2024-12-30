<?php
    $title = 'Dashboard';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/InventoryController.php';
    include_once 'controllers/SubcategoriesController.php';
    include_once 'controllers/SizesController.php';
    include_once 'controllers/OrderController.php';

    $authenticated = new AuthenticateController;
    $inventory = new InventoryController;
    $subcategories = new SubcategoriesController;
    $sizes = new SizesController;
    $order = new OrderController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

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
                            <span class="total-number"><?php echo number_format($order->totalOrders()); ?></span>
                            <span class="text-box">Total Orders</span>
                        </div>
                        <div class="case">
                            <ion-icon name="bag-outline" class="icon"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div class="box">
                            <span class="total-number"><?php echo number_format($inventory->totalStockItem()); ?></span>
                            <span class="text-box">Total Items</span>
                        </div>
                        <div class="case">
                            <ion-icon name="cube-outline" class="icon"></ion-icon>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="box">
                            <span class="total-number"><?php echo number_format($order->totalSales()); ?></span>
                            <span class="text-box">Total Sales</span>
                        </div>
                        <div class="case">
                            <!-- <ion-icon name="shirt-outline" class="icon"></ion-icon> -->
                            <ion-icon name="stats-chart-outline" class="icon"></ion-icon>
                        </div>
                    </div>

                </div>

                <hr style="color: #000;">

                <div class="text-search-container"
                    style=
                    "
                        display: flex;
                        width: 100%;
                        /* border: 1px solid red; */
                    "
                >

                    <h2 class="available-item"
                        style=
                        "
                            /* border: 1px solid red; */
                            width: 50%;
                            margin-bottom: auto;
                            text-align: left;
                            padding: 5px;

                        "
                    >Available Items</h2>
                    
                    <div class="main-search" 
                    style=
                    "
                        width: 100%;
                    ">
                        <div class="search-container">
                            <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search here available item . . ." title="Type in a name">
                        </div>
                    </div>
                    
                </div>

                <div class="table-container" style="margin-bottom: 25px">

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
                                    $resultGet = $inventory->getAvail();
                                    
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

                                                        // showMessage('No Size Record Found');
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


                <hr style="color: #000;">

                <div class="text-search-container"
                    style=
                    "
                        display: flex;
                        width: 100%;
                        /* border: 1px solid red; */
                    "
                >

                    <h2 class="available-item"
                        style=
                        "
                            /* border: 1px solid red; */
                            width: 50%;
                            margin-bottom: auto;
                            text-align: left;
                            padding: 5px;

                        "
                    >Approved Orders</h2>
                    
                    <div class="main-search" 
                    style=
                    "
                        width: 100%;
                    ">
                        <div class="search-container">
                            <input type="text" id="myInput-order" onkeyup="filterTable2()" placeholder="Search here approved order . . ." title="Type in a name">
                        </div>
                    </div>
                    
                </div>

                <div class="table-container" style="margin-bottom: 25px">

                    <div class="scroll-table">

                        <table class="child-table" id="orderTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Method</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Receipt</th>
                                </tr>
                            </thead>
            
                            <tbody>
                                <?php
                                       // get came from my Class InventoryController  
                                    $resultGet = $order->getDataOrderApproved();

                                    $total = 0;

                                    while($data = $resultGet->fetch_assoc()){

                                        $formattedDate = date('F j, Y, g:i a', strtotime($data['orderDate']));
                                ?>
                                <tr>
                                    <td>
                                        <?= $data['orderID'] ?>
                                    </td>
                                    <td>
                                        <?= $formattedDate ?> 
                                    </td>
                                    <td>
                                        <?= $data['userFullname'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($data['orderAmount']) ?>
                                    </td>
                                    <td>
                                        <?= $data['paymentMethod'] ?>
                                    </td>
                                    <td>
                                        <span class="order-status <?= $data['paymentStatus'] ?>"><?= $data['paymentStatus'] ?></span>
                                    </td>
                                    <td>
                                        <span class="order-status <?= $data['orderStatus'] ?>"><?= $data['orderStatus'] ?></span>
                                    </td>
                                    <td style="display: flex;">

                                        <a href="../view-receipt.php?order=<?= $data['orderID'] ?>" target="_blank"
                                            style="color: #111;
                                            background-color: transparent;
                                            padding: 10px 20px;
                                            /* font-size: 14px; */
                                            "><i class="fa-solid fa-receipt"></i></a>
                                            
                                    </td>
                                </tr>
                                <?php 
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

<script>
    function filterTable2() {
    const input = document.getElementById("myInput-order").value.toUpperCase();
    const table = document.getElementById("orderTable");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        let match = false;
        for (let j = 0; j < cells.length; j++) {
            if (cells[j] && cells[j].innerText.toUpperCase().indexOf(input) > -1) {
                match = true;
                break;
            }
        }
        rows[i].style.display = match ? "" : "none";
    }
}
</script>
<?php include 'includes/footer.php'; ?>