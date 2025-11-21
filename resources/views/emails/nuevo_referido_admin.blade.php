<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Referido</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333333;
        }

        a { text-decoration: none; }

        @media only screen and (max-width: 600px) {
            .container { width: 100% !important; padding: 0 10px !important; }
        }
    </style>
</head>

<body>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f7f7f7; padding:20px 0;">
        <tr>
            <td align="center">

                <table class="container" cellpadding="0" cellspacing="0" border="0"
                    style="background:#ffffff; max-width:600px; width:100%; border-radius:12px; border:1px solid #eaeaea; overflow:hidden;">

                    <!-- HEADER -->
                    <tr>
                        <td align="center" style="background:#ffffff; padding:25px; border-bottom:2px solid #FFA500;">
                            <h1 style="margin:0; color:#FFA500; font-size:26px; font-weight:bold;">
                                Carta Digital Pro
                            </h1>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px 25px;">

                            <h2 style="color:#333; margin-top:0;">
                                ¡Nuevo Referido Registrado!
                            </h2>

                            <p style="font-size:16px; line-height:1.6;">
                                Se ha registrado un nuevo referido en el sistema. Aquí están los detalles:
                            </p>

                            <!-- CARD INFO -->
                            <div style="background:#FFF7E6; padding:20px; border-radius:10px; border:1px solid #FFE0B3; margin:25px 0;">
                                <h3 style="margin-top:0; color:#FF7F50;">Datos del Referido</h3>

                                <p style="margin:8px 0;">
                                    <strong>Nombre:</strong> {{ $referido->nombre }}
                                </p>
                                <p style="margin:8px 0;">
                                    <strong>Alias:</strong> {{ $referido->alias }}
                                </p>
                                <p style="margin:8px 0;">
                                    <strong>Email:</strong> {{ $referido->email }}
                                </p>
                                <p style="margin:8px 0;">
                                    <strong>WhatsApp:</strong> {{ $referido->whatsapp }}
                                </p>
                                <p style="margin:8px 0;">
                                    <strong>RUT:</strong> {{ $referido->rut }}
                                </p>
                                <hr style="border: 0; border-top: 1px solid #FFE0B3; margin: 15px 0;">
                                <p style="margin:8px 0;">
                                    <strong>Banco:</strong> {{ $referido->banco }}
                                </p>
                                <p style="margin:8px 0;">
                                    <strong>Tipo de Cuenta:</strong> {{ $referido->tipo_cuenta }}
                                </p>
                                <p style="margin:8px 0;">
                                    <strong>Número de Cuenta:</strong> {{ $referido->numero_cuenta }}
                                </p>
                            </div>

                            <p style="font-size:15px;">
                                <strong>Link Generado:</strong><br>
                                <a href="{{ $referido->link_generado }}" style="color:#FFA500;">{{ $referido->link_generado }}</a>
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center" style="background:#fafafa; padding:20px; font-size:12px; color:#777; border-top:1px solid #eaeaea;">
                            © {{ date('Y') }} Carta Digital Pro. Todos los derechos reservados.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
