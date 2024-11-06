<?php
    include 'connection.php';

    // This is for All Table 
    // Selecting all the Table to display the value
    function selectAllTable($tableName)
    {
        $selectTable = "
            SELECT * 
            FROM $tableName 
        ";  

        include_once 'execute.php';
        return execute($selectTable);
    }
?>


<!-- CATEGORY FUNCTIONS QUERY -->
<?php
    // Inserting the values through the Category Table
    function insertCategoryValues($name)
    {
        $insertCategory = "
            INSERT INTO 
            category (name)
            VALUES ('$name')
        ";

        include_once 'execute.php';
        return execute($insertCategory);
    }

    // Selecting all Category Table with exact ID
    function selectCategoryID($id)
    {
        $selectCategory = "
            SELECT *
            FROM category 
            WHERE id = '$id'
        ";
 
        include_once 'execute.php';
        return execute($selectCategory);
    }

    // Updating the values through the Category Table
    function updateCategorySetID($name,$id)
     {
         $updateCategory = "
             UPDATE category 
             SET name = '$name'
             WHERE id = '$id'
         ";
 
         include_once 'execute.php';
         return execute($updateCategory);
    }
 
    // Deleteing the values through the Category Table with exact ID
    function deleteCategoryID($id)
     {
         $deleteCategory = "
             DELETE FROM category
             WHERE id = '$id'
         ";
 
         include_once 'execute.php';
         return execute($deleteCategory);
    }
 ?>
<!-- CATEGORY FUNCTIONS QUERY -->


<!-- STOCK ITEMS FUNCTIONS QUERY -->
<?php
    // Inserting the values through the Stock Items Table
    function insertItemsValues($image,$name,$gender)
    {   
        $insertItems = "
            INSERT INTO
            items (image,name,gender)
            VALUES ('$image','$name','$gender')
        ";

        include_once 'execute.php';
        return execute($insertItems);
    }

    // Selecting all  Items Table with exact ID
    function selectItemsID($id)
    {
        $selectItems = "
            SELECT *
            FROM items
            WHERE id = '$id'
        ";

        include_once 'execute.php';
        return execute($selectItems);
    }

    // Updating the values through the  Items Table
    function updateItemsSetID($image,$name,$gender,$id)
    {
        $updateItems = "
            UPDATE items
            SET image = '$image',name = '$name', gender = '$gender'
            WHERE id = '$id'
        ";

        include_once 'execute.php';
        return execute($updateItems);
    }

    // Deleteing the values through the  Items Table with exact ID
    function deleteItemsID($id)
    {
        $deleteItems = "
            DELETE FROM items
            WHERE id = '$id'
        ";

        include_once 'execute.php';
        return execute($deleteItems);
    }
?>
<!--  ITEMS FUNCTIONS QUERY -->