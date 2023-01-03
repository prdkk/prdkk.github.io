let vegetables = ["aguacate", "ajo", "cebolla", "pepino", "puerro", "tomate", "zanahoria"]
let userCoins, slot0, slot1, slot2, slot0n, slot1n, slot2n; 

function insertCoin(){
    //Comenzamos solicitando la cantidad de dinero que desea ingresar, por defecto 10 monedas.
    userCoins = document.getElementById("coinBox").value;
    if(isNaN(userCoins) || userCoins == 0){
        alert("¡Debe ser un número!");
        location.reload();

    }
    //Con esta función actualizamos el saldo en la cuenta
    showCoins();

    // Ocultamos el contenedor completamente.
    $(".controls").hide(500);

    //Por otro lado también se muestran los controles para comenzar el juego, ya que por defecto los hemos ocultado.
    $(".controls1").css({"visibility" : "visible"});
    
 }

 function spin() {

    if(userCoins <= 0){
        alert("¡Te quedaste sin dinero!");
        location.reload();

    }
    // Paga la apuesta y le restamos una moneda.
    userCoins --;
    //Actualizamos el contador.
    showCoins();

    //Le damos un numero aleatorio entre 0 y 6 a cada variable
    slot0 = Math.round(Math.random()*6);
    slot1 = Math.round(Math.random()*6);
    slot2 = Math.round(Math.random()*6);

    // A cada número aleatorio obtenido le damos el nombre de la verdura a traves de su indice en el Array.
    slot0n = vegetables[slot0];
    slot1n = vegetables[slot1];
    slot2n = vegetables[slot2];

    //Buscamos la imagen de la verdura correspondiente y lo mostramos
    document.getElementById("slot0").src="img/"+slot0n+ ".png";
    document.getElementById("slot1").src="img/"+slot1n+ ".png";
    document.getElementById("slot2").src="img/"+slot2n+ ".png";

    //Ejecutamos la función para asignar los premios
    awards();
}

function exit(){
    //Muestra una alerta con el número total de monedas.
    alert("Has terminado con " + userCoins + " monedas.")

    //Recargamos para vovler a jugar.
    location.reload();
}

function awards(){
    
    let award = 0;

    //Si salen tres zanahorias, se ganan diez monedas.
    if(slot0 == 6 && slot1 == 6 && slot2 == 6){
        award = award + 10;
    }

    // Si salen tres hortalizas iguales que no sean zanahorias, se ganan cinco monedas.
    else if (slot0 == slot1 && slot1 == slot2 && slot0 != 6){
        award = award + 5;
    }
    else if (slot2 == slot1 && slot1 == slot0 &&slot2 != 6){
        award = award + 5;
    }
    else if (slot2 == slot1 && slot1 == slot0 && slot1 != 6){
        award = award + 5;
    }

    //Si salen dos zanahorias, se ganan cuatro monedas.
    else if(slot0 == 6 && slot2 == 6){
        award = award + 4;
    }
    else if(slot0 == 6 && slot1 == 6 ){
        award = award + 4;
    }
    else if(slot1 == 6 && slot2 == 6){
        award = award + 4;
    }

    //Si sale una zanahoria y dos hortalizas iguales, se ganan tres monedas.
    else if (slot0 == slot2 && slot1 == 6){
        award = award + 3;
    }
    else if (slot0 == slot1 && slot2 == 6){
        award = award + 3;
    }
    else if (slot2 == slot1 && slot0 == 6){
        award = award + 3;
    }   

    //Si salen dos hortalizas iguales que no sean zanahorias, se ganan dos monedas.
    else if (slot0 == slot2 && slot0 != 6){
        award = award + 2;
    }
    else if (slot0 == slot1 && slot0 != 6){
        award = award + 2;
    }
    else if (slot2 == slot1 && slot1 != 6){
        award = award + 2;
    }

    //Si sale una zanahoria, se gana una moneda.
    else if(slot0 == 6 || slot1 == 6 || slot2 == 6){
        award++;
    }
    //Le sumamos las monedas de ganadas a las monedas totales.
    userCoins = userCoins + award;

    //Añadimos un listItem al principio de la lista con las monedas ganadas también la diferencia final restando la moneda que cuesta tirar.
    $("#awardList li:first").after('<li><p>¡Has conseguido '+ award + ' monedas de premio! (Cambio total: '+ --award + ' monedas.)</p></li>');
    showCoins();
}
function showCoins(){    
    //Seleccionamos el contenedor de los userCoins y le actualizamos a su valor.
    document.getElementById('userCoins').innerHTML = userCoins;
}
