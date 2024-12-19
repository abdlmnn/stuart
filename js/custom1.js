$(document).ready(function(){
    // alert('hii');

   $(document).off('click', '.increment', function() {

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var itemId = $(this).closest('.qtyBox').find('.inventoryID').val();
        var currentValue = parseInt($quantityInput.val())

        if(!isNaN(currentValue)){
            var qtyVal = currentValue + 1;

            $quantityInput.val(qtyVal);

            itemIncDec(itemId,qtyVal);
        }
        // alert(itemId);
   })

   $(document).off('click', '.decrement', function() {

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var itemId = $(this).closest('.qtyBox').find('.inventoryID').val();
        var currentValue = parseInt($quantityInput.val())

        if(!isNaN(currentValue) && currentValue > 1){
            var qtyVal = currentValue - 1;

            $quantityInput.val(qtyVal);

            itemIncDec(itemId,qtyVal);
        }
        // alert(itemId);
    })

})