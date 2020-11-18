<?php
/******************************************
 * TODO: Agregar legajos una vez terminado el TP
 * NOMBRE Y APELLIDOS - LEGAJOS
 * Gonzalez, Juan Marcos - FAI-
 * Graff, Rocio Gisel - FAI-
 * Scantamburlo, Santiago - FAI-
 ******************************************/

/**
 * Esta funcion genera un arreglo asociativo de palabras para jugar
 * @return array $coleccionPalabras
 */
function cargarPalabras()
{
    $coleccionPalabras = [];
    $coleccionPalabras[0] = ["palabra" => "papa", "pista" => "se cultiva bajo tierra", "puntosPalabra" => 4];
    $coleccionPalabras[1] = ["palabra" => "hepatitis", "pista" => "enfermedad que inflama el higado", "puntosPalabra" => 7];
    $coleccionPalabras[2] = ["palabra" => "volkswagen", "pista" => "marca de vehiculo", "puntosPalabra" => 10];
    $coleccionPalabras[3] = ["palabra" => "torre", "pista" => "estructura alta", "puntosPalabra" => 6];
    $coleccionPalabras[4] = ["palabra" => "casa", "pista" => "lugar de residencia", "puntosPalabra" => 4];
    $coleccionPalabras[5] = ["palabra" => "tomate", "pista" => "es una fruta", "puntosPalabra" => 6];
    $coleccionPalabras[6] = ["palabra" => "rompecabezas", "pista" => "es un juego de mesa", "puntosPalabra" => 7];
    $coleccionPalabras[7] = ["palabra" => "salvavidas", "pista" => "te ayuda a flotar en el agua", "puntosPalabra" => 7];

    // TODO: se podria agregar 3-4 palabras mas

    return $coleccionPalabras;
}

/**
 * Esta funcion almacena distintas partidas que se jugaron junto con el puntaje y la palabra con la que se jugó
 *
 */
function cargarJuegos()
{
    $coleccionJuegos = [];
    $coleccionJuegos[0] = ["puntos" => 0, "indicePalabra" => 1];
    $coleccionJuegos[1] = ["puntos" => 10, "indicePalabra" => 2];
    $coleccionJuegos[2] = ["puntos" => 0, "indicePalabra" => 1];
    $coleccionJuegos[3] = ["puntos" => 8, "indicePalabra" => 0];
    $coleccionJuegos[4] = ["puntos" => 8, "indicePalabra" => 6];
    $coleccionJuegos[5] = ["puntos" => 10, "indicePalabra" => 4];
    $coleccionJuegos[6] = ["puntos" => 10, "indicePalabra" => 7];

    return $coleccionJuegos;
}

/**
 * Esta funcion a partir de la palabra recibida por parametro genera un arreglo asociativo de las letras de la palabra en juego
 * Para esto se recorre a la palabra y se separa en letras tapandolas con un * en la posicion de la misma
 * @param string $palabra
 * @return array $letras
 */
function dividirPalabraEnLetras($palabra)
{
    // Declaracion de variables
    // int $cantLetras. $i

    // Inicializacion de variables
    $letras = [];
    $cantLetras = strlen($palabra); // Le asigno la longitud de la palabra en juego

    // Recorro la palabra en juego y voy colocando su letras en un nuevo arreglo
    for ($i = 0; $i < $cantLetras; $i++) {
        $letras[$i]["letra"] = $palabra[$i];
        $letras[$i]["descubierta"] = false;
    }

    return $letras;
}

/**
 * Esta funcion muestra por pantalla el menu de usuario y obtiene una opcion de menú
 * @return int $opcion
 */
function seleccionarOpcion()
{
    echo "--------------------------------------------------------------\n";
    echo "1) Jugar con una palabra aleatoria. \n";
    echo "2) Jugar con una palabra elegida. \n";
    echo "3) Agregar una palabra la listado. \n";
    echo "4) Mostrar la información completa de un número de juego. \n";
    echo "5) Mostrar la información completa del primer juego con más puntaje. \n";
    echo "6) Mostrar la información completa del primer juego que supere un puntaje. \n";
    echo "7) Mostrar la lista de palabras ordenada por orden alfabético. \n";
    echo "0) Salir del programa. \n";

    // Se controla la opcion ingresada desde el programa principal en el switch correspondiente

    echo "--------------------------------------------------------------\n";
    echo "Ingrese una opcion: ";
    $opcion = (int) trim(fgets(STDIN));
    return $opcion;
}

