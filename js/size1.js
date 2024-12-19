document.querySelectorAll('.size-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // When a checkbox is clicked, uncheck all others
        if (this.checked) {
            document.querySelectorAll('.size-checkbox').forEach(cb => {
                if (cb !== this) {
                    cb.checked = false;
                }
            });
        }

        // Get the selected size information
        let sizeId = this.getAttribute('data-size-id');
        let sizeName = this.getAttribute('data-size-name');
        let sizeStock = this.getAttribute('data-size-stock');
        let sizePrice = this.getAttribute('data-size-price');

        // Update the display with the selected size info
        document.getElementById('selected-size-name').textContent = sizeName;
        document.getElementById('selected-size-stock').textContent = 'Stock: ' + sizeStock;
        document.getElementById('selected-size-price').textContent = 'Price: $' + sizePrice;
    });
});
