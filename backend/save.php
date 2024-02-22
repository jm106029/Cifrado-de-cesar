<?php
// Función para cifrar un mensaje utilizando el cifrado de César con un desplazamiento fijo de 5
function cifrarCesar($mensaje) {
    $resultado = '';
    $longitud = strlen($mensaje);
    for ($i = 0; $i < $longitud; $i++) {
        $caracter = $mensaje[$i];
        // Verificamos si el caracter es una letra
        if (ctype_alpha($caracter)) {
            // Obtenemos el código ASCII del caracter
            $codigoAscii = ord($caracter);
            // Determinamos si es mayúscula o minúscula
            $mayuscula = ctype_upper($caracter);
            // Aplicamos el desplazamiento
            $nuevoCodigoAscii = $mayuscula ? (($codigoAscii - 65 + 5) % 26) + 65 : (($codigoAscii - 97 + 5) % 26) + 97;
            // Convertimos el código ASCII nuevamente al caracter y lo concatenamos al resultado
            $resultado .= chr($nuevoCodigoAscii);
        } else {
            // Si no es una letra, simplemente lo agregamos al resultado sin cifrar
            $resultado .= $caracter;
        }
    }
    return $resultado;
}

// Función para descifrar un mensaje utilizando el cifrado de César con un desplazamiento fijo de 5
function descifrarCesar($mensajeCifrado) {
    $resultado = '';
    $longitud = strlen($mensajeCifrado);
    for ($i = 0; $i < $longitud; $i++) {
        $caracter = $mensajeCifrado[$i];
        // Verificamos si el caracter es una letra
        if (ctype_alpha($caracter)) {
            // Obtenemos el código ASCII del caracter
            $codigoAscii = ord($caracter);
            // Determinamos si es mayúscula o minúscula
            $mayuscula = ctype_upper($caracter);
            // Aplicamos el desplazamiento inverso
            $nuevoCodigoAscii = $mayuscula ? (($codigoAscii - 65 - 5 + 26) % 26) + 65 : (($codigoAscii - 97 - 5 + 26) % 26) + 97;
            // Convertimos el código ASCII nuevamente al caracter y lo concatenamos al resultado
            $resultado .= chr($nuevoCodigoAscii);
        } else {
            // Si no es una letra, simplemente lo agregamos al resultado sin descifrar
            $resultado .= $caracter;
        }
    }
    return $resultado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cifrar"])) {
        $mensaje = $_POST["mensaje"];
        $mensajeCifrado = cifrarCesar($mensaje);
        echo "Mensaje cifrado: " . $mensajeCifrado;
    } elseif (isset($_POST["descifrar"])) {
        $mensajeCifrado = $_POST["mensaje_cifrado"];
        $mensajeDescifrado = descifrarCesar($mensajeCifrado);
        echo "Mensaje descifrado: " . $mensajeDescifrado;
    } else {
        echo "Operación no válida";
    }
} else {
    echo "Solicitud no válida";
}
?>
