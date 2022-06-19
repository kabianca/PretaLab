<?php
if (isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "kbiancasol@gmail.com";
    $email_subject = "Contato no portfólio";

    function problem($error)
    {
        echo "Sinto muito, mas foram encontrado(s) erro(s) na mensagem submetida. ";
        echo "Existem os seguintes erros abaixo.<br><br>";
        echo $error . "<br><br>";
        echo "Por favor, volte e corrija os erros.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['nome']) ||
        !isset($_POST['email']) ||
        !isset($_POST['mensagem'])
    ) {
        problem('Sinto muito, mas há algum problema com a mensagem submetida.');
    }

    $name = $_POST['nome']; // required
    $email = $_POST['email']; // required
    $message = $_POST['mensagem']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'O endereço de e-mail que você inseriu não é válido.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'O nome que você inseriu não é válido.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'A mensagem que você inseriu não é válida.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Detalhes do formulário abaixo.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Nome: " . clean_string($nome) . "\n";
    $email_message .= "E-mail: " . clean_string($email) . "\n";
    $email_message .= "Mensagem: " . clean_string($mensagem) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->

    Grata pela mensagem. Entrarei em contato o mais rápido possível.

<?php
}
?>
