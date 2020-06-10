<?php
$texto_mail = $_POST["txtComentario"];
$texto_asunto = $_POST["txtAsunto"];
$destinatario = $_POST["txtEmail"];

//OPCIONAL - Mejora la transferencia de archivos
$headers = "MIME-Version: 1.0\r\n";
//CONCATENAR
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From David Heredia < softwaresistemas3@gmail.com >\r\n";

$exito = mail($destinatario, $texto_asunto, $texto_mail, $headers);
if ($exito) {
    echo "<script>alert('Envio Correcto');location='correo.php';</script>";
} else {
    echo "<script>alert('Error de envio');location='correo.php';</script>";
}
