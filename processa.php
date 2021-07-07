<?php
	$nome = $_POST['name'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensage'];
		
    require 'vendor/autoload.php';

    $from = new SendGrid\Email(null, "...");
    $subject = "Mensagem de contato";
    $to = new SendGrid\Email(null, "g.rizzicorretoradeseguros@outlook.com.br");
    $content = new SendGrid\Content("text/html", "Olá Edilene, <br><br>Nova mensagem de contato<br><br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
    //Necessário inserir a chave
    $apiKey = '...';
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    echo "Mensagem enviada com sucesso!";
		
?>
