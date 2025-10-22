<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <!-- @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else -->
            
       <!-- @endif -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-slate-100">
        <!-- Hero Section -->
        
        <header class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-amber-500 to-amber-700 rounded-full filter blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-sky-500 to-sky-700 rounded-full filter blur-3xl animate-pulse delay-1000"></div>
            </div>

            <!-- Navigation -->
            <nav class="absolute top-0 left-0 right-0 z-50 px-6 py-4">
                <div class="max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0V4a2 2 0 012-2h16a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="text-2xl font-bold bg-gradient-to-r from-amber-400 to-amber-600 bg-clip-text text-transparent">BarberCRM</span>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#features" class="hover:text-amber-400 transition-colors">Características</a>
                        <a href="#pricing" class="hover:text-amber-400 transition-colors">Precios</a>
                        <a href="#contact" class="hover:text-amber-400 transition-colors">Contacto</a>
                        <a href="https://barbercrm.online/login" class="bg-amber-600 hover:bg-amber-700 px-6 py-2 rounded-lg font-medium transition-colors">Iniciar Sesión</a>
                    </div>
                </div>
            </nav>

            <!-- Hero Content -->
            <div class="relative z-10 text-center px-6 max-w-5xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Gestiona tu 
                    <span class="bg-gradient-to-r from-amber-400 to-amber-600 bg-clip-text text-transparent">barbería</span> 
                    como un profesional
                </h1>
                <p class="text-xl md:text-2xl text-slate-300 mb-8 max-w-3xl mx-auto">
                    La solución completa para administrar citas, clientes, inventario y ventas. 
                    Todo en un solo lugar, diseñado específicamente para barberías modernas.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://barbercrm.online/register" class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                        Comenzar Gratis
                    </a>
                    <a href="#demo" class="border-2 border-amber-600 text-amber-400 hover:bg-amber-600 hover:text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all">
                        Ver Demo
                    </a>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </header>

        <!-- Features Section -->
        <section id="features" class="py-20 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">Todo lo que necesitas para tu barbería</h2>
                    <p class="text-xl text-slate-400 max-w-3xl mx-auto">
                        Herramientas potentes diseñadas para simplificar tu día a día y hacer crecer tu negocio
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-amber-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-amber-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Gestión de Citas</h3>
                        <p class="text-slate-400">
                            Agenda citas fácilmente, evita conflictos de horarios y envía recordatorios automáticos a tus clientes.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-amber-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-amber-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Base de Clientes</h3>
                        <p class="text-slate-400">
                            Mantén un registro completo de tus clientes, sus preferencias y historial de servicios.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-amber-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-amber-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Reportes y Analytics</h3>
                        <p class="text-slate-400">
                            Obtén insights valiosos sobre el rendimiento de tu negocio con reportes detallados y en tiempo real.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-amber-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-amber-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Control de Inventario</h3>
                        <p class="text-slate-400">
                            Gestiona tus productos, realiza seguimiento de stock y recibe alertas cuando necesites reabastecer.
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-amber-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-amber-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Punto de Venta</h3>
                        <p class="text-slate-400">
                            Procesa pagos rápidamente, administra ventas de productos y servicios desde una interfaz intuitiva.
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-amber-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-amber-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="b 12 18.375a6.375 6.375 0 006.375-6.375h-12.75a6.375 6.375 0 006.375 6.375zM12 2.25a4.5 4.5 0 014.5 4.5v6.75a4.5 4.5 0 01-4.5 4.5 4.5 4.5 0 01-4.5-4.5V6.75a4.5 4.5 0 014.5-4.5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Multi-dispositivo</h3>
                        <p class="text-slate-400">
                            Accede desde cualquier dispositivo. Tu información sincronizada en tiempo real en todos tus equipos.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-6 bg-gradient-to-r from-amber-600 to-amber-700">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">¿Listo para transformar tu barbería?</h2>
                <p class="text-xl mb-8 text-amber-100">
                    Únete a cientos de barberos que ya están ahorrando tiempo y aumentando sus ingresos con BarberCRM
                </p>
                <a href="https://barbercrm.online/register" class="inline-block bg-white text-amber-700 hover:bg-slate-100 px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                    Comenzar Ahora - Es Gratis
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 bg-slate-900 border-t border-slate-800">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-2 mb-4 md:mb-0">
                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0V4a2 2 0 012-2h16a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        </svg>
                        <span class="text-lg font-semibold">BarberCRM</span>
                    </div>
                    <div class="text-slate-400 text-center md:text-right">
                        <p>&copy; 2024 BarberCRM. Todos los derechos reservados.</p>
                        <p class="text-sm mt-1">Hecho con ❤️ para barberos</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
