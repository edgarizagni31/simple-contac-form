<?php
    use Dotenv\Dotenv;
    use PHPMailer\PHPMailer\PHPMailer;

    function send_email($to, $name, $subject, $message_final) {
        $send = false;

        # load .env
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']."/curso-php/formulario");
        $dotenv->load();
        extract($_ENV);

        # load php mailer
        $mail = new PHPMailer(true);
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        try {
            # smtp config
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $EMAIL;
            $mail->Password   = $PASS;
            $mail->Port       = 587;

            # send email config
            $mail->setFrom($to, $name);
            $mail->addAddress('eom3108@gmail.com', $name);
            $mail->Subject = $subject;
            $mail->Body    = $message_final;

            $mail->send();
            $send = true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return $send;
    }
?>