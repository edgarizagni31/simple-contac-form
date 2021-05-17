<?php  
    $errors = '';
    $send = false;


    if ( isset( $_POST['submit']) ) {
        # extract data
        extract($_POST);

        # validate name
        if ( !empty( $name ) ) {
            $name = trim($name);
            filter_var($name, FILTER_SANITIZE_STRING );
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
            $message = trim($message);
            $message = stripslashes($message);
            $message = htmlspecialchars($message);
        }else {
            $errors .= "Por favor ingrese un mensaje <br />";
        }

        if ( !$errors ) {
            $to = "eom3108@gmail.com";
            $subject = "Enviado desde ". $_SERVER['SERVER_ADDR'];
            $message_final = "De: ".$name."\n";
            $message_final .= "Correo: ".$email."\n";
            $message_final .= "Mensaje: ".$message."\n"; 

            mail($to, $subject, $message_final);
            $send = true;
        }
    }

    require 'index.view.php';
?>