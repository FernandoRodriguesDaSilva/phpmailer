<?php 
require '../phpmailer/class.phpmailer.php';
require '../phpmailer/class.smtp.php';

function send_mail($name, $email, $message, $file, $date){

	$mail = new PHPMailer();
$mail -> CharSet ="utf-8"; //Informa o tipo de caracteres
$mail -> IsSMTP ();  //Informa que o e-mail é do tipo SMTP
$mail -> Host  =  'smtp.gmail.com' ; //Informe o HOST SMTP do seu E-mail   // ( smtp.server.com para hotmail )
$mail -> SMTPAuth  =  true ; //Autenticar o e-mail
$mail -> SMTPSecure  = 'tls' ; //ssl ou tls
$mail -> Username  =  'ferexx8@gmail.com' ; //usuário ou e-mail de acesso ao seu serviço de e-mail
$mail -> Password  =  'Colocar a senha do gmail' ; //A senha de acesso ao serviço de e-mail
$mail -> Port  =  587 ; //A porta do smtp do e-mail 587 ou 465
$mail -> IsHTML (true); //O conteúdo suporta o HTML
$mail ->AddReplyTo('ferexx8@gmail.com', 'Fernando Rodrigues'); // E-mail de resposta

$mail->From = 'ferexx8@gmail.com';  //E-mail de origem
$mail->Sender = 'ferexx8@gmail.com';  //Identificação de E-mail do Remetente
$mail->FromName = $name;  //Nome do Remetente

$mail->AddAddress('ferexx8@gmail.com'); //Enviar o e-mail para:
$mail->AddBCC('fernandinhosns@hotmail.com'); //Enviar cópia oculta para:

$mail->Subject  = $message; //Assunto do E-mail
$mail->Body ='
<h1>E-mail de contato</h1><br>
<p>Este e-mail foi enviado por: '.$name.'</p>
<p>E-mail para Resposta: '.$email.'</p>
<p>Assunto deste e-mail: '.$message.'</p>
<p>Este e-mail foi enviado em : '.$date.'</p>
';
$mail->AddAttachment($file['tmp_name'], $file['name']); //Envio de Anexo

$enviado = $mail->Send(); //Responsável por enviar o e-mail

if($enviado):
	echo '<script>alert("Dados enviado com sucesso")</script>';
else:
	echo '<script>alert("Aconteceu alguns erro")</script>';
endif;
}