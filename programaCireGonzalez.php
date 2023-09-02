<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Gabriel Ignacio Cire - Legajo 3221 - mail: gabriel.cire@est.fi.uncoma.edu.ar - usuario github: nachoeducativo */
/* Sabrina Samanta Gonzalez  - Legajo 4243 - mail:sabrina.gonzalez@est.fi.uncoma.edu.ar - usuario github: Sabrina-Gonzalez*/



/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**FUNCION 1
 * Inicializa y retorna una coleccion de juegos
 * @return array
*/
function cargarJuegos() {
    //incializacion del arrays
    $coleccionJuegos = [];

    // Ejemplo de 10 juegos
    $coleccionJuegos[0] = ["jugadorCruz" => "majo",
        "jugadorCirculo" => "pepe", 
        "puntosCruz" => 5, 
        "puntosCirculo" => 0]; // arrays multimensional
    $coleccionJuegos[1] = ["jugadorCruz" => "juan",
        "jugadorCirculo" => "majo", 
        "puntosCruz" => 1, 
            "puntosCirculo" => 1];
    $coleccionJuegos[2] = ["jugadorCruz" => "ana", 
        "jugadorCirculo" => "lisa", 
        "puntosCruz" => 1,
        "puntosCirculo" => 1];
    $coleccionJuegos[3] = ["jugadorCruz" => "pedro",
        "jugadorCirculo" => "raul",
        "puntosCruz" => 5,
        "puntosCirculo" => 0];
    $coleccionJuegos[4] = ["jugadorCruz" => "raul",
        "jugadorCirculo" => "natalia", 
        "puntosCruz" => 1, 
        "puntosCirculo" => 1];
    $coleccionJuegos[5] = ["jugadorCruz" => "francisco", 
        "jugadorCirculo" => "camila", 
        "puntosCruz" => 1, 
        "puntosCirculo" => 1];
    $coleccionJuegos[6] = ["jugadorCruz" => "micaela", 
        "jugadorCirculo" => "nacho", 
        "puntosCruz" => 5, 
        "puntosCirculo" => 0];
    $coleccionJuegos[7] = ["jugadorCruz" => "daiana", 
        "jugadorCirculo" => "agustina", 
        "puntosCruz" => 1, 
        "puntosCirculo" => 1];
    $coleccionJuegos[8] = ["jugadorCruz" => "euge", 
        "jugadorCirculo" => "maria", 
        "puntosCruz" => 1, 
        "puntosCirculo" => 1];
    $coleccionJuegos[9] = ["jugadorCruz" => "david",
        "jugadorCirculo" => "sofi", 
        "puntosCruz" => 5, 
        "puntosCirculo" => 0];
    
    

    

    return $coleccionJuegos;
}






/**Punto 2
 * Retorna la opcion elegida por el usuario
 * @return int
 */
function seleccionarOpcion() {
    //$opcionElegida
    echo "    Menu de Opciones
    1) Jugar al tateti 
    2) Mostrar un juego
    3) Mostrar el primer juego ganador
    4) Mostrar porcentaje de juegos ganados 
    5) Mostrar resumen de jugador 
    6) Mostrar listado de juegos ordenado por jugador O
    7) Salir
    
    Elegir una Opcion: ";
    $opcionElegida=trim(fgets(STDIN));
    
    while ($opcionElegida < 1 || $opcionElegida > 7) {
        echo "La opcion elegida no es valida, ingrese otra opcion: ";
        $opcionElegida=trim(fgets(STDIN));
    }
    return $opcionElegida;
}



/**Punto 3
 * Retorna un numero valido segun el rango
 *@param int $min 
 *@param int $max
 * @return int
 */
    // pegado del excel
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}
    
/*
function solicitarNumeroEnRango($min, $max) {
    $numeroValido = false;

    while ($numeroValido=true) {
       echo ("Ingrese un número entre $min y $max: ");
         $numero = trim(fgets(STDIN));

        if ($numero >= $min && $numero <= $max) {
            $numeroValido = true;
        } else {
            echo "Número inválido. Por favor, ingrese un número válido dentro del rango.\n";
        }
    }

    return $numero;
}



/**PUNTO 4
 * Muestra los datos de un juego
 * @param int $numeroJuego
 * @param array $coleccionJuegos
 */
