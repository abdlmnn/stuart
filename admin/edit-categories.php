<?php
    $title = 'Categories';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/CategoriesController.php';

    $authenticated = new AuthenticateController;
    $categories = new CategoriesController;

    $authenticated->adminOnly();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Categories</h1>
    <hr>

    <div class="whole-container">
        <div class="child-cont" id="categoryForm">
            <div class="form-container">

                <h1>EDIT Category</h1>

                <?php
                    // if get updateID is set false
                    if(!isset($_GET['updateID'])){

                        // it show the message
                        showMessage('Something Went Wrong');
                    }else{
                        $updateID = $_GET['updateID'];

                                    // exact came from my class CategoriesController 
                        $resultExact = $categories->exact($updateID);

                        // if result of the exact function return the data which is true
                        if($resultExact){

                            // if the resultExact of exact function return the result
                            foreach($resultExact as $categoriesRows) :
                                
                                      // rows came from my Class CategoriesController
                                $data = $categories->rows($categoriesRows);

                ?>
                        <form action="codes/categories-code.php" method="post">

                            <input type="hidden" name="inputID" value="<?= $data['id'] ?>">
                            
                            <input type="text" name="inputName" value="<?= $data['name'] ?>" placeholder="Name" required autofocus>
                            <br><br>

                            <select name="inputGender">
                                
                                <option selected>Select Gender</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Unisex">Unisex</option>

                            </select>

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
                    }
                ?>
            </div>
        </div>

        <div class="table-container">

            <button type="submit" class="add-button" onclick="showForm()">
                <ion-icon name="add-circle-outline" class="circle-icon"></ion-icon>
            </button>
            <button type="submit" class="add-button" onclick="closeForm()">
                <ion-icon name="close-circle-outline" class="circle-icon"></ion-icon>
            </button>

            <div class="scroll-table">
                <table class="child-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class CategoriesController  
                            $resultGet = $categories->get();
                            
                            // if the result of get function return false
                            if(!$resultGet){
                                
                                // it show the message
                                showMessage('No Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGet as $categoriesRows) :
                                
                                    // rows came from my Class CategoriesController
                                $data = $categories->rows($categoriesRows);
                        ?>
                        <tr>
                            <td>
                                <?= $data['id'] ?>
                            </td>
                            <td>
                                <?= $data['name'] ?>
                            </td>
                            <td>
                                <?= $data['gender'] ?>
                            </td>
                            <td>
                                <a href="edit-categories.php?updateID=<?= $data['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>              
                                </a>
                                <!-- <a href="delete-categories.php?deleteID=<?= $data['id'] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a> -->
                                <form action="codes/categories-code.php" method="post">

                                    <button type="submit" name="delete-button" value="<?= $data['id'] ?>" class="delete-icon">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </form>
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