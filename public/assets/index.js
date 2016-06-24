$(document).ready(function()
{



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



