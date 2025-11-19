<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido al Programa de Referidos!</title>
    <style>
        /* CSS general para email */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333333;
        }

        a {
            text-decoration: none;
            color: #FF7F50;
        }

        /* Responsive: Ajustar el ancho en dispositivos pequeños */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 0 10px !important;
            }

            .button {
                display: block !important;
                width: 90% !important;
                margin: 15px auto !important;
            }
        }
    </style>
</head>

<body>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f7f7f7; padding:20px 0;">
        <tr>
            <td align="center">
                <table class="container" cellpadding="0" cellspacing="0" border="0"
                    style="background-color:#fff; border-radius:12px; border: 1px solid #eeeeee; max-width:600px; width:100%; overflow:hidden;">

                    <!-- HEADER / LOGO SECTION -->
                    <tr>
                        <td align="center"
                            style="background-color: #ffffff; padding:20px 20px 10px 20px; border-bottom: 2px solid #FFA500;">
                            <h1 style="margin:0; font-size:26px; color:#FFA500; font-weight:bold;">Carta Digital Pro
                            </h1>
                        </td>
                    </tr>

                    <!-- BODY CONTENT -->
                    <tr>
                        <td style="padding:30px 25px;">
                            <p style="font-size:17px; margin-bottom:20px;">
                                ¡Hola <strong>{{ $nombre }}</strong>!
                            </p>

                            <p style="font-size:16px; margin-bottom:15px;">
                                ¡Felicidades! Has sido registrado exitosamente en nuestro Programa de Referidos.
                                A continuación, encontrarás tu link único para empezar a generar recompensas:
                            </p>

                            <!-- REFERRAL LINK BUTTON -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:25px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $linkReferido }}" class="button"
                                            style="display:inline-block; width:100%; max-width:320px; text-align:center; padding:15px 25px; background-color:#FF7F50; color:#ffffff; text-decoration:none; border-radius:10px; font-weight:bold; font-size:18px; box-sizing:border-box; box-shadow: 0 4px 6px rgba(255,127,80,0.3);">
                                            Tu Link Único
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:16px; margin-bottom:30px; text-align:center; color:#555555;">
                                <a href="{{ $linkReferido }}" style="color:#FF7F50; word-break: break-all;">
                                    {{ $linkReferido }}
                                </a>
                            </p>

                            <p style="font-size:17px; margin-bottom:20px; color:#FFA500; font-weight:bold;">
                                🚀 Recuerda: ¡Recibirás $5.000 (CLP) por cada plan vendido a través de tu enlace!
                            </p>


                            <p style="font-size:14px; color:#999999; margin-top:30px;">
                                Atentamente,<br>
                                El equipo de Carta Digital Pro
                            </p>
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center"
                            style="background-color:#f9f9f9; padding:20px 25px; font-size:12px; color:#999999; border-top: 1px solid #eeeeee; border-radius:0 0 12px 12px;">

                            <!-- 💡 Confirmación de Términos -->
                            <p style="margin-bottom:10px; font-size:13px; color:#666666;">
                                Este registro se realizó bajo la aceptación de nuestros <a href="[URL_AQUI]"
                                    style="color:#FF7F50;">Términos y Condiciones</a>, los cuales te invitamos a
                                revisar.
                            </p>

                            <p style="margin:0;">
                                © {{ date('Y') }} Carta Digital Pro. Todos los derechos reservados.
                            </p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
