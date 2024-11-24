<?php
    $title = 'Categories';

    include '../config/connect.php';

    include_once 'controllers/CategoriesController.php';
    include_once '../controllers/AuthenticateController.php';

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

                <h1>ADD Category</h1>

                <form action="codes/categories-code.php" method="post">

                    <input type="text" name="inputName" placeholder="Name" required autofocus>
                    <br>
                    <br>
                    <input type="text" name="inputDescription" placeholder="Description" required>

                    <button type="submit" name="add-button">
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                    </button>

                </form>
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
                            
                            // if the result of get function return false or true
                            if(!$resultGet){
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
                                <?= $data['description'] ?>
                            </td>
                            <td>
                                <a href="edit-categories.php?updateID=<?= $data['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>              
                                </a>
                                <!-- <a href="categoryProcess.php?deleteID=<?= $data['id'] ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a> -->
                                <form action="codes/categories-code.php" method="post">
                                    <button type="submit" name="delete-button" value="<?= $data['id'] ?>">
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