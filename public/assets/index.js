$(document).ready(function()

   {/*$(".main").onepage_scroll({
   sectionContainer: "section",     // sectionContainer accepts any kind of selector in case you don't want to use section
   easing: "ease",                  // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in",
                                    // "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
   animationTime: 1000,             // AnimationTime let you define how long each section takes to animate
   pagination: true,                // You can either show or hide the pagination. Toggle true for show, false for hide.
   updateURL: false,                // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
   beforeMove: function(index) {},  // This option accepts a callback function. The function will be called before the page moves.
   afterMove: function(index) {},   // This option accepts a callback function. The function will be called after the page moves.
   loop: false,                     // You can have the page loop back to the top/bottom when the user navigates at up/down on the first/last page.
   keyboard: true,                  // You can activate the keyboard controls
   responsiveFallback: false,        // You can fallback to normal page scroll by defining the width of the browser in which
                                    // you want the responsive fallback to be triggered. For example, set this to 600 and whenever
                                    // the browser's width is less than 600, the fallback will kick in.
   direction: "vertical"            // You can now define the direction of the One Page Scroll animation. Options available are "vertical" and "horizontal". The default value is "vertical".  

});

$(".main").onepage_scroll(); */
"use strict";


// var pozadine = [
//    "094442241.jpg",
//    "ad61c1170214d99234ec111cc983f12c.jpg",
//    "background.jpg",
//    "1373378841425.jpg",
//    "w75_2.jpg",
//    "Hot-Girl-Fashion-2013-Background-HD-Wallpaper.jpg",
//    "libraries-irina-shayk-hot-girl-hd-430000.jpg",
//    "pinoy-hollywood-hot-celebrity-girls-with-tattoos-hd-x-223384.jpg",
//    "wallhaven-263921.jpg",
//    "hot-girl-hd-wallpaper.jpg",
//    "Unknown HD HOT Girl 1080p (8).jpg",
//    "WDF_1848936.jpg",
//    "1373378841425.jpg",
//    "1373378970229.jpg",
//    "1381688042031.jpg",
//    "1381688077862.jpg",
//    "1381688365841.jpg",
//    "1381688473804.jpg",
// ];

// var random = pozadine[Math.floor(Math.random()*pozadine.length)];

// $('header').css({'background-image': 'url(assets/images/' + random + ')'});

// $("#button").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#elementtoScrollToID").offset().top
//     }, 700);
// });

// $("#btnUP").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#elementtoScrollToID2").offset().top
//     }, 700);
// });

// $('#myShoppingCart').click(function() {
//   $('#cartNumber').toggle('fast', function() {

//   });
// });

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

// $('#myShoppingCart').click(function() {
//   $('#btnNaruci').css('display', 'block');
//   });




});