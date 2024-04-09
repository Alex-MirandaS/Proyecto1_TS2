<?php
class mysqlconection
{

    public function conection()
    {
        $enlace = mysqli_connect("localhost", "root", "", "g_swap");
        return $enlace;
    }

    public function verifyConection()
    {
        echo "La referencia esta bien en mysqlconection";
    }


}

?>