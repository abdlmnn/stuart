<?php
    $title = 'Subcategories';

    include '../config/connect.php';

    include_once '../controllers/AuthenticateController.php';
    include_once 'controllers/SubcategoriesController.php';
    include_once 'controllers/CategoriesController.php';

    $authenticated = new AuthenticateController;
    $subcategories = new SubcategoriesController;
    $categories = new CategoriesController;

    $authenticated->adminOnly();
    $authenticated->checkIsLoggedIn();

    include 'includes/header.php';
    include 'includes/sidebar.php';

    include '../message.php';
?>
<main>
    <h1>Subcategories</h1>
    <hr>

    <div class="whole-container">
        <div class="child-cont" id="form">
            <div class="form-container">

                <h1>ADD Subcategory</h1>

                <form action="codes/subcategories-code.php" method="post">

                    <select name="inputCategory" required>
                        
                        <?php
                            $resultGet = $categories->get();

                            if(!$resultGet){

                                showMessage('No Categories Record Found');
                            }else{

                                 // if the resultGet of get function return the result
                                 foreach($resultGet as $categoriesRows) :

                                    // rows came from my Class CategoriesController
                                    $data = $categories->rows($categoriesRows);
                        ?>
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>

                        <?php
                                endforeach;
                            }
                        ?>
                    </select>
                    <br>
                    <br>
                    
                    <input type="text" name="inputName" placeholder="Name" required autofocus>
                    

                    <button type="submit" name="add-button">
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                    </button>

                </form>
            </div>
        </div>

        <div class="table-container">

            <button type="submit" class="add-button" onclick="closeForm()">
                <!-- <ion-icon name="close-circle-outline" class="circle-icon"></ion-icon> -->
                <ion-icon name="arrow-back-circle-outline" class="circle-icon"></ion-icon>
            </button>
            <button type="submit" class="add-button" onclick="showForm()">
                <!-- <ion-icon name="add-circle-outline" class="circle-icon"></ion-icon> -->
                <ion-icon name="arrow-forward-circle-outline" class="circle-icon"></ion-icon>
            </button>

            <div class="scroll-table">
                <table class="child-table">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Name</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                                       // get came from my Class SubcategoriesController  
                            $resultGet = $subcategories->get();
                            
                            // if the result of get function return false or true
                            if(!$resultGet){

                                // if the resultGet of get function is false, it show message
                                showMessage('No Subcategories Record Found');
                            }else{

                                // if the resultGet of get function return the result
                                foreach($resultGet as $subcategoriesRows) :

                                          // rows came from my Class CategoriesController
                                    $data = $subcategories->rows($subcategoriesRows);
                        ?>
                        <tr>
                            <!-- <td>
                                <?= $data['id'] ?>
                            </td> -->
                            <td>
                                <?= $data['name'] ?>
                            </td>
                            <td>
                                <?= $data['categoryName'] ?>
                            </td>
                            <td>
                                <div class="a-cont">
                                    <a href="edit-subcategories.php?updateID=<?= $data['id'] ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>              
                                    </a>

                                    <form action="codes/subcategories-code.php" method="post" class="form">

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
    </div>
    
</main>
<?php include 'includes/footer.php'; ?>