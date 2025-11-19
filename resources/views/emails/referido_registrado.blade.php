<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu link de referido</title>
</head>

<body style="margin:0; padding:0; font-family: 'Arial', sans-serif; background-color:#ffffff; color:#333333;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ffffff; padding:20px 0;">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0"
                    style="background-color:#fff; border-radius:15px; box-shadow:0 4px 10px rgba(0,0,0,0.05); max-width:600px; width:100%; overflow:hidden;">
                    <!-- HEADER -->
                    <tr>
                        <td align="center"
                            style="background: linear-gradient(to right, #FFA500, #FF7F50); padding:20px;">
                            <h1 style="margin:0; font-size:24px; color:#ffffff;">Carta Digital Pro</h1>
                        </td>
                    </tr>

                    ```
                    <!-- BODY -->
                    <tr>
                        <td style="padding:20px;">
                            <p style="font-size:16px; margin-bottom:15px;">Hola <strong>{{ $nombre }}</strong>,
                            </p>

                            <p style="font-size:16px; margin-bottom:15px;">¡Gracias por registrarte! Aquí está tu link
                                de referido:</p>

                            <p style="text-align:center; margin-bottom:20px;">
                                <a href="{{ $linkReferido }}"
                                    style="display:inline-block; width:100%; max-width:300px; text-align:center; padding:12px 20px; background-color:#FFA500; color:#ffffff; text-decoration:none; border-radius:8px; font-weight:bold; box-sizing:border-box;">
                                    {{ $linkReferido }}
                                </a>
                            </p>

                            <p style="font-size:16px; margin-bottom:20px; color:#FF7F50; font-weight:bold;">🎉 Comparte
                                este link y gana recompensas por cada referido que se registre.</p>

                            <ul style="font-size:16px; color:#333333; padding-left:20px; margin-bottom:20px;">
                                <li>✔ Genera tu link único de referido.</li>
                                <li>✔ Recibe beneficios por cada referido activo.</li>
                                <li>✔ Fácil de compartir con tus contactos.</li>
                            </ul>

                            <p style="font-size:16px; color:#888888; margin-top:30px;">— Carta Digital Pro</p>
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center"
                            style="background-color:#f9f9f9; padding:15px; font-size:12px; color:#999999;">
                            © {{ date('Y') }} Carta Digital Pro. Todos los derechos reservados.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    ```

</body>

</html>
