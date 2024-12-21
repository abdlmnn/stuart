<?php
    include '../../config/connect.php';

    include_once '../controllers/InventoryController.php';

    $inventory = new InventoryController;

    // INVENTORY DELETE
    if(isset($_POST['delete-button']))
    {
        $deleteID = $_POST['delete-button'];

                      // delete came from my class InventoryController 
        $resultDelete = $inventory->delete($deleteID);

        // if the resultDelete of delete function return true
        if($resultDelete){

            // if the resultDelete return true, it direct to add inventory page
            redirect('Item Deleted Successfully','admin/add-inventory.php');
        }else{

            // if the resultDelete return false, it direct to add inventory page
            redirect('Something went wrong','admin/add-inventory.php');
        }
    }
    // INVENTORY DELETE
    // INVENTORY UPDATE
    if(isset($_POST['update-button']))
    {

        // storing input inventory data in a array
        $inventoryData = [
            'id' => $_POST['inputID'],
            'subcategory' => $_POST['inputSubCategory'],
            'image' => $_FILES['inputImage']['name'],
            'name' => $_POST['inputName'],
            'price' => $_POST['inputPrice']
        ];

                      // update came from my Class InventoryController
        $resultUpdate = $inventory->update($inventoryData);

        // if the resultUpdate of update function return true
        if($resultUpdate){

            // if the resultUpate return true, it direct to add inventory page
            redirect('Item Updated Successfully','admin/add-inventory.php');
        }else{

            // if the resultUpate return false, it direct to add inventory page
            redirect('Something went wrong','admin/add-inventory.php');
        }
    }
    // INVENTORY UPDATE
    // INVENTORY ADD
    if(isset($_POST['add-button']))
    {   

        // storing input inventory data in a array
        $inventoryData = [
            'subcategory' => $_POST['inputSubCategory'],
            'image' => $_FILES['inputImage']['name'],
            'name' => $_POST['inputName'],
            'price' => $_POST['inputPrice']
        ];

                               // checkEmptyImage came from my Class InventoryController 
        $resultCheckEmptyImage = $inventory->checkEmptyImage($inventoryData);

        // if the resultCheckEmptyImage is return true, it execute the resultPath
        if($resultCheckEmptyImage){

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

        }else{

            // if the resultCheckEmptyImage is return false, it direct to add inventory and show message
            redirect('Image is required','admin/add-inventory.php');
        }
    }
    // INVENTORY ADD
?>