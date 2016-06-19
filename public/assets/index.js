$(document).ready(function()
{

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal2 = document.getElementById('myCartModal');

// Get the button that opens the modal
var btn2 = document.getElementById("myShopBtn");

var span2 = document.getElementById("close2");

btn2.onclick = function() {
  modal2.style.display = "block";

}

span2.onclick = function() {
    modal2.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}


// function clickClick(name) {
//     $.ajax({
//     type: "POST",
//     url: "index4.html",
//     success: function() {
//       $('.predmet-info').text(name);
//     }
//   })
// }

// $('.btn').click(function(){
//   var index = $(this).index();
//   console.log($('.shopdiv').eq(index));
 
// $('.myShoppingCart').click(function(){
//  $.ajax({
//     type: "POST",
//     url: "index.blade.php",
//     success: function() {
//       $('.testklasa').clone().appendTo($('.predmet-info'));
//     }
//   });
// });

function addItem(price) {
  console.log(price);
}

});



