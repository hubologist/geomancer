/* 
 * created by: Tiago @ http://lightradius.com
 * contact: hi@lightradius.com
 */

$(document).ready(function() {
    i = 10;
    setInterval(function(){ 
        i--;
        $("#timer").html(i);
        $("#timer").prop('width', (i/100) * 100);
        if (i <= 0) {
            post();
        }
    }, 1000);
    
});

function timer() {

}

function post() {
    method = "post";
    path = "./index.php";

    var form = document.createElement("form");
    
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    document.body.appendChild(form);
    
    form.submit();
}