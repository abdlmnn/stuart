<?php
    $title = 'Sales Report';

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

    $resul = $order->getDataOrder();
?>
<main>
    <h1>Sales Report</h1>
    <hr>

        <div class="search-container">
            <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search here . . ." title="Type in a name">
        </div>

        <form action="" method="post"></form>


    <!-- <div class="whole-container"> -->

        <div class="table-container">

            <div class="scroll-table">
                <table class="child-table" id="inventoryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Item</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Receipts</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class InventoryController  
                            $resultGet = $order->getDataOrderline();

                            $total = 0;

                            while($data = $resultGet->fetch_assoc()){

                                $formattedDate = date('F j, Y, g:i a', strtotime($data['orderDate']));

                                // $total = $total + $data['orderlineTotal'];

                                // print_r($total);

                                $totalAmount = number_format($data['orderlineQuantity'] * $data['itemPrice']);
                        ?>
                        <tr>
                            <td>
                                <?= $data['orderID'] ?>
                            </td>
                            <td>
                                <?= $formattedDate ?> 
                            </td>
                            <td>
                                <?= $data['itemName'] ?>
                            </td>
                            <td>
                                <?= $data['sizeName'] ?>
                            </td>
                            <td>
                                <?= number_format($data['orderlineQuantity']) ?>
                            </td>
                            <td>
                                <?= number_format($data['itemPrice']) ?>
                            </td>
                            <td>
                                <?= $totalAmount ?>
                            </td>
                            <td style="display: flex;">
                                <?php if($data['paymentStatus'] === 'unpaid' && $data['orderStatus'] === 'pending') : ?>

                                    <a href="../view-link-invoice.php?order=<?= $data['orderID'] ?>" target="_blank"
                                    style="color: #111;
                                    background-color: transparent;
                                    padding: 10px 20px;
                                    /* font-size: 14px; */
                                    "><i class="fa-solid fa-file-invoice"></i></a>

                                <?php else : ?>

                                    <a href="../view-receipt.php?order=<?= $data['orderID'] ?>" target="_blank"
                                    style="color: #111;
                                    background-color: transparent;
                                    padding: 10px 20px;
                                    /* font-size: 14px; */
                                    "><i class="fa-solid fa-receipt"></i></a>

                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php               
                            
                            }        
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="total-sales" style="margin-top: 20px;
        display:flex;
        gap: 10px;
        align-items:center;
        ">
            <h3>Total Sales:</h3>
            <h2 style="color: #E2A500;">&#x20B1; <?= number_format($order->TotalSales()) ?></h2>
        </div>
    <!-- </div> -->
</main>
<?php include 'includes/footer.php'; ?>