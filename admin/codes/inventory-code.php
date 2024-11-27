<?php
    include '../../config/connect.php';

    include_once '../controllers/InventoryController.php';

    $inventory = new InventoryController;

    // INVENTORY ADD
    if(isset($_POST['add-button']))
    {   

        // storing input inventory data in a array
        $inventoryData = [
            'category' => $_POST['inputCategory'],
            'image' => $_FILES['inputImage']['name'],
            'name' => $_POST['inputName'],
            'size' => $_POST['inputSize'],
            'stock' => $_POST['inputStock'],
            'price' => $_POST['inputPrice']
        ];

                    // imagePath came from my Class InventoryController  
        $resultPath = $inventory->imagePath($inventoryData);

        // if my resultPath is true or false
        if($resultPath){

            // if the resultPath is true, the insert query proceed
            $resultAdd = $inventory->add($inventoryData);

            // if the result of my add function return true or false
            if($resultAdd){
                
                // if the result of my add function return true, it direct to the add-inventory page
                redirect('Item Added Successfully','admin/add-inventory.php');
            }else{

                // if the result of my add function return false, it direct to add inventory if something went wrong
                redirect('Something went wrong','admin/add-inventory.php');
            }
        }else{

            // if the resultPath is false, it direct to add inventory and show message
            redirect('Failed Upload Image','admin/add-inventory.php');
        }
    }
    // INVENTORY ADD
?>