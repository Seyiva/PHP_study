window.onload = function() {
function vis() {
var block = document.getElementById('text_block');
block.style.visibility = 'visible';
window.setTimeout(func, 5000);

function func() {
block.style.visibility = 'hidden';
}
}

vis();
}
