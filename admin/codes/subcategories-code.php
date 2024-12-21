<?php
    include '../../config/connect.php';
    
    include_once '../controllers/SubcategoriesController.php';

    $subcategories = new SubcategoriesController;

    // SUBCATEGORIES DELETE
    if(isset($_POST['delete-button']))
    {   
        $deleteID = $_POST['delete-button'];
        
                      // delete came from my Class SubcategoriesController 
        $resultDelete = $subcategories->delete($deleteID);
        
        // if the resultDelete of delete function return true
        if($resultDelete){

            // if the resultDelete return true, it direct to add subcategory page
            redirect('Subcategory Deleted Successfully','admin/add-subcategories.php');
        }else{

            // if the resultDelete return false, it direct to add subcategory page
            redirect('Something went wrong','admin/add-subcategories.php');
        }
    }
    // SUBCATEGORIES DELETE
    // SUBCATEGORIES UPDATE
    if(isset($_POST['update-button']))
    {
        // storing input subcategory data in a array
        $subcategoryData = [
            'id'=> $_POST['inputID'],
            'name'=> $_POST['inputName'],
            'category'=> $_POST['inputCategory']
        ];

                      // update came from my Class SubcategoriesController
        $resultUpdate = $subcategories->update($subcategoryData);

        // if the resultUpdate of update function return true
        if($resultUpdate){

            // if the resultUpate return true, it direct to add subcategories page
            redirect('Subcategories Updated Successfully','admin/add-subcategories.php');
        }else{

            // if the resultUpate return false, it direct to edit subcategories page
            redirect('Something went wrong','admin/edit-subcategories.php');
        }
    }
    // SUBCATEGORIES UPDATE
    // SUBCATEGORIES ADD
    if(isset($_POST['add-button']))
    {

        // storing input category data in a array
        $subcategoryData = [
            'name'=> $_POST['inputName'],
            'category'=> $_POST['inputCategory']
        ];


                   // add came from my Class SubcategoriesController
        $resultAdd = $subcategories->add($subcategoryData); 

        // if the result of my add function return true or false
        if($resultAdd){

            // if the result of my add function return true, it direct to the add-subcatogories page
            redirect('Subcategories Added Successfully','admin/add-subcategories.php');
        }else{

            // if the result of my add function return false, it direct to add subcategories if something went wrong
            redirect('Something went wrong','admin/add-subcategories.php');
        }
    }
    // SUBCATEGORIES ADD
?>