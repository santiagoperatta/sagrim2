<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cuenta</title>
</head>
<body>
    <p>Hola {{ $user->name }},</p>
    <p>Gracias por registrarte en nuestra aplicación. Por favor, haz clic en el siguiente enlace para confirmar tu cuenta:</p>
    <a href="{{ $confirmUrl }}">Confirmar cuenta</a>
    <p>Si no has solicitado esta acción, puedes ignorar este correo electrónico.</p>
</body>
</html>