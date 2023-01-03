
// Variables con los contadores de bolas totales y bolas eliminadas
var balls;
var deletedBalls;

$(document).ready(function() {
    balls = 0;

    // Configuramos los botones añadiendo las funciones para cada una ellos.
    $("#add").on("click", addBalls);
    $("#remove").on("click", shakeTree);
          
});

function addBalls(){

    // Utilizamos una imagen para representar el adorno
    var ball = $('<img class="ornament" src="a.png" />');

    //Con la funcion randomRange le damos un valor aleatorio a la altura.
    //Después, se escoge el valor horizontal según donde se encuentre la altura, formando 4 franjas donde se posicionarán las bolas.
    var top = randomRange(50, 380);
    var left = 200;

    if(top >= 50 && top <= 110){

        var left = randomRange(200, 225);
        }

    else if(top > 110 && top <= 220) {
        
        var left = randomRange(165, 250);
        } 
    else if (top > 220 && top <= 270) {
        
        var left = randomRange(160, 280);
        } 
        
    else if (top > 270 && top <= 380) {
        
        var left = randomRange(113, 340);
        }

    // Posicionamos la bola de manera horizontal, dejando la altura en 0 para posteriormente dejarla caer en la posición elegida con .animate
    $(ball).css({"left" : left + "px", "top" : 0});
    $(ball).animate({'top': top});
    $("#treeContainer").append(ball);

    //Aumentamos el contador y mostramos el total de bolas.
    balls++;
    $("#ballsCounter").html(balls);
    
};

function shakeTree() {
    
    //Igualamos las bolas eliminadas a las totales ya que se eliminará el total de ellas.
    var deletedBalls =  balls;

    //Dejamos caer las bolas, agitamos el árbol y las hacemos desvanecerse. Por último mostramos el contados de bolas.
    $(".ornament").animate({"top" : 400}, 800);
    $("#treeContainer").effect( "shake", {times:4}, 750 );
    $(".ornament").fadeOut(400)
    $("#removedBalls").html(deletedBalls);

}

//Aquí le damos aleatoriedad a las bolas.
function randomRange(min, max) {
    
    var outcome = (Math.random() * (max - min)) + min;
	
    return outcome;
}