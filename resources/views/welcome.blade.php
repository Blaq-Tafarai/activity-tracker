<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#6366f1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|inter:400,500,600,700,800" rel="stylesheet" />

        <!-- Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'Instrument Sans', 'ui-sans-serif', 'system-ui'],
                            display: ['Instrument Sans', 'Inter', 'ui-sans-serif'],
                        },
                        colors: {
                            primary: {
                                50: '#eef2ff',
                                100: '#e0e7ff',
                                200: '#c7d2fe',
                                300: '#a5b4fc',
                                400: '#818cf8',
                                500: '#6366f1',
                                600: '#4f46e5',
                                700: '#4338ca',
                                800: '#3730a3',
                                900: '#312e81',
                            },
                            accent: {
                                500: '#8b5cf6',
                                600: '#7c3aed',
                            }
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="min-h-screen bg-white">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <header class="w-full py-6 px-6 lg:px-8 border-b border-gray-200">
                <div class="max-w-7xl mx-auto">
                    @if (Route::has('login'))
                        <nav class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <span class="text-xl font-bold text-gray-900">ActivityTracker</span>
                            </div>
                            
                            <div class="flex items-center gap-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm font-medium transition-colors">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="px-6 py-2 text-gray-700 hover:text-primary-600 text-sm font-medium transition-colors">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-lg text-sm font-medium transition-colors">
                                            Get Started
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </nav>
                    @endif
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 flex items-center justify-center px-6 lg:px-8 py-16">
                <div class="max-w-7xl mx-auto w-full">
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                        <!-- Left Column - Content -->
                        <div class="space-y-8">
                            <!-- Hero Title -->
                            <div class="space-y-6">
                                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                                    Track Activities,<br />
                                    <span class="text-primary-600">Boost Productivity</span>
                                </h1>
                                <p class="text-lg text-gray-600 max-w-xl leading-relaxed">
                                    Effortlessly manage your activities, track progress in real-time, and generate insightful reports that drive results.
                                </p>
                            </div>

                            <!-- CTA Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-8 py-3 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-semibold transition-colors">
                                    Get Started Free
                                    <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Right Column - Feature Cards -->
                        <div class="space-y-6">
                            <!-- Feature Card 1 -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 space-y-2">
                                        <h3 class="text-lg font-bold text-gray-900">Comprehensive Reports</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            Generate detailed analytics and insights from your activity data.
                                        </p>
                                        <a href="{{ route('reports.index') }}" class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-semibold text-sm">
                                            View Reports
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Feature Card 2 -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 space-y-2">
                                        <h3 class="text-lg font-bold text-gray-900">Quick Activity Tracking</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            Add and manage activities effortlessly with our intuitive interface.
                                        </p>
                                        <a href="{{ route('activities.create') }}" class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-semibold text-sm">
                                            Create Activity
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Feature Card 3 -->
                            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 space-y-2">
                                        <h3 class="text-lg font-bold text-gray-900">Real-Time Insights</h3>
                                        <p class="text-gray-600 text-sm leading-relaxed">
                                            Monitor your progress with live updates and intelligent recommendations.
                                        </p>
                                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-primary-600 hover:text-primary-700 font-semibold text-sm">
                                            Go to Dashboard
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="py-8 px-6 lg:px-8 border-t border-gray-200">
                <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-gray-600">
                    <p>&copy; {{ date('Y') }} ActivityTracker. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>