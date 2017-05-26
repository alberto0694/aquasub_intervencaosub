<?php

	require_once("PHPMailer/PHPMailerAutoload.php");
	//var_dump($_POST);
	 $mail = new PHPMailer();
	// // Define os dados do servidor e tipo de conexão
	// // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	 $mail->IsSMTP(); // Define que a mensagem será SMTP
	 $mail->Host = "br404.hostgator.com.br"; // Endereço do servidor SMTP	 
	 $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	 $mail->Username = 'contato@intervencaosub.com.br'; // Usuário do servidor SMTP
	 $mail->Password = 'licococo734'; // Senha do servidor SMTP
	 // Define o remetente
	 // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	 $mail->From = "contato@intervencaosub.com.br"; // Seu e-mail
	 $mail->FromName = "Contato de Cliente. E-mail Automático"; // Seu nome
	 $mail->CharSet = 'utf-8';

	 
	// // Define os destinatário(s)
	// // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	 $mail->AddAddress("contato@intervencaosub.com.br", "Contato Cliente ".$_POST['nome_cliente']);
	 $mail->AddBCC('alberto_bc_sc@hotmail.com');
	 //$mail->AddCC('administrativo@queromorarem.com.br', 'Ciclano'); // Copia
	 //$mail->AddBCC('administrativo@queromorarem.com.br', 'Interesse em Imóvel'); // Cópia Oculta
	 // Define os dados técnicos da Mensagem
	 // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	 $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	 //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 // Define a mensagem (Texto e Assunto)
	 // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	 $mail->Subject  = 'Cadastro do cliente '.$_POST['nome_cliente']; // Assunto da mensagem
	 $email = "";
	 $email .= "Cliente: ".$_POST['nome_cliente']."<br>";	
	 $email .= "Assunto: ".$_POST['assunto']."<br>";
	 $email .= "E-mail: ".$_POST['email']."<br>";
	 $email .= "Descrição: ".$_POST['descricao']."<br>";
	 
	 // $email = file_get_contents('visitante-proprietario-email.php');
	 // $email = str_replace("#URL#", $url, $email);
	 // $email = str_replace("#COD_IMOVEL#", $imagem['cod_imovel_char'], $email);
	 // $email = str_replace('#NOME#', $arrayContatoProprietario['nome_pessoa'], $email);
	 // $email = str_replace('#CONTATO#', $arrayContatoProprietario['contato_pessoa_telefone'].' - '.$arrayContatoProprietario['contato_pessoa_email'], $email);
	 // $email = str_replace('#MSG#', $arrayContatoProprietario['comentario'], $email);



	 // $mail->body =  file_get_contents('visitante-proprietario-email.php');
	 // $mail->body = str_replace("#URL#", $url, $mail->body);

	 $mail->Body = 	$email;
	 $enviado = $mail->Send();	

	 $result = array();

	 if($enviado){
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