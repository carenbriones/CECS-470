/* define functions here */

function calculateTotal(quantity, price) {
    return quantity * price;
}

function outputCartRow(file, title, quantity, price, total) {
    document.write("<tr>\n" +
                  "<td><img src=\"images/" + file + "\""
                  + " alt=\"" + title + "\"></td>\n"
                  + "<td>" + title + "</td>\n"
                  + "<td>" + quantity + "</td>\n"
                  + "<td>$" + price.toFixed(2) + "</td>\n"
                  + "<td>$" + total.toFixed(2) + "</td>\n</tr>\n");
}