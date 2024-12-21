<?php
    include '../../config/connect.php';
    
    include_once '../controllers/SizesController.php';

    $sizes = new SizesController;

    // SIZE DELETE
    if(isset($_POST['delete-button']))
    {   
        $deleteID = $_POST['delete-button'];
        
                      // delete came from my Class SizesController 
        $resultDelete = $sizes->delete($deleteID);
        
        // if the resultDelete of delete function return true
        if($resultDelete){

            // if the resultDelete return true, it direct to add Sizes page
            redirect('Size Deleted Successfully','admin/add-size.php');
        }else{

            // if the resultDelete return false, it direct to add Sizes page
            redirect('Something went wrong','admin/add-size.php');
        }
    }
    // SIZE DELETE
    // SIZE UPDATE
    if(isset($_POST['update-button']))
    {
        // storing input size data in a array
        $sizeData = [
            'id'=> $_POST['sizeID'],
            'inventoryID'=> $_POST['inventoryID'],
            'name'=> $_POST['inputName'],
            'stock'=> $_POST['inputStock']
        ];

                      // update came from my Class SizesController
        $resultUpdate = $sizes->update($sizeData);

        // if the resultUpdate of update function return true
        if($resultUpdate){

            // if the resultUpate return true, it direct to add Sizes page
            redirect('Size Updated Successfully','admin/add-size.php');
        }else{

            // if the resultUpate return false, it direct to edit Sizes page
            redirect('Something went wrong','admin/edit-size.php');
        }
    }
    // SIZE UPDATE
    // SIZE ADD
    if(isset($_POST['add-button']))
    {
        $item = $_POST['inputItem'];
        $name = $_POST['inputName'];
        $stock = $_POST['inputStock'];

                   // add came from my Class SizesController
        $resultAdd = $sizes->add($item,$name,$stock); 

        // if the result of my add function return true or false
        if($resultAdd){

            // if the result of my add function return true, it direct to the add-size page
            redirect('Size Added Successfully','admin/add-size.php');
        }else{

            // if the result of my add function return false, it direct to add Sizes if something went wrong
            redirect('Something went wrong','admin/add-size.php');
        }
    }
    // SIZE ADD
?>