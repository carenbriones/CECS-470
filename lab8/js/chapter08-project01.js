/* add loop and other code here ... in this simple exercise we are not
   going to concern ourselves with minimizing globals, etc */
var subtotal = 0;

function writeRows() {
    for (var i = 0; i < filenames.length; i++) {
        var itemTotal = calculateTotal(quantities[i], prices[i]);
        
        outputCartRow(filenames[i], titles[i], quantities[i], prices[i], itemTotal);
        
        subtotal += itemTotal;
    }
}

function writeTotals() {
//    var subtotal = calculateSubtotal();
    var tax = (subtotal / 10);
    var shipping = (40);
    if (subtotal > 1000) { subtotal = 0;}
    var grandTotal = (subtotal + tax + shipping);
    
    document.write("<tr class=\"totals\">\n"
                  + "<td colspan=\"4\">Subtotal</td>\n<td>$"
                  +  subtotal.toFixed(2) + "</td>\n</tr>")
    
    document.write("<tr class=\"totals\">\n"
                  + "<td colspan=\"4\">Tax</td>\n<td>$"
                  +  tax.toFixed(2) + "</td>\n</tr>")
    
    document.write("<tr class=\"totals\">\n"
                  + "<td colspan=\"4\">Shipping</td>\n<td>$"
                  +  shipping.toFixed(2) + "</td>\n</tr>")
    
    document.write("<tr class=\"totals\">\n"
                  + "<td colspan=\"4\">Grand Total</td>\n<td>$"
                  + grandTotal.toFixed(2) + "</td>\n</tr>")

}