<?php
    $title = 'Users';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/UsersController.php';

    $authenticated = new AuthenticateController;
    $users = new UsersController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Users</h1>
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
                            <th>Email</th>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Type</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class InventoryController  
                            $resultGet = $users->get();
                            
                            // if the result of get function return false or true
                            if(!$resultGet){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Inventory Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGet as $inventoryRows) :

                                          // rows came from my Class InventoryController
                                    $data = $users->rows($inventoryRows);
                        ?>
                        <tr>
                            <td>
                                <?= $data['id'] ?>
                            </td>
                            <td>
                                <?= $data['email'] ?>
                            </td>
                            <td>
                                <?= $data['fullname'] ?>
                            </td>
                            <td>
                                <?= $data['number'] ?>
                            </td>
                            <td>
                                <?= $data['address'] ?>
                            </td>
                            <td>
                                <?= $data['gender'] ?>
                            </td>
                            <td>
                                <?php 
                                    if($data['type'] == 0){
                                        $type = 'Customer';
                                    }else{
                                        $type = 'Admin';
                                    }
                                ?>
                                <?= $type ?>
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