<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f9fafc; font-family: 'Segoe UI', sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f9fafc">
        <tr>
            <td align="center" style="padding: 40px 20px;">

                <!-- Logo -->
                <img src="https://atalaya.pe/assets/img/logo-dark.svg" alt="Atalaya" width="120"
                    style="margin-bottom: 30px;">

                <!-- Card principal -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 20px; box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05); padding: 50px;">
                    <tr>
                        <td align="center" style="color: #1d1d1f;">

                            <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 8px;">¡Bienvenido a Atalaya!
                            </h1>
                            <p style="font-size: 16px; color: #5f6368; margin-bottom: 30px;">Estás a un paso de acceder
                                a tu plataforma integral de gestión de proyectos y CRM ✨</p>

                            <p style="margin-bottom: 10px; font-size: 14px; color: #202124;">Tu código de verificación:
                            </p>

                            <!-- Código -->
                            <table cellspacing="8" cellpadding="0" style="margin: 20px auto;">
                                <tr>
                                    @foreach (str_split(substr($code, 0, 6)) as $digit)
                                        <td
                                            style="background-color: #eef0f6; color: #333; border-radius: 10px; padding: 16px 20px; font-size: 20px; font-weight: 600;">
                                            {{ $digit }}
                                        </td>
                                    @endforeach
                                </tr>
                            </table>

                            <!-- Beneficios -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 30px 0;">
                                <tr>
                                    <td style="text-align: center; font-size: 14px; color: #444;">
                                        ✔ Gestión integral de proyectos y equipos
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-size: 14px; color: #444;">
                                        ✔ Sistema avanzado de CRM y seguimiento de clientes
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-size: 14px; color: #444;">
                                        ✔ Herramientas de marketing y envíos masivos
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center; font-size: 14px; color: #444;">
                                        ✔ Análisis y reportes en tiempo real
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>

                <p style="font-size: 12px; color: #9e9e9e; margin-top: 30px;">
                    ©{{ date('Y') }} Atalaya. Todos los derechos reservados.
                </p>
            </td>
        </tr>
    </table>

</body>

</html>
