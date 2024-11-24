<?php
    include '../../config/connect.php';
    
    include_once '../controllers/CategoriesController.php';

    $categories = new CategoriesController;

    // CATEGORIES DELETE
    if(isset($_POST['delete-button']))
    {   
        $deleteID = $_POST['delete-button'];
        
                      // delete came from my class CategoriesController 
        $resultDelete = $categories->delete($deleteID);
        
        // if the resultDelete of delete function return true
        if($resultDelete){

            // if the resultDelete return true, it direct to add categories page
            redirect('Categories Deleted Successfully','admin/add-categories.php');
        }else{

            // if the resultDelete return false, it direct to add categories page
            redirect('Something went wrong','admin/add-categories.php');
        }
    }
    // CATEGORIES DELETE
    // CATEGORIES UPDATE
    if(isset($_POST['update-button']))
    {

        // storing input category data in a array
        $categoryData = [
            'id'=> $_POST['inputID'],
            'name'=> $_POST['inputName'],
            'description'=> $_POST['inputDescription']
        ];

        $resultUpdate = $categories->update($categoryData);

        // if the resultUpdate of update function return true
        if($resultUpdate){

            // if the resultUpate return true, it direct to add categories page
            redirect('Categories Updated Successfully','admin/add-categories.php');
        }else{

            // if the resultUpate return false, it direct to edit categories page
            redirect('Something went wrong','admin/edit-categories.php');
        }
    }
    // CATEGORIES UPDATE
    // CATEGORIES ADD
    if(isset($_POST['add-button']))
    {

        // storing input category data in a array
        $categoryData = [
            'name'=> $_POST['inputName'],
            'description'=> $_POST['inputDescription']
        ];

        $resultAdd = $categories->add($categoryData); 

        // if the result of my add function return true or false
        if($resultAdd){

            // if the result of my add function return true, it direct to the add-catogories page
            redirect('Categories Added Successfully','admin/add-categories.php');
        }else{

            // if the result of my add function return false, it direct to add categories if something went wrong
            redirect('Something went wrong','admin/add-categories.php');
        }
    }
    // CATEGORIES ADD
?>