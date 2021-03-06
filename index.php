<?php
    require 'vendor/autoload.php';
    require 'libs/send_email.php';

    $errors = '';
    $send = false;

    if ( isset( $_POST['submit']) ) {
        # extract data
        extract($_POST);

        # validate name
        if ( !empty( $name ) ) {
            filter_var($name, FILTER_SANITIZE_STRING );
            $name = trim($name);
        } else {
            $errors .= "Por favor ingrese un nombre <br/>";
        }

        # validate email
        if ( !empty( $email )) {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if ( !filter_var($email,  FILTER_VALIDATE_EMAIL)) {
                $errors .= "Por favor ingrese un correo valido <br/>";
            }

        } else {
            $errors .= "Por favor ingrese un correo <br/>";
        }
        
        # validate message
        if ( !empty( $message )  ) {
            $message = stripslashes($message);
            $message = htmlspecialchars($message);
            $message = trim($message);
        }else {
            $errors .= "Por favor ingrese un mensaje <br />";
        }

        # send email
        if ( !$errors ) {
            $to = "eom3108@gmail.com";
            $subject = "Enviado desde ". $_SERVER['SERVER_ADDR'];
            $message_final = "De: ".$name."\n";
            $message_final .= "Correo: ".$email."\n";
            $message_final .= "Mensaje: ".$message."\n"; 
            $send = send_email($to, $name, $subject, $message_final);
        }
    }

    require 'index.view.php';
?>