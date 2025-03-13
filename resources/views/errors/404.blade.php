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
            75%, 100% {
                transform: scale(2);
                opacity: 0;
            }
        }
        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }
        .animate-ping {
            animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        .animation-delay-700 {
            animation-delay: 700ms;
        }
        .bg-azuloscuro {
            background-color: #0a1929;
        }
    </style>
</head>

<body class="font-sans bg-azuloscuro text-white min-h-screen flex flex-col">


    <!-- Contenido principal -->
    <main class="flex-1 flex flex-col items-center justify-center px-4 md:px-8 py-12">
        <div class="max-w-3xl w-full flex flex-col items-center gap-10">
            <!-- Animación 404 -->
            <div class="relative w-full md:w-[70%] aspect-square">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-[12rem] font-bold text-white/10 animate-pulse">
                        404
                    </div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-full h-full relative">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full bg-blue-500/20 animate-ping"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 rounded-full bg-blue-500/10 animate-pulse"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 rounded-full bg-blue-500/5 animate-pulse animation-delay-700"></div>
                        <svg 
                            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-40 h-40 text-blue-400"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path 
                                d="M12 8V12M12 16H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" 
                                stroke="currentColor" 
                                stroke-width="2" 
                                stroke-linecap="round" 
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Mensaje -->
            <h2 class="text-2xl md:text-3xl text-white font-medium tracking-wider text-center max-w-2xl">
                ¡Ups! Parece que te has perdido. La página que buscas no está disponible.
                <br class="hidden md:block"> 
                Pero no te preocupes, ¡estamos aquí para ayudarte!
            </h2>

            <!-- Botón -->
            <div class="mt-6 group">
                <a 
                    href="{{ route('Landing.jsx') }}" 
                    class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white rounded-full px-8 py-4 text-lg transition-all duration-300 group"
                >
                    <span class="mr-2 group-hover:mr-4 transition-all duration-300">Ir al inicio</span>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        class="h-5 w-5 inline-block group-hover:rotate-45 transition-all duration-300" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </main>

    <!-- Botón de WhatsApp -->
    <a 
        href="https://api.whatsapp.com/send?phone=51934464915&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20." 
        class="fixed bottom-28 left-5 z-50 group"
        target="_blank"
        rel="noopener noreferrer"
    >
        <div class="relative">
            <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
            <div class="relative bg-green-500 text-white p-4 rounded-full shadow-lg transform transition-transform group-hover:scale-110">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    class="h-6 w-6" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" 
                    />
                </svg>
            </div>
        </div>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>