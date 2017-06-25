<?php

	 require_once("PHPMailer/PHPMailerAutoload.php");
	 $mail = new PHPMailer();
	 $mail->IsSMTP(); // Define que a mensagem será SMTP
	 $mail->Host = "br646.hostgator.com.br"; // Endereço do servidor SMTP	 
	//  $mail->Port = 465;
	 $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	 $mail->Username = 'no_reply@aquasub.com.br'; // Usuário do servidor SMTP
	 $mail->Password = 'licococo734'; // Senha do servidor SMTP
	 $mail->From = "no_reply@aquasub.com.br"; // Seu e-mail
	 $mail->FromName = "Contato de Cliente. E-mail Automático"; // Seu nome
	 $mail->CharSet = 'utf-8';
	 $mail->AddAddress("contato@intervencaosub.com.br", "Contato Cliente ".$_POST['nome_cliente']);
	 //  $mail->AddBCC('alberto_bc_sc@hotmail.com');
	 $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	 $mail->Subject  = 'Cadastro do cliente '.$_POST['nome_cliente']; // Assunto da mensagem
	 $email = "";
	 $email .= "Cliente: ".$_POST['nome_cliente']."<br>";	
	 $email .= "Assunto: ".$_POST['assunto']."<br>";
	 $email .= "E-mail: ".$_POST['email']."<br>";
	 $email .= "Descrição: ".$_POST['descricao']."<br>";
	 $mail->Body = 	$email;

	 // var_dump($mail);
	 // exit();	 
	 $enviado = $mail->Send();	

	 $result = array();
	 
	 if($enviado){
		//  var_dump($mail);
	 	$result["status"] = "success";
	 }else{
	 	$result["status"] = "error";
	 }

	 echo json_encode($result);
	// $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";
	 // Define os anexos (opcional)
	 // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	 //$mail->AddAttachment("contrato.pdf", "contrato.pdf");  // Insere um anexo
	// Envia o e-mail
	


?>