function muestraUnJuego($numeroJuego,$coleccionJuegos){
    //$cartel
    while ($numeroJuego<1 || $numeroJuego>(count($coleccionJuegos))) {
        echo "ERROR. Vuelva a ingresar un numero:";
        $numeroJuego=trim(fgets(STDIN));
    }
    if ($coleccionJuegos[$numeroJuego-1]["puntosCruz"] > $coleccionJuegos[$numeroJuego-1]["puntosCirculo"]){
        $cartel="Juego TATETI: ".$numeroJuego. " (gano X) \n";
    }elseif ($coleccionJuegos[$numeroJuego-1]["puntosCruz"] < $coleccionJuegos[$numeroJuego-1]["puntosCirculo"]) {
        $cartel="Juego TATETI: ".$numeroJuego. " (gano O) \n";
    }else {
        $cartel="Juego TATETI: ".$numeroJuego. " (empate) \n";
    }
    if(!($numeroJuego<=0 || $numeroJuego>=11)){
    echo"**********************************\n";
    echo " ".$cartel;
    echo " Jugador X: ".$coleccionJuegos[$numeroJuego-1]["jugadorCruz"]." obtuvo ".$coleccionJuegos[$numeroJuego-1]["puntosCruz"]." puntos\n";
    echo " Jugador O: ".$coleccionJuegos[$numeroJuego-1]["jugadorCirculo"]." obtuvo ".$coleccionJuegos[$numeroJuego-1]["puntosCirculo"]." puntos\n";
    echo "**********************************";    
    }
}





/**PUNTO 5
 * agrega nuevo juego
 * @param array $coleccionJuegos
 * @param array $nuevoJuego
 * @return array
 */
function agregarJuego ($coleccion, $nuevoJuego){
     
    
    
    //$coleccionJuegos[count($coleccion)] = $nuevoJuego;
    array_push($coleccion, $nuevoJuego);
     return $coleccion;
}




/*PUNTO 6
 * Dada una coleccion de juegos y el nombre de un jugador, retorne el indice del primer juego ganado por dicho jugador sino retorna -1
 * @param array $coleccionJuegos
 * @param string $nombreJugador
 *@retur int
 */
function buscarPrimerJuegoGanado ($coleccionJuegos, $nombreJugador){
    //int $indice,$i
    $indice =-1;
    $i=0;
    while ($i<count($coleccionJuegos) && $indice == -1) {
        $juego=$coleccionJuegos[$i];

        if ($juego["jugadorCruz"]==$nombreJugador) {
            if ($juego["puntosCruz"] > $juego["puntosCirculo"]) {
                $indice=$i;
            }
        } elseif ($juego["jugadorCirculo"]==$nombreJugador){
            if ($juego["puntosCirculo"] > $juego["puntosCruz"]) {
                $indice=$i;
            }
        }
        
        
        $i++;
    }


return $indice;
}






/**PUNTO 7
  *  este modulo obtiene el resumen del jugador
  *@param array $coleccionJuegos
  *@param string $jugador
  *@return string
  */
