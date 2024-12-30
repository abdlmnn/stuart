<?php
    $title = 'Orders';

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
    <h1>Orders</h1>
    <hr>

        <div class="search-container">
            <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search here . . ." title="Type in a name">
        </div>

    <!-- <div class="whole-container"> -->
    <div class="main-two-table-container"
    style="display:flex;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    gap:25px;
    "
    >

        <div class="table-container">

            <div class="scroll-table">
                <table class="child-table" id="inventoryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Method</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class InventoryController  
                            $resultGet = $order->getDataOrderPending();

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

                                <a href="../add-confirm-order.php?orderID=<?= $data['orderID'] ?>" target="_blank"
                                    style="color: #111;
                                    background-color: transparent;
                                    padding: 10px 20px;
                                ">
                                    <i class="fa-solid fa-square-check"></i>
                                </a>
                                    
                            </td>
                        </tr>
                        <?php               
                            
                            }        
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

</main>
<?php include 'includes/footer.php'; ?>