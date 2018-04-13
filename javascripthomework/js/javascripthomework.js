var subtotal = 0

function writeRows() {
    for (var i = 0; i < filenames.length; i++){
        var itemTotal = calculateTotal(quantities[i], prices[i]);
        
        outputOrderRow(filenames[i], titles[i], quantities[i], prices[i], itemTotal);
        
        subtotal += itemTotal;
    }
}