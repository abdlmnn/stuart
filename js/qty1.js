$(document).ready(function () {

    $(document).on('click', '.increment', function () {
        var $qtyInput = $(this).closest('.qtyBox').find('.qty');
        var itemID = $(this).closest('.qtyBox').find('.inventoryID').val();

        // Get the current value from the input field
        var currentValue = parseInt($qtyInput.val());

        // Ensure it is a number
        if (!isNaN(currentValue)) {
            var qtyVal = currentValue + 1; 
            $qtyInput.val(qtyVal); // Update the input value
        }
    });

    $(document).on('click', '.decrement', function () {
        var $qtyInput = $(this).closest('.qtyBox').find('.qty');
        var itemID = $(this).closest('.qtyBox').find('.inventoryID').val();

        // Get the current value from the input field
        var currentValue = parseInt($qtyInput.val());

        // Ensure it is a number and not less than zero
        if (!isNaN(currentValue) && currentValue > 0) {
            var qtyVal = currentValue - 1;
            $qtyInput.val(qtyVal); // Update the input value
        }
    });
    
});