/**
 * Determina si una palabra existe en el arreglo de palabras
 * @param array $coleccionPalabras
 * @param string $palabra
 * @return boolean $existe
 */
function existePalabra($coleccionPalabras, $palabra)
{
    // Declaracion de variables
    // int $i, $cantPal
    // boolean $existe

    // Inicializacion de variables
    $i = 0;
    $cantPal = count($coleccionPalabras); // Le asigno la longitud del arreglo de palabras
    $existe = false;

    // Recorro el arreglo de forma parcial, frena en el momento que se encuentre la palabra solicitada
    // Si existe, retorna true, de lo contrario false
    while ($i < $cantPal && !$existe) {
        $existe = $coleccionPalabras[$i]["palabra"] == $palabra;
        $i++;
    }

    return $existe;
}

/**
 * Determina si una letra existe en el arreglo de letras
 * @param array $coleccionLetras
 * @param string $letra
 * @return boolean $existe
 */
function existeLetra($coleccionLetras, $letra)
{
    // Declaracion de variables
    // int $i
    // boolean $existe

    // Inicializo variables
    $i = 0;
    $existe = false;

    // Recorro el arreglo de manera parcial para corroborar la existencia de la letra dentro del mismo
    // Si existe retorna true
    while ($i < count($coleccionLetras)) {
        if ($coleccionLetras[$i]["letra"] == $letra) {
            $existe = true;
        }
        $i++;
    }

    return $existe;
}

/**
 * Solicita los datos correspondientes a un elemento de la coleccion de palabras: palabra, pista y puntaje.
 * Internamente la función también verifica que la palabra ingresada por el usuario no exista en la colección de palabras.
 * @param array $coleccionPalabras
 * @return array  colección de palabras modificada con la nueva palabra.
 */
/*>>> Completar la interfaz y cuerpo de la función. Debe respetar la documentación <<<*/

/**
 * Esta funcion obtiene un indice aleatorio del arreglo de palabras
 * @param int $min
 * @param int $max
 * @return int $i
 */
function indiceAleatorioEntre($min, $max)
{
    /**
     * Para utilizar la primer opcion del menu de usuario (palabra aleatoria) se va a generar un numero aleatorio correspondiente a la cantidad de palabras que hay disponibles
     * Para esto, se va a utilizar la funcion rand. Esta funciom genera un numero entero aleatorio entre otros dos incluidos
     * Por ejemplo, rand(3, 9) va arrojar un numero aleatorio entre 3 y 9 incluidos
     */

    // Declaracion de variables
    // int $i

    $max = $max - 1; // Le resto 1 a $max para que rand no seleccione un indice fuera de la longitud del arreglo de palabras

    $i = rand($min, $max); // Le asigno a $i un numero aleatorio entre el minimo y maximo

    return $i; // Retorno el indice aleatorio
}

/**
 * solicitar un valor entre min y max
 * @param int $min
 * @param int $max
 * @return int $i
 */
function solicitarIndiceEntre($min, $max)
{
    do {
        echo "Seleccione un valor entre $min y $max: ";
        $i = (int) trim(fgets(STDIN));
    } while (!($i >= $min && $i <= $max));

    return $i;
}

/**
 * Determinar si la palabra fue descubierta, es decir, todas las letras fueron descubiertas
 * @param array $coleccionLetras
 * @return boolean
 */
function palabraDescubierta($coleccionLetras)
{

    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
}

/**
 * Esta funcion solicita al usuario una letra que luego en otros modulos se le aplicara diferentes funciones para asi verifcar su existencia en la palabra
 * Como asi tambien se la utilizara para destaprar un caracter oculto dentro de la palabra
 * @return string $letra;
 */
function solicitarLetra()
{
    // Declaracion de variables
    // boolean $letraCorrecta
    // String $letra

    // Inicializacion de variables
    $letraCorrecta = false;

    do {
        echo "Ingrese una letra: ";
        $letra = strtolower(trim(fgets(STDIN))); // Se fuerza que la letra ingresada este en minusculas

        // Si se ingresa 0 o mas de un caracter arroja error, de lo contrario es una letra correcta
        if (strlen($letra) != 1) {
            echo "Debe ingresar 1 letra!\n";
        } else {
            $letraCorrecta = true;
        }

    } while (!$letraCorrecta);

    return $letra;
}

