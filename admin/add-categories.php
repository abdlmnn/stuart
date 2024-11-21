<?php
    $title = 'Dashboard';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    $authenticated = new AuthenticateController;

    $authenticated->adminOnly();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    // include '../message.php';
?>
<main>
    <h1>Categories</h1>
    <hr>

    <div class="whole-container">
        <div class="child-cont" id="categoryForm">
            <div class="form-container">

                <h1>ADD Category</h1>

                <form action="" method="post">

                    <input type="text" name="inputName" placeholder="Category name" required>
                    <br>
                    <br>
                    <input type="text" name="inputDescription" placeholder="Description" required>

                    <button type="submit" name="add-category-button">
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
                        <tr>
                            <td>
                               1
                            </td>
                            <td>
                               Men Clothing
                            </td>
                            <td>
                               Top, Shirt, Long-sleeve, Pants
                            </td>
                            <td>
                                <a href="categoryUpdate.php?updateID=<?php echo $categoryRows['id'];?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                            
                                </a>
                                <a href="categoryProcess.php?deleteID=<?php echo $categoryRows['id'];?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>