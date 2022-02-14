window.onload = function()
{
    update();
}
function update() {
var x = document.querySelector("#select").value;
document.querySelector("#demo").innerHTML = "You selected: " + x;
}