function obtenerResumenJugador($coleccionJuegos, $jugador){
    $resumenJugador = [ 
        "nombre" => $jugador,
        "juegosGanados" => 0,
        "juegosPerdidos" => 0,
        "juegosEmpatados" => 0,
        "puntosAcumulados" => 0
    ];
    foreach ($coleccionJuegos as $juego) {// se recorre cada juego de la colección uno por uno y se asigna a la variable $juegos
        if ($juego["jugadorCruz"] == $jugador) {//se verifica si el jugador del juego de la cruz ($juego["jugadorCruz"]) es igual al jugador especificado $jugador.
            //ganò
            if ($juego["puntosCruz"] > $juego["puntosCirculo"]){
                $resumenJugador["juegosGanados"]= $resumenJugador["juegosGanados"] + 1;
             
            } elseif ($juego["puntosCirculo"] > $juego["puntosCruz"]) {//perdiò
                $resumenJugador["juegosPerdidos"]= $resumenJugador["juegosPerdidos"]+1;
            } else { //empate
                $resumenJugador["juegosEmpatados"]= $resumenJugador["juegosEmpatados"]+1;
            }
            
            $resumenJugador["puntosAcumulados"] =  $resumenJugador["puntosAcumulados"]+ $juego["puntosCruz"];// acumulador
        
                
        //CIRCULO
        } elseif ($juego["jugadorCirculo"] == $jugador) {
            //gano
            if ($juego["puntosCirculo"] > $juego["puntosCruz"]){
                $resumenJugador["juegosGanados"]= $resumenJugador["juegosGanados"] + 1;
            } elseif ($juego["puntosCruz"] > $juego["puntosCirculo"]) {//perdiò
                $resumenJugador["juegosPerdidos"]= $resumenJugador["juegosPerdidos"]+1;
            } else { //empate
                $resumenJugador["juegosEmpatados"]= $resumenJugador["juegosEmpatados"]+1;
            }

            $resumenJugador["puntosAcumulados"] =  $resumenJugador["puntosAcumulados"]+ $juego["puntosCirculo"];// acumulador
        }
            
    
    }
    return $resumenJugador;
}

// ejemplo de salida 
/**Array
(
    [nombre] => nacho
    [juegosGanados] => 1
    [juegosPerdidos] => 1
    [juegosEmpatados] => 0
    [puntosAcumulados] => 4
)
*/





  /**PUNTO 8
  * Solicita al usuario un simbolo (X/O) y retorna el simbolo elegido
  *@return string
  */
  function simboloElegido(){
    //string $simbolo
    echo "Elija un simbolo (X o O):";
    $simbolo=trim(fgets(STDIN));
    while (!($simbolo=="x"|| $simbolo=="o")){
        echo "Elija un simbolo (X o O):";
        $simbolo=trim(fgets(STDIN));
    };
    return $simbolo;
}




/**PUNTO 9
 *Retorna la cantidad de juegos ganados (sin importar si es X o O)
 *@param array $coleccionJuegos
 *@return int 
 */
function juegosGanados($coleccionJuegos){
    //$cantGanados
    $cantGanados=0;
    for ($i=0; $i <count($coleccionJuegos) ; $i++) { 
        if ($coleccionJuegos[$i]["puntosCruz"]>$coleccionJuegos[$i]["puntosCirculo"] ||$coleccionJuegos[$i]["puntosCirculo"]>$coleccionJuegos[$i]["puntosCruz"] ) {
            $cantGanados=$cantGanados+1;
        }
    }
    return $cantGanados;
}






/**PUNTO 10
 * Dada una coleccion de juegos y un simbolo (X o O) retorne la cantidad de juegos ganados por el simbolo ingresado por parametro
 * @param array $coleccionJuegos
 * @param string $simboloXO
 * @return int
 */
function cantJuegosGanados($coleccionJuegos,$simboloXO){
    //int $cantidadGanados
    $cantidadGanados=0;
    for ($i=0; $i < count($coleccionJuegos); $i++) { 
        if ($simboloXO=="x" && $coleccionJuegos[$i]["puntosCruz"]>$coleccionJuegos[$i]["puntosCirculo"]) {
                $cantidadGanados=$cantidadGanados+1;
        }elseif ($simboloXO=="o" && $coleccionJuegos[$i]["puntosCirculo"]>$coleccionJuegos[$i]["puntosCruz"]) {
                $cantidadGanados=$cantidadGanados+1;
    }
    }
    return $cantidadGanados;
}



/**funcion comparacion punto 11
 * @param array $juego1
 * @param array $juego2
 * @return int
 */
