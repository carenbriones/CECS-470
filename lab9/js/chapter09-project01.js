/* add code here  */
var elements = document.getElementsByClassName("required");

function highlightToggle(title) {
    title.classList.toggle("highlight");
}

function submitForm(event) {
    var isValid = true;
    for (var i = 0; i < elements.length; i++){
        if (elements[i].value == ""){
            if (!elements[i].classList.contains("error")){
                elements[i].classList.toggle("error");
            }
            isValid = false;
        } 
        else {
            if(elements[i].classList.contains("error")){
                elements[i].classList.toggle("error");
            }
        }
    }
    if (!isValid){
        event.preventDefault();
    }
}