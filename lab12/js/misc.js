var genres = ["Abstract", "Baroque", "Gothic", "Renaissance"];
var subject = ["Animals", "Landscape", "People"];

function arrayToHTML(arr) {
    for (var i = 0; i < arr.length; i++) {
        document.write("<option value=" + arr[i] + "\>" + arr[i] + "</option>\n");
    }
}

function arrayToOptions(arr) {
    var str = "";
    for (var i = 0; i < arr.length; i++) {
        str.concat("<option value=", arr[i], "\>", arr[i], "</option>\n");
    }
    return str;
}

$(window).scroll(function() {
if ($(this).scrollTop() > 1){  
    $('header').addClass("header--sticky");
  }
  else{
    $('header').removeClass("header--sticky");
  }
});