function ordenarJugadorO($juego1, $juego2){
    // int $orden
    if ($juego1["jugadorCirculo"] > $juego2["jugadorCirculo"]) {
        $orden=1;
    }elseif ($juego1["jugadorCirculo"]<$juego2["jugadorCirculo"]) {
        $orden=-1;

    } else {
        $orden=0;
    }
    return $orden;
  }

 /**PUNTO 11
* Muestra la coleccion de juegos ordenado por el nombre del jugador que tiene el simbolo O
* @param array $coleccionJuegos
*/
function ordenar($coleccionJuegos){
    uasort($coleccionJuegos,'ordenarJugadorO');
    print_r($coleccionJuegos);
}














/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
//int $nroJuego,$juegoGanado,$opcion,$ganados,$ganadosSimbolo
//string $nombreJ,$muestraJuego,$nombre,$simbolo
//array $coleccion,$resumen,$ordenJugadorO
//float $porcentaje

//Inicialización de variables:


//Proceso:

//$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);

$coleccion = cargarJuegos(); // estructura del juego precargada


do {
    $opcion = solicitarNumeroEntre(1,7);

    
    switch ($opcion) {
        case 1: /*se inicia un juego de tateti solicitando los nombres de los jugadores. Luego de finalizar,
                    los datos del juego deben ser guardados en una estructura de datos de juegos*/
            
            $juego = jugar();
            print_r($juego);
            print_r($coleccion);
            $coleccion = agregarJuego($coleccion, $juego);
            print_r($coleccion);
            break;
        case 2: //Se le solicita al usuario un número de juego y se muestra en pantalla 
            
            echo "Ingrese el numero de juego: ";
            $nroJuego=trim(fgets(STDIN));
            $muestraJuego=muestraUnJuego($nroJuego,$coleccion);
            break;
        case 3: /*Se le solicita al usuario un nombre de jugador y se muestra enpantalla el primer juego ganado por dicho jugador*/

            echo "Ingrese el nombre de un jugador:";
            $nombreJ=trim(fgets(STDIN));
            $juegoGanado=buscarPrimerJuegoGanado($coleccion,$nombreJ);
            if ($juegoGanado!=-1) {
                echo "************************************\n";
                echo "Juego TATETI :".($juegoGanado+1)."\n";
                echo "Jugador X : ".$coleccion[$juegoGanado]["jugadorCruz"] ." obtuvo ". $coleccion[$juegoGanado]["puntosCruz"] ." puntos\n";
                echo "Jugador O: " .$coleccion[$juegoGanado]["jugadorCirculo"] ." obtuvo ". $coleccion[$juegoGanado]["puntosCirculo"] ." puntos\n";
                echo "************************************";
            }else {
                echo "El jugador $nombreJ no gano ningun juego";
            }

            break;
        
         case 4: /**Se le solicita al usuario que elija uno de los símbolos (X o O), y 
                    se muestra qué porcentaje de todos los juegos ganados, el ganador es el símbolo elegido por el usuario */
                $simbolo=simboloElegido();
                $ganados=juegosGanados($coleccion);
                $ganadosSimbolo=cantJuegosGanados($coleccion,$simbolo);
                $porcentaje=$ganadosSimbolo*100/$ganados;
                echo $simbolo. " gano el ".$porcentaje." % de los juegos ganados";
            break;
        case 5: /*Se le solicita al usuario un nombre de jugador y se muestra en pantalla 
                    un resumen de los juegos ganados, los juegos perdidos, empates y acumulado de puntos*/

            echo "Ingrese el nombre de un jugador:";
            $nombre=trim(fgets(STDIN));
            $resumen=obtenerResumenJugador($coleccion,$nombre);
            echo "*************************************\n";
            echo "Jugador: ".$nombre."\n";
            echo "Gano: ".$resumen["juegosGanados"]."\n";
            echo "Perdio: ".$resumen["juegosPerdidos"]."\n";
            echo "Empato: ".$resumen["juegosEmpatados"]."\n";
            echo "Total de puntos acumulados: ".$resumen["puntosAcumulados"]." puntos"."\n";
            echo "***************************************";
            break;
         case 6: /**Se mostrará en pantalla la estructura ordenada alfabéticamente por jugador 0 */
            
            $ordenJugadorO=ordenar($coleccion);

            break;
         case 7: //Sale del Programa

            break;
        
        
     
    }
} while ($opcion != 7);