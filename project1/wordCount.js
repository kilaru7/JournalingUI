
function myFunction()
{

var textInput = document.querySelector("#articleArea").value;
var c = textInput.match(/\S+/g);
var count = c ? c.length :0;
document.getElementById("words").innerHTML = count+" words";

}
