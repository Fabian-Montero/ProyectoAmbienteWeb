<?php

    function EnviarCorreo($destinatario, $asunto, $cuerpo)
    {
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $correoSalida = "marias80378@ufide.ac.cr";
        $contrasennaSalida = "22549727-Michael*";

        $mail = new PHPMailer();
        $mail -> CharSet = 'UTF-8';

        $mail -> IsSMTP();
        $mail -> IsHTML(true); 
        $mail -> Host = 'smtp.office365.com'; // smtp.gmail.com
        $mail -> SMTPSecure = 'tls';
        $mail -> Port = 587;                      
        $mail -> SMTPAuth = true;
        $mail -> Username = $correoSalida;               
        $mail -> Password = $contrasennaSalida;                                
        
        $mail -> SetFrom($correoSalida);
        $mail -> Subject = $asunto;
        $mail -> MsgHTML($cuerpo);   
        $mail -> AddAddress($destinatario);

        $mail -> send();
    }

?>