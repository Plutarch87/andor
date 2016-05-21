$(document).ready(function()

   {


var pozadine = [
   "094442241.jpg",
   "ad61c1170214d99234ec111cc983f12c.jpg",
   "background.jpg",
   "1373378841425.jpg",
   "w75_2.jpg",
   "Hot-Girl-Fashion-2013-Background-HD-Wallpaper.jpg",
   "libraries-irina-shayk-hot-girl-hd-430000.jpg",
   "pinoy-hollywood-hot-celebrity-girls-with-tattoos-hd-x-223384.jpg",
   "wallhaven-263921.jpg",
   "hot-girl-hd-wallpaper.jpg",
   "Unknown HD HOT Girl 1080p (8).jpg",
   "WDF_1848936.jpg",
   "1373378841425.jpg",
   "1373378970229.jpg",
   "1381688042031.jpg",
   "1381688077862.jpg",
   "1381688365841.jpg",
   "1381688473804.jpg",
];

var random = pozadine[Math.floor(Math.random()*pozadine.length)];

$('header').css({'background-image': 'url(assets/images/' + random + ')'});

$("#button").click(function() {
    $('html, body').animate({
        scrollTop: $("#elementtoScrollToID").offset().top
    }, 500);
}); 

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
// btn.onclick = function() {
//     modal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }

});