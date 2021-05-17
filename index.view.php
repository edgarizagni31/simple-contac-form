<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulario de contacto</title>
</head>
<body>
    <main class="main">
        <form 
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" 
            method="post"
            class="form"
        >   
            <input type="text" name="name" id="name" placeholder="Nombre"  class="form__control">
            <input type="text" name="email" id="email" placeholder="Email"  class="form__control">
            <textarea name="message" id="message" class="form__area" placeholder="Mensaje"></textarea>
            <input type="submit" value="Enviar correo" name="submit" class="form__btn">
        </form>
        <?php  
            if ($errors) {
              echo  "<div class='alert danger'>" ;
              echo $errors;
              echo "</div>";
            } 

            if ( $send ) {
              echo  "<div class='alert success'>";
              echo "<p class='text success'>Enviado Corectamente</p>";
              echo "</div>";
            }
        ?>
    </main>
</body>
</html>