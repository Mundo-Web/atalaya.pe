<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página no encontrada - 404</title>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Página no encontrada" />
    <meta property="og:description" content="La página que estás buscando no existe o ha sido movida." />

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes ping {

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-ping {
            animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animate-rotate {
            animation: rotate 20s linear infinite;
        }

        .animation-delay-700 {
            animation-delay: 700ms;
        }

        .bg-azuloscuro {
            background-color: #0a1929;
        }

        .bg-gradient {
            background: linear-gradient(135deg, #0a1929 0%, #1a365d 100%);
        }
    </style>
</head>

<body class="font-sans bg-gradient text-white min-h-screen flex flex-col overflow-auto">
    <!-- Particles background -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute w-96 h-96 -top-48 -left-48 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div
            class="absolute w-96 h-96 -bottom-48 -right-48 bg-indigo-500/10 rounded-full blur-3xl animate-pulse animation-delay-700">
        </div>
    </div>

    <!-- Contenido principal -->
    <main class="flex-1 flex flex-col items-center justify-center px-4 md:px-8 py-12 relative">
        <div class="max-w-4xl w-full flex flex-col items-center gap-12">
            <!-- Animación 404 -->
            <div class="relative w-full md:w-[80%] aspect-video animate-float">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div
                        class="text-[15rem] font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-600 animate-pulse">
                        404
                    </div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-full h-max relative">
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-40 h-40 rounded-full bg-blue-500/20 animate-ping">
                        </div>
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-56 h-56 rounded-full bg-blue-500/10 animate-pulse">
                        </div>
                        <div
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 rounded-full bg-blue-500/5 animate-rotate">
                        </div>
                        <svg class="absolute top-2/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-40 h-40 text-blue-400"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 8V12M12 16H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Mensaje -->
            <h2
                class="text-3xl md:text-4xl text-white font-medium tracking-wider text-center max-w-3xl bg-clip-text text-transparent bg-gradient-to-r from-blue-200 to-indigo-200">
                ¡Ups! Parece que te has perdido. La página que buscas no está disponible.
                <br class="hidden md:block">
                <span class="text-blue-400">Pero no te preocupes, ¡estamos aquí para ayudarte!</span>
            </h2>

            <!-- Botón -->
            <div class="mt-0 group perspective">
                <a href="/"
                    class="inline-flex items-center bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 hover:from-blue-700 hover:via-blue-600 hover:to-indigo-700 text-white rounded-full px-10 py-5 text-xl font-medium transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <span class="mr-3 group-hover:mr-5 transition-all duration-300">Ir al inicio</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 inline-block group-hover:translate-x-2 transition-all duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </main>

    <!-- Botón de WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone=51934464915&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20."
        class="fixed bottom-10 right-10 z-50 group" target="_blank" rel="noopener noreferrer">
        <div class="relative">
            <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
            <div
                class="relative bg-gradient-to-r from-green-500 to-green-600 text-white p-5 rounded-full shadow-lg transform transition-transform group-hover:scale-110 hover:shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
            </div>
        </div>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
