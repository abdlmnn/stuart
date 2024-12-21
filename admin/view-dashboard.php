<?php
    $title = 'Dashboard';

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
                            <span class="total-number"><?php echo $inventory->totalCategories(); ?></span>
                            <span class="text-box">Total Categories</span>
                        </div>
                        <div class="case">
                            <ion-icon name="shirt-outline" class="icon"></ion-icon>
                        </div>
                    </div>

                </div>

                <hr style="color: #000;">

                <h2 class="available-item">Available Items</h2>
                <table class="stock-table">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Sizes</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shoes</td>
                            <td>42</td>
                            <td>25</td>
                            <td>Available</td>
                        </tr>
                    </tbody>
                </table>

                <hr style="color: #000;">
                
                <h2 class="stock-in">Stock In</h2>
                <table class="stock-table">
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Shirt</td>
                            <td>50</td>
                            <td>2024-11-01</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>