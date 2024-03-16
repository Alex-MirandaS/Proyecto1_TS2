<!DOCTYPE html>
<html>
    <head>
        <title>INDEX</title>
    </head>
    <body>
        <!--php se abre con php-->
        <?php
            echo "¡Hola, soy un script de PHP! xd \n";
            //PUEDO METER COMENTARIOS ASI TAMBIEN
            # HOLA XD
            /*HOLA XD */

            //VARIABLES: se coloca $nombreVariable = valor;
            $a_bool = true;   // a bool
            $a_str  = "foo";  // a string
            $a_str2 = 'foo';  // a string
            $an_int = 12;     // an int
            $arreglo = array("foo" => "bar","bar" => "foo"); //array, "INDICE/0" => "VALOR"
            $arreglo2 = ["foo" => "bar","bar" => "foo"]; //array
            $arreglo3 = [1,2,3,4,5]; //array
            $arreglo3[] = 56;    // ADD NEW ELEMENT
            unset($arreglo3[3]); //remove an element in a specific place
            echo $arreglo3[2];

            //echo get_debug_type($a_bool), "\n";//obtiene el tipo de variable
            //echo get_debug_type($a_str), "\n";

            // If this is an integer, increment it by four
            if (is_int($an_int)) {//verifica si es de un tipo de variable
                $an_int += 4;
            }
            //var_dump($an_int);

            // If $a_bool is a string, print it out
            if (is_string($a_bool)) {
                //echo "String: $a_bool";
            }

            //If
            if ($a > $b){
                echo "a is bigger than b";
            }
            if ($a > $b) {
                echo "a is greater than b";
              } else {
                echo "a is NOT greater than b";
              }

            # GET GLOBAL EN LA URL, /nombre=hola&apellido=xd
            //$_GET["nombreVariable"]

            #FUNCIONES
            function compararNombre(){
                echo "HOLA DESDE FUNCION";
            }
        ?>

    </body>
</html>