/**
 * Descubre todas las letras de la colección de letras iguales a la letra ingresada.
 * Devuelve la coleccionLetras modificada, con las letras descubiertas
 * @param array $coleccionLetras
 * @param array $coleccionLetrasModificado
 * @param string $letra
 * @return array $coleccionLetrasModificado
 */
function destaparLetra($coleccionLetras, $coleccionLetrasModificado, $letra)
{
    // Declaracion de variables
    // int $i

    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/

    // Recorro el arreglo buscando las incidencias de la letra ingresada y remplazo el * por su letra correspondiente
    for ($i = 0; $i < count($coleccionLetras); $i++) {
        if ($coleccionLetras[$i]["letra"] == $letra) {
            $coleccionLetrasModificado[$i] = $letra;
        }
    }

    return $coleccionLetrasModificado;
}

/**
 * obtiene la palabra con las letras descubiertas y * (asterisco) en las letras no descubiertas. Ejemplo: he**t*t*s
 * @param array $coleccionLetras
 * @return string $pal Ejemplo: "he**t*t*s"
 */
function stringLetrasDescubiertas($coleccionLetras)
{
    // Declaracion de variables
    // int $i
    // String $pal

    // Inicializacion de variables
    $pal = "";

    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
    for ($i = 0; $i < count($coleccionLetras); $i++) {
        $pal = $pal . $coleccionLetras[$i];
    }

    return $pal;
}

/**
 * Desarrolla el juego y retorna el puntaje obtenido
 * Si descubre la palabra se suma el puntaje de la palabra más la cantidad de intentos que quedaron
 * Si no descubre la palabra el puntaje es 0.
 * @param array $coleccionPalabras
 * @param int $indicePalabra
 * @param int $cantIntentos
 * @return int puntaje obtenido
 */
function jugar($coleccionPalabras, $indicePalabra, $cantIntentos)
{
    // Declaracion de variables
    // String $letra, $pal, $palabraModificada
    // array $coleccionLetrasModificado, $coleccionLetras
    // int $i, $longitudPalabra, $puntaje
    // boolean $palabraFueDescubierta, $existeLetra

    // Inicializacion de variables
    $pal = $coleccionPalabras[$indicePalabra]["palabra"];
    $palabraModificada = "";
    $coleccionLetras = dividirPalabraEnLetras($pal);
    $longitudPalabra = count($coleccionLetras);
    $coleccionLetrasModificado = [];
    $existeLetra = false;
    $puntaje = 0;
    $palabraFueDescubierta = false;

    // Armar un nuevo arreglo de letras (modificado) donde las letras son asteriscos y lo muestro por pantalla
    for ($i = 0; $i < $longitudPalabra; $i++) {
        $coleccionLetrasModificado[$i] = "*";
        echo $coleccionLetrasModificado[$i] . "";
    }

    echo "\n";

    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/

    // Muestro la pista de la palabra en juego
    echo "Pista: " . $coleccionPalabras[$indicePalabra]["pista"] . "\n";

    //solicitar letras mientras haya intentos y la palabra no haya sido descubierta:
    while ($cantIntentos > 0 && $palabraFueDescubierta == false) {
        echo "Ingrese una letra: ";
        $letra = trim(fgets(STDIN));

        // Verifico la existencia de la letra ingresa en la coleccion de letras desde su funcion correspondiente
        $existeLetra = existeLetra($coleccionLetras, $letra);

        // Si la letra existe, se destapa la misma en el lugar del arreglo de letras modificado
        // TODO: agregar que si la letra ya fue descubierta previamente que vuelva a intentar sin haber perdido un intento
        if ($existeLetra) {
            $coleccionLetrasModificado = destaparLetra($coleccionLetras, $coleccionLetrasModificado, $letra);

            // Muestro por pantalla como va quedando la palabra a medida que se van descubriendo
            for ($i = 0; $i < count($coleccionLetrasModificado); $i++) {
                echo $coleccionLetrasModificado[$i] . "";
            }
            echo "\n";

            // Armo un string nuevo con la palabra modifica a medida que se va descubriendo y la almaceno en su variable correspondiente
            $palabraModificada = stringLetrasDescubiertas($coleccionLetrasModificado);

            // Verifico que la palabra modificada sea igual a la palabra en juego
            if ($palabraModificada == $pal) {
                $palabraFueDescubierta = true;
            }

        } else {
            // TODO: dibujarTipito
            echo "Esa letra no está! \n";
            $cantIntentos--;
            echo "Intentos restantes: " . $cantIntentos . "\n";
        }
    }

    if ($palabraFueDescubierta) {
        //obtener puntaje:
        $puntaje = $coleccionPalabras[$indicePalabra]["puntosPalabra"] + $cantIntentos;
        echo "\n¡¡¡¡¡¡GANASTE " . $puntaje . " puntos!!!!!!\n";
    } else {
        echo "\n¡¡¡¡¡¡AHORCADO AHORCADO!!!!!!\n";
    }

    return $puntaje;
}

