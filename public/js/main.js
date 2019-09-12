
// build scene
var scene = new ScrollMagic.Scene({triggerElement: "#trigger1"})
                // trigger animation by adding a css class
                .setClassToggle("#animate1", "zap")
                .addTo(controller);

var scene = document.querySelector('#phone .phone');
var parallaxInstance = new Parallax(scene);


var typed = new Typed('#typed', {
    stringsElement: '#typed-strings',
    typeSpeed: 40
});



 // init controller
 var controller = new ScrollMagic.Controller();


// build scenes
var revealElements = document.getElementsByClassName("digit");
for (var i=0; i<revealElements.length; i++) { // create a scene for each element
    new ScrollMagic.Scene({
        triggerElement: revealElements[i], // y value not modified, so we can use element as trigger as well
        offset: 10,												 // start a little later
        triggerHook: 0.9,
    })
    .setClassToggle(revealElements[i], "visible") // add class toggle
    .addTo(controller);
}

// https://speckyboy.com/creating-liquid-effects-on-the-web/
// $(function() {
//     // Vars
//     var pointsA = [],
//     pointsB = [],
//     $canvas = null,
//     canvas = null,
//     context = null,
//     vars = null,
//     points = 8,
//     viscosity = 20,
//     mouseDist = 70,
//     damping = 0.05,
//     showIndicators = false;
//     mouseX = 0,
//     mouseY = 0,
//     relMouseX = 0,
//     relMouseY = 0,
//     mouseLastX = 0,
//     mouseLastY = 0,
//     mouseDirectionX = 0,
//     mouseDirectionY = 0,
//     mouseSpeedX = 0,
//     mouseSpeedY = 0;
//
//     /**
//     * Get mouse direction
//     */
//     function mouseDirection(e) {
//         if (mouseX < e.pageX)
//         mouseDirectionX = 1;
//         else if (mouseX > e.pageX)
//         mouseDirectionX = -1;
//         else
//         mouseDirectionX = 0;
//
//         if (mouseY < e.pageY)
//         mouseDirectionY = 1;
//         else if (mouseY > e.pageY)
//         mouseDirectionY = -1;
//         else
//         mouseDirectionY = 0;
//
//         mouseX = e.pageX;
//         mouseY = e.pageY;
//
//         relMouseX = (mouseX - $canvas.offset().left);
//         relMouseY = (mouseY - $canvas.offset().top);
//     }
//     $(document).on('mousemove', mouseDirection);
//
//     /**
//     * Get mouse speed
//     */
//     function mouseSpeed() {
//         mouseSpeedX = mouseX - mouseLastX;
//         mouseSpeedY = mouseY - mouseLastY;
//
//         mouseLastX = mouseX;
//         mouseLastY = mouseY;
//
//         setTimeout(mouseSpeed, 50);
//     }
//     mouseSpeed();

    /**
    * Init button
    */



    /**
     * Render canvas
//     */
//     function renderCanvas() {
//         // rAF
//         rafID = requestAnimationFrame(renderCanvas);
//
//         // Clear scene
//         context.clearRect(0, 0, $canvas.width(), $canvas.height());
//         context.fillStyle = 'rgba(69,166,243,0)';
//         context.fillRect(0, 0, $canvas.width(), $canvas.height());
//
//         // Move points
//         for (var i = 0; i <= pointsA.length - 1; i++) {
//             pointsA[i].move();
//             pointsB[i].move();
//         }
//
//         // Create dynamic gradient
//         var gradientX = Math.min(Math.max(mouseX - $canvas.offset().left, 0), $canvas.width());
//         var gradientY = Math.min(Math.max(mouseY - $canvas.offset().top, 0), $canvas.height());
//         var distance = Math.sqrt(Math.pow(gradientX - $canvas.width()/2, 2) + Math.pow(gradientY - $canvas.height()/2, 2)) / Math.sqrt(Math.pow($canvas.width()/2, 2) + Math.pow($canvas.height()/2, 2));
//
//         var gradient = context.createRadialGradient(gradientX, gradientY, 300+(300*distance), gradientX, gradientY, 0);
//         gradient.addColorStop(0, '#102ce5');
//         gradient.addColorStop(1, '#E406D6');
//
//         // Draw shapes
//         var groups = [pointsA, pointsB]
//
//         for (var j = 0; j <= 1; j++) {
//             var points = groups[j];
//
//             if (j == 0) {
//                 // Background style
//                 context.fillStyle = '#1CE2D8';
//             } else {
//                 // Foreground style
//                 context.fillStyle = gradient;
//             }
//
//             context.beginPath();
//             context.moveTo(points[0].x, points[0].y);
//
//             for (var i = 0; i < points.length; i++) {
//                 var p = points[i];
//                 var nextP = points[i + 1];
//                 var val = 30*0.552284749831;
//
//                 if (nextP != undefined) {
//                     // if (nextP.ix > p.ix && nextP.iy < p.iy) {
//                     //  p.cx1 = p.x;
//                     //  p.cy1 = p.y-val;
//                     //  p.cx2 = nextP.x-val;
//                     //  p.cy2 = nextP.y;
//                     // } else if (nextP.ix > p.ix && nextP.iy > p.iy) {
//                     //  p.cx1 = p.x+val;
//                     //  p.cy1 = p.y;
//                     //  p.cx2 = nextP.x;
//                     //  p.cy2 = nextP.y-val;
//                     // }  else if (nextP.ix < p.ix && nextP.iy > p.iy) {
//                     //  p.cx1 = p.x;
//                     //  p.cy1 = p.y+val;
//                     //  p.cx2 = nextP.x+val;
//                     //  p.cy2 = nextP.y;
//                     // } else if (nextP.ix < p.ix && nextP.iy < p.iy) {
//                     //  p.cx1 = p.x-val;
//                     //  p.cy1 = p.y;
//                     //  p.cx2 = nextP.x;
//                     //  p.cy2 = nextP.y+val;
//                     // } else {
//
//                     p.cx1 = (p.x+nextP.x)/2;
//                     p.cy1 = (p.y+nextP.y)/2;
//                     p.cx2 = (p.x+nextP.x)/2;
//                     p.cy2 = (p.y+nextP.y)/2;
//
//                     context.bezierCurveTo(p.x, p.y, p.cx1, p.cy1, p.cx1, p.cy1);
//                     //  continue;
//                     // }
//
//                     // context.bezierCurveTo(p.cx1, p.cy1, p.cx2, p.cy2, nextP.x, nextP.y);
//                 } else {
//                     nextP = points[0];
//                     p.cx1 = (p.x+nextP.x)/2;
//                     p.cy1 = (p.y+nextP.y)/2;
//
//                     context.bezierCurveTo(p.x, p.y, p.cx1, p.cy1, p.cx1, p.cy1);
//                 }
//             }
//
//             // context.closePath();
//             context.fill();
//         }
//
//         if (showIndicators) {
//             // Draw points
//             context.fillStyle = '#000';
//             context.beginPath();
//             for (var i = 0; i < pointsA.length; i++) {
//                 var p = pointsA[i];
//
//                 context.rect(p.x - 1, p.y - 1, 2, 2);
//             }
//             context.fill();
//
//             // Draw controls
//             context.fillStyle = '#f00';
//             context.beginPath();
//             for (var i = 0; i < pointsA.length; i++) {
//                 var p = pointsA[i];
//
//                 context.rect(p.cx1 - 1, p.cy1 - 1, 2, 2);
//                 context.rect(p.cx2 - 1, p.cy2 - 1, 2, 2);
//             }
//             context.fill();
//         }
//     }
//
//     // Init
//     initButton();
// });
