<?php
include('../config.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$data = array();

$assunto = 'Nova mensagem do site!';
$corpo = '';

foreach ($_POST as $key => $value) {
    $corpo.=ucfirst($key).": ".$value;
    $corpo.="<hr>";
}
$info = array('assunto' =>$assunto, 'corpo' =>$corpo);
$mail = new Email('$host', '$username', '$senha', '$name'); //substituir as variaveis pelo dominio de email
$mail->addAdress(' ', ' ');
$mail->formatarEmail($info);
if ($mail->enviarEmail()) {
    $data['sucesso'] = true;
} else {
    $data['erro'] = false;
}
//$data['retorno'] = 'sucesso';

die(json_encode($data));

?>