/**
 * Agrega un nuevo juego al arreglo de juegos
 * @param array $coleccionJuegos
 * @param int $ptos
 * @param int $indicePalabra
 * @return array coleccion de juegos modificada
 */
function agregarJuego($coleccionJuegos, $puntos, $indicePalabra)
{
    $coleccionJuegos[] = ["puntos" => $puntos, "indicePalabra" => $indicePalabra];
    return $coleccionJuegos;
}

/**
 * Muestra los datos completos de un registro en la colección de palabras
 * @param array $coleccionPalabras
 * @param int $indicePalabra
 */
function mostrarPalabra($coleccionPalabras, $indicePalabra)
{
    //$coleccionPalabras[0]= ["palabra"=> "papa" , "pista" => "se cultiva bajo tierra", "puntosPalabra"=>7);

    /*>>> Completar el cuerpo de la función, respetando lo indicado en la documentacion <<<*/
}

/**
 * Muestra los datos completos de un juego
 * @param array $coleccionJuegos
 * @param array $coleccionPalabras
 * @param int $indiceJuego
 */
function mostrarJuego($coleccionJuegos, $coleccionPalabras, $indiceJuego)
{
    //["puntos"=> 8, "indicePalabra" => 1)
    echo "\n\n";
    echo "<-<-< Juego " . $indiceJuego . " >->->\n";
    echo "  Puntos ganados: " . $coleccionJuegos[$indiceJuego]["puntos"] . "\n";
    echo "  Información de la palabra:\n";
    mostrarPalabra($coleccionPalabras, $coleccionJuegos[$indiceJuego]["indicePalabra"]);
    echo "\n";
}

/*>>> Implementar las funciones necesarias para la opcion 5 del menú <<<*/

/*>>> Implementar las funciones necesarias para la opcion 6 del menú <<<*/

/*>>> Implementar las funciones necesarias para la opcion 7 del menú <<<*/

/**
 * PROGRAMA PRINCIPAL
 * array $arregloPalabras
 * int $cantidadIntentos, $opcion, $minimoPalabras, $maximoPalabras, $numeroPalabra, $puntajeFinal
 *
 */
// define("CANT_INTENTOS", 6); //Constante en php para cantidad de intentos que tendrá el jugador para adivinar la palabra.

// Inicializacion de variables
$cantidadIntentos = 6;
$minimoPalabras = 0;
$maximoPalabras = 0;
$puntajeFinal = 0;
$arregloPalabras = cargarPalabras(); // Le asigno el arreglo de palabras

do {
    $opcion = seleccionarOpcion();
    // La instruccion switch corresponde al tipo de estructura de control alternativo. La misma se la puede reemplazar por un if con varios elseif y un else al final de todas las posibilidades
    switch ($opcion) {
        case 0: // Salida del menu
            echo "Fin del juego! \n";
            break;
        case 1: // Jugar con una palabra aleatoria
            $maximoPalabras = count($arregloPalabras);
            $numeroPalabra = indiceAleatorioEntre($minimoPalabras, $maximoPalabras);
            $puntajeFinal = jugar($arregloPalabras, $numeroPalabra, $cantidadIntentos);

            break;
        case 2: // Jugar con una palabra elegida

            break;
        case 3: // Agregar una palabra al listado

            break;
        case 4: // Mostrar la información completa de un número de juego

            break;
        case 5: // Mostrar la información completa del primer juego con más puntaje

            break;
        case 6: // Mostrar la información completa del primer juego que supere un puntaje indicado por el usuario

            break;
        case 7: // Mostrar la lista de palabras ordenada por orden alfabetico

            break;
        default:
            echo "Opcion incorrecta. Verifique por favor. \n";
            break;
    }
} while ($opcion != 0);

echo "Gracias por haber jugado con nosotros!";
