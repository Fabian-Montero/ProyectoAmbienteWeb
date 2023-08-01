<?php

    function OpenBD()
    {
        return mysqli_connect("127.0.0.1:3307", "root", "", "ambienteweb28_07");
        
    }

    function CloseBD($enlace)
    {
        mysqli_close($enlace);
    }

?>