function calculateTotal(quantity, price){
    return quantity * price
}

function outputOrderRow(file, title, quantity, price, total) {
    document.write("<tr>\n" +
                  "<td><img src=\"images/" + file + "\""
                  + " alt=\"" + title + "\"></td>\n"
                  + "<td>" + title + "</td>\n"
                  + "<td>" + quantity + "</td>\n"
                  + "<td>$" + price.toFixed(2) + "</td>\n"
                  + "<td>$" + total.toFixed(2) + "</td>\n</tr>\n");
}

function validateForm(address1, city, state, zip) {
    if (address1 == "" || city == "" || state == "" || zip == "") {
        returnToPreviousPage();
        return false;
    }
    return true;
}