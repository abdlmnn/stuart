const form = document.getElementById('form');

function showForm()
{
    form.style.display = 'block';
}

function closeForm()
{
    form.style.display = 'none';
}

function addCategoriesForm()
{
    window.location.href = 'add-categories.php';
}

function addInventoryForm()
{
    window.location.href = 'add-inventory.php';
}

function addSizesForm()
{
    window.location.href = 'add-size.php';
}