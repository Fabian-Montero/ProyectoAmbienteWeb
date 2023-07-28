<?php

    function OpenBD()
    {
        return mysqli_connect("127.0.0.1:3307", "root", "", "ambienteweb27_07");
        
    }

    function CloseBD($enlace)
    {
        mysqli_close($enlace);
    }

?>