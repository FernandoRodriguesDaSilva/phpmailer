<?php 
session_start();
require 'function/function.php' 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página de enviar contato</title>
    <link rel="stylesheet" href="css/form.css" >
    <script src="js/form.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body >
    <div class="container">
        <div class="form-container">
            <h1>
                Contate-nos
            </h1>
            <form method="post" id="reused_form" enctype="multipart/form-data" >
                <label >*Nome:</label>
                <input id="name" type="text" name="name" required maxlength="50">

                <label>Send Your PDF:</label>
                <input id="name" type="file" name="pdf" required maxlength="50">

                <label>*Email:</label>
                <input id="email" type="email" name="email" required maxlength="50">
                <label >*Mensagem:</label>
                <textarea id="message" name="message" rows="10" maxlength="6000" required></textarea>
                <button name="send" class="button-primary" type="submit" >Post</button>
            </form>

            <?php
            if(isset($_POST['send'])){
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
                $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
                $file = $_FILES['pdf'];
                $date = date('d/m/Y H:i:s');

                if(empty($name)|| empty($email) || empty($message)){
                    echo '<p>Por favor, preencha todos os campos do formulário com (*)</p>';
                }else {
                    // Função chamada function/function.php
                    send_mail($name,$email,$message,$file,$date);
                }
            }
            ?>
        </div>
    </div>
</body>
</html>