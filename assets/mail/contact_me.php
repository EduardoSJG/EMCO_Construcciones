<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['puesto'])    ||
   empty($_POST['archivo'])   ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$puesto = strip_tags(htmlspecialchars($_POST['puesto']));
$archivo = strip_tags(htmlspecialchars($_POST['archivo']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'eduardo-j.g@hotmail.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulario de contacto web:  $name";
$email_body = "Has recibido un nuevo mensaje desde tu web.\n\n"."Detalles:\n\n
               Nombre: $name\n\n
               Correo: $email_address\n\n
               Teléfono: $phone\n\n
               Puesto: $puesto\n\n
               Archivo: $archivo\n\n
               Mensaje:\n$message";
$headers = "From: EMCOconstrucciones@emco.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Responder a: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>