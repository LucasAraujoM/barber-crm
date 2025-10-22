<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self';">
        <meta name="referrer" content="no-referrer-when-downgrade">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta name="description" content="BarberCRM es una solución integral para la gestión de barberías, diseñada para optimizar la productividad y mejorar la experiencia del cliente.">
        <meta name="keywords" content="BarberCRM, gestión de barberias, optimización de productividad, mejora de experiencia del cliente, CRM para barberias, barberia, peluqueria, gestion de turnos">
        <meta name="author" content="BarberCRM">
        <meta name="robots" content="index, follow">
        <meta name="language" content="es">
        <meta name="copyright" content="BarberCRM">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:title" content="BarberCRM - El mejor CRM para barberos">
        <meta property="og:description" content="BarberCRM es una solución integral para la gestión de barberías, diseñada para optimizar la productividad y mejorar la experiencia del cliente.">
        <meta property="og:image" content="{{ asset('img/logo.png') }}">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:type" content="website">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <link rel="icon" href="{{ asset('img/logo.ico') }}" type="image/x-icon">
        <script src="{{ asset('js/tailwind.js') }}"></script>
    </head>
    <body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-slate-100 scroll-smooth">
        <!-- Hero Section -->
        
        <header class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-cyan-500 to-cyan-700 rounded-full filter blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-amber-500 to-amber-700 rounded-full filter blur-3xl animate-pulse delay-1000"></div>
            </div>

            <!-- Navigation -->
            <nav class="absolute top-0 left-0 right-0 z-50 px-6 py-4">
                <div class="max-w-7xl mx-auto flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <img class="w-30" src="{{ asset('img/logo.ico') }}" alt="">
                        <span class="text-2xl font-bold bg-gradient-to-r from-cyan-200 to-cyan-500 bg-clip-text text-transparent">BarberCRM</span>
                    </div>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#features" class="hover:text-cyan-400 transition-colors">Características</a>
                        <a href="#pricing" class="hover:text-cyan-400 transition-colors">Precios</a>
                        <a href="#contact" class="hover:text-cyan-400 transition-colors">Contacto</a>
                        @if(auth()->check())
                            <a href="{{ route('filament.dashboard.pages.dashboard') }}" class="bg-cyan-600 hover:bg-cyan-700 px-6 py-2 rounded-lg font-medium transition-colors">Dashboard</a>
                        @else
                            <a href="{{route('filament.dashboard.auth.login')}}" class="bg-cyan-600 hover:bg-cyan-700 px-6 py-2 rounded-lg font-medium transition-colors">Iniciar Sesión</a>
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Hero Content -->
            <div class="relative z-10 text-center px-6 max-w-5xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Gestiona tu 
                    <span class="bg-gradient-to-r from-cyan-400 to-cyan-600 bg-clip-text text-transparent">barbería</span> 
                    como un profesional
                </h1>
                <p class="text-xl md:text-2xl text-slate-300 mb-8 max-w-3xl mx-auto">
                    La solución completa para administrar citas, clientes, inventario y ventas. 
                    Todo en un solo lugar, diseñado específicamente para barberías modernas.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://barbercrm.online/register" class="bg-cyan-600 hover:bg-cyan-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                        Comenzar Gratis
                    </a>
                    <a href="#demo" class="border-2 border-cyan-600 text-cyan-400 hover:bg-cyan-600 hover:text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all">
                        Ver Demo
                    </a>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </div>
        </header>

        <!-- separator -->
        <div class="w-full">
            <hr class="border-slate-700">
        </div>


        <!-- Demo Section -->
        <section id="demo" class="py-20 px-6 bg-slate-800/30">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Mira BarberCRM en acción</h2>
                <p class="text-xl text-slate-400 mb-12 max-w-3xl mx-auto">
                    Explora nuestra interfaz intuitiva y descubre cómo gestionar tu barbería nunca fue tan fácil.
                </p>

                <!-- Demo Video / Image -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-slate-700">
                    <img 
                        src="{{ asset('img/demo.png') }}" 
                        alt="Demo Dashboard BarberCRM" 
                        class="w-full h-auto"
                    >
                    <!-- Play Button Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center bg-black/40">
                        <button 
                            onclick="alert('Demo interactiva disponible próximamente')" 
                            class="bg-cyan-600 hover:bg-cyan-700 text-white rounded-full p-6 transition-transform hover:scale-110"
                        >
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Demo Features Grid -->
                <div class="grid md:grid-cols-3 gap-8 mt-16">
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700">
                        <div class="w-14 h-14 bg-cyan-600/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Agenda Visual</h3>
                        <p class="text-slate-400 text-sm">
                            Vista de calendario drag-and-drop para gestionar citas en segundos.
                        </p>
                    </div>

                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700">
                        <div class="w-14 h-14 bg-cyan-600/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Analytics en Tiempo Real</h3>
                        <p class="text-slate-400 text-sm">
                            Indicadores clave de ingresos, clientes y rendimiento del personal.
                        </p>
                    </div>

                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-6 border border-slate-700">
                        <div class="w-14 h-14 bg-cyan-600/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Alertas y Notificaciones</h3>
                        <p class="text-slate-400 text-sm">
                            Recibe notificaciones instantáneas sobre citas, clientes y más, a traves de WhatsApp.
                        </p>
                    </div>
                </div>

                <!-- CTA inside Demo -->
                <div class="mt-12">
                    <a 
                        href="https://barbercrm.online/register" 
                        class="inline-block bg-cyan-600 hover:bg-cyan-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105"
                    >
                        Probar Ahora Gratis
                    </a>
                </div>
            </div>
        </section>

        <!-- separator -->
        <div class="w-full">
            <hr class="border-slate-700">
        </div>

        <!-- Features Section -->
        <section id="features" class="py-20 px-6 h-screen">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">Todo lo que necesitas para tu barbería</h2>
                    <p class="text-xl text-slate-400 max-w-3xl mx-auto">
                        Herramientas potentes diseñadas para simplificar tu día a día y hacer crecer tu negocio
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Gestión de Citas</h3>
                        <p class="text-slate-400">
                            Agenda citas fácilmente, evita conflictos de horarios y envía recordatorios automáticos a tus clientes.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Base de Clientes</h3>
                        <p class="text-slate-400">
                            Mantén un registro completo de tus clientes, sus preferencias y historial de servicios.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Reportes y Analytics</h3>
                        <p class="text-slate-400">
                            Obtén insights valiosos sobre el rendimiento de tu negocio con reportes detallados y en tiempo real.
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Control de Inventario</h3>
                        <p class="text-slate-400">
                            Gestiona tus productos, realiza seguimiento de stock y recibe alertas cuando necesites reabastecer.
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Punto de Venta</h3>
                        <p class="text-slate-400">
                            Procesa pagos rápidamente, administra ventas de productos y servicios desde una interfaz intuitiva.
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all hover:transform hover:scale-105">
                        <div class="w-12 h-12  rounded-lg flex items-center justify-center mb-4">
                            <img class="w-25" src="{{ asset('img/logo.png') }}" alt="">
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
        <section class="py-20 px-6 bg-gradient-to-r from-cyan-600 to-cyan-700">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">¿Listo para transformar tu barbería?</h2>
                <p class="text-xl mb-8 text-cyan-100">
                    Únete a cientos de barberos que ya están ahorrando tiempo y aumentando sus ingresos con BarberCRM
                </p>
                <a href="https://barbercrm.online/register" class="inline-block bg-white text-cyan-700 hover:bg-slate-100 px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                    Comenzar Ahora - Es Gratis
                </a>
            </div>
        </section>

        <!-- Pricing Section -->
         <section class="py-20 px-6 bg-slate-800 h-screen" id="pricing">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Plan de Precios</h2>
                <p class="text-xl mb-8 text-slate-400">
                    Elige el plan perfecto para tu barbería. Ofrecemos planes gratuitos y pagos mensuales.
                </p>
                <!-- <a href="https://barbercrm.online/register" class="inline-block bg-white text-cyan-700 hover:bg-slate-100 px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                    Comenzar Ahora - Es Gratis
                </a> -->

                <!-- Pricing Toggle -->
                <div class="flex justify-center mb-12">
                    <div class="bg-slate-700 rounded-lg p-1 flex">
                        <button id="monthly-toggle" class="px-6 py-2 rounded-md font-medium transition-all bg-cyan-600 text-white">Mensual</button>
                        <button id="yearly-toggle" class="px-6 py-2 rounded-md font-medium transition-all text-slate-300 hover:text-white">Anual</button>
                    </div>
                </div>

                <!-- Pricing Cards -->
                <div id="pricing-cards" class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Plan 1 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all">
                        <h3 class="text-xl font-semibold mb-2">Básico</h3>
                        <p class="text-slate-400 mb-6">Perfecto para empezar</p>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-cyan-400 monthly-price">GRATIS</span>
                            <span class="text-4xl font-bold text-cyan-400 yearly-price hidden">GRATIS</span>
                            <!-- <span class="text-slate-400 monthly-price-toggle">/mes</span>
                            <span class="text-slate-400 yearly-price-toggle hidden">/año</span> -->
                        </div>
                        <ul class="text-slate-300 space-y-3 mb-8">
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Hasta 50 citas/mes</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> 1 barbero</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Reportes básicos</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Soporte por email</li>
                        </ul>
                        <a href="https://barbercrm.online/register" class="block w-full bg-cyan-600 hover:bg-cyan-700 text-white py-3 rounded-lg font-semibold transition-all">Comenzar Gratis</a>
                    </div>

                    <!-- Plan 2 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all">
                        <h3 class="text-xl font-semibold mb-2">Profesional</h3>
                        <p class="text-slate-400 mb-6">Para barberías en crecimiento</p>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-cyan-400 monthly-price">$9.999</span>
                            <span class="text-4xl font-bold text-cyan-400 yearly-price hidden">$99.999</span>
                            <span class="text-slate-400 monthly-price-toggle">/mes</span>
                            <span class="text-slate-400 yearly-price-toggle hidden">/año</span>
                        </div>
                        <ul class="text-slate-300 space-y-3 mb-8">
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Citas ilimitadas</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Hasta 3 barberos</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Reportes avanzados</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Soporte prioritario</li>
                        </ul>
                        <a href="https://barbercrm.online/register" class="block w-full bg-cyan-600 hover:bg-cyan-700 text-white py-3 rounded-lg font-semibold transition-all">Elegir Plan</a>
                    </div>

                    <!-- Plan 3 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all relative">
                        <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-amber-500 hover text-slate-900 px-3 py-1 rounded-full text-sm font-semibold">Más Popular</span>
                        <h3 class="text-xl font-semibold mb-2">Premium</h3>
                        <p class="text-slate-400 mb-6">Para barberías establecidas</p>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-cyan-400 monthly-price">$19.999</span>
                            <span class="text-4xl font-bold text-cyan-400 yearly-price hidden">$199.999</span>
                            <span class="text-slate-400 monthly-price-toggle">/mes</span>
                            <span class="text-slate-400 yearly-price-toggle hidden">/año</span>
                        </div>
                        <ul class="text-slate-300 space-y-3 mb-8">
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Citas ilimitadas</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Hasta 10 barberos</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Reportes avanzados</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Soporte prioritario</li>
                        </ul>
                        <a href="https://barbercrm.online/register" class="block w-full bg-cyan-600 hover:bg-cyan-700 text-white py-3 rounded-lg font-semibold transition-all">Elegir Plan</a>
                    </div>

                    <!-- Plan 4 -->
                    <div class="bg-slate-800/50 backdrop-blur-sm rounded-xl p-8 border border-slate-700 hover:border-cyan-600 transition-all">
                        <h3 class="text-xl font-semibold mb-2">Enterprise</h3>
                        <p class="text-slate-400 mb-6">Para cadenas de barberías</p>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-cyan-400 monthly-price">$29.999</span>
                            <span class="text-4xl font-bold text-cyan-400 yearly-price hidden">$299.999</span>
                            <span class="text-slate-400 monthly-price-toggle">/mes</span>
                            <span class="text-slate-400 yearly-price-toggle hidden">/año</span>
                        </div>
                        <ul class="text-slate-300 space-y-3 mb-8">
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Citas ilimitadas</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Barberos ilimitados</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Reportes avanzados</li>
                            <li class="flex items-center"><svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Soporte dedicado 24/7</li>
                        </ul>
                        <a href="https://barbercrm.online/register" class="block w-full bg-cyan-600 hover:bg-cyan-700 text-white py-3 rounded-lg font-semibold transition-all">Elegir Plan</a>
                    </div>
                </div>

                <!-- JavaScript for Toggle -->
                <script>
                    const monthlyToggle = document.getElementById('monthly-toggle');
                    const yearlyToggle = document.getElementById('yearly-toggle');
                    const monthlyPrices = document.querySelectorAll('.monthly-price');
                    const monthlyPriceToggles = document.querySelectorAll('.monthly-price-toggle');
                    const yearlyPrices = document.querySelectorAll('.yearly-price');
                    const yearlyPriceToggles = document.querySelectorAll('.yearly-price-toggle');

                    monthlyToggle.addEventListener('click', () => {
                        monthlyToggle.classList.add('bg-cyan-600', 'text-white');
                        monthlyToggle.classList.remove('text-slate-300');
                        yearlyToggle.classList.remove('bg-cyan-600', 'text-white');
                        yearlyToggle.classList.add('text-slate-300');
                        monthlyPriceToggles.forEach(el => el.classList.remove('hidden'));
                        yearlyPriceToggles.forEach(el => el.classList.add('hidden'));
                        monthlyPrices.forEach(el => el.classList.remove('hidden'));
                        yearlyPrices.forEach(el => el.classList.add('hidden'));
                    });

                    yearlyToggle.addEventListener('click', () => {
                        yearlyToggle.classList.add('bg-cyan-600', 'text-white');
                        yearlyToggle.classList.remove('text-slate-300');
                        monthlyToggle.classList.remove('bg-cyan-600', 'text-white');
                        monthlyToggle.classList.add('text-slate-300');
                        monthlyPriceToggles.forEach(el => el.classList.add('hidden'));
                        yearlyPriceToggles.forEach(el => el.classList.remove('hidden'));
                        monthlyPrices.forEach(el => el.classList.add('hidden'));
                        yearlyPrices.forEach(el => el.classList.remove('hidden'));
                    });
                </script>
            </div>
        </section>


        <!-- separator -->
        <div class="w-full">
            <hr class="border-slate-700">
        </div>


        <!-- Contact Section -->
        <section id="contact" class="py-20 px-6 bg-slate-800/50 h-screen">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">¿Tienes preguntas?</h2>
                <p class="text-xl text-slate-400 mb-10 max-w-2xl mx-auto">
                    Estamos aquí para ayudarte. Escríbenos y te responderemos en menos de 24 horas.
                </p>

                <form action="{{ route('contact') }}" method="POST" class="grid md:grid-cols-2 gap-6 text-left">
                    @csrf
                    <div>
                        <label for="name" class="block text-slate-300 mb-2 font-medium">Nombre</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition"
                            placeholder="Tu nombre completo">
                    </div>

                    <div>
                        <label for="email" class="block text-slate-300 mb-2 font-medium">Correo electrónico</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition"
                            placeholder="tu@email.com">
                    </div>

                    <div class="md:col-span-2">
                        <label for="subject" class="block text-slate-300 mb-2 font-medium">Asunto</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition"
                            placeholder="¿En qué podemos ayudarte?">
                    </div>

                    <div class="md:col-span-2">
                        <label for="message" class="block text-slate-300 mb-2 font-medium">Mensaje</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            class="w-full px-4 py-3 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition resize-none"
                            placeholder="Cuéntanos más detalles..."></textarea>
                    </div>

                    <div class="md:col-span-2 text-center">
                        <button
                            type="submit"
                            class="inline-block bg-cyan-600 hover:bg-cyan-700 text-white px-8 py-4 rounded-lg font-semibold text-lg transition-all transform hover:scale-105">
                            Enviar Mensaje
                        </button>
                    </div>
                </form>

                <div class="mt-16 grid md:grid-cols-3 gap-8 text-slate-300">
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Email</h4>
                        <a href="mailto:hola@barbercrm.online" class="text-cyan-400 hover:underline">hola@barbercrm.online</a>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Horario</h4>
                        <p>Lun – Vie: 9:00 – 18:00</p>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 bg-cyan-600/20 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-1">Ubicación</h4>
                        <p>100% en línea</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer class="py-12 px-6 bg-slate-900 border-t border-slate-800">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center space-x-2 mb-4 md:mb-0">
                        <img class="w-20" src="{{ asset('img/logo.ico') }}" alt="">
                        <span class="text-lg font-semibold">BarberCRM</span>
                    </div>
                    <div class="text-slate-400 text-center md:text-right">
                        <p>&copy; 2025 BarberCRM. Todos los derechos reservados.</p>
                        <p class="text-sm mt-1">Hecho con ❤️ para barberos</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
