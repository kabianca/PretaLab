<?php
$field_name = $_POST['nome'];
$field_email = $_POST['email'];
$field_message = $_POST['mensagem'];

$mail_to = 'kbiancasol@gmail.com';
$subject = 'Message from a site visitor '.$field_nome;

$body_message = 'From: '.$field_nome."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_mensagem;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Grata pela mensagem. Entrarei em contato o mais rápido possível.');
		window.location = 'contact_page.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to gordon@template-help.com');
		window.location = 'contact_page.html';
	</script>
<?php
}
?>
