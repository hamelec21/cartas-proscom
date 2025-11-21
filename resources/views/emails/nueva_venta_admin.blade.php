<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Venta</title>
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
                                ¡Nueva Venta Registrada!
                            </h2>

                            <p style="font-size:16px; line-height:1.6;">
                                Se ha registrado una nueva venta en el sistema.
                            </p>

                            <!-- CARD INFO -->
                            <div style="background:#FFF7E6; padding:20px; border-radius:10px; border:1px solid #FFE0B3; margin:25px 0;">
                                <h3 style="margin-top:0; color:#FF7F50;">Detalles de la Venta</h3>

                                <p style="margin:8px 0;">
                                    <strong>Cliente:</strong> {{ $venta->cliente }}
                                </p>

                                <p style="margin:8px 0;">
                                    <strong>Email:</strong> {{ $venta->email }}
                                </p>

                                <p style="margin:8px 0;">
                                    <strong>Teléfono:</strong> {{ $venta->telefono }}
                                </p>

                                <p style="margin:8px 0;">
                                    <strong>Monto:</strong>
                                    ${{ number_format($venta->monto, 0, ',', '.') }}
                                </p>

                                <p style="margin:8px 0;">
                                    <strong>Comisión:</strong>
                                    <span style="color:#28a745; font-weight:bold;">
                                        ${{ number_format($venta->comision, 0, ',', '.') }}
                                    </span>
                                </p>

                                <hr style="border: 0; border-top: 1px solid #FFE0B3; margin: 15px 0;">

                                @if($venta->referido)
                                    <p style="margin:8px 0;">
                                        <strong>Referido Asociado:</strong> {{ $venta->referido->nombre }} ({{ $venta->referido->alias }})
                                    </p>
                                @else
                                    <p style="margin:8px 0;">
                                        <strong>Referido Asociado:</strong> <span style="color: #999;">Ninguno</span>
                                    </p>
                                @endif
                            </div>

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
