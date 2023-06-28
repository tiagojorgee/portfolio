<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obter os dados do formulário
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $mensagem = $_POST["mensagem"];

  // Configurar o cabeçalho do e-mail
  $headers = "From: $nome <$email>" . "\r\n";
  $headers .= "Reply-To: $email" . "\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8" . "\r\n";

  // Configurar o destinatário do e-mail
  $destinatario = "tiagosilva305@outlook.com";

  // Montar o corpo do e-mail
  $assunto = "Contato via formulário de contato";
  $corpo = "Nome: $nome\n";
  $corpo .= "E-mail: $email\n";
  $corpo .= "Mensagem:\n$mensagem";

  // Enviar o e-mail
  if (mail($destinatario, $assunto, $corpo, $headers)) {
    // Redirecionar de volta para a página de contato com uma mensagem de sucesso
    header("Location: index.html?enviado=true");
    exit();
  } else {
    // Redirecionar de volta para a página de contato com uma mensagem de erro
    header("Location: index.html?enviado=false");
    exit();
  }
}
?>
