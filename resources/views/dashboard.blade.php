<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between lg:flex-row sm:flex-col items-start space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 mb-1">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-gray-600">Welcome back! Here's what's happening today.</p>
            </div>
            <div class="md:flex md:items-center md:justify-between lg:flex-row sm:flex-col items-start space-y-4 md:space-y-0 gap-4">
                <a href="{{ route('activities.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Manage Activities
                </a>
                <a href="{{ route('reports.index') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 border border-gray-300 rounded-lg text-sm font-medium text-white hover:bg-blue-800">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    View Reports
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Activities Card -->
                <div class="bg-white border-l-4 border-primary-200 rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Activities</p>
                            <p class="text-4xl font-bold text-gray-900">{{ $activities->count() }}</p>
                            <p class="text-base font-semibold text-gray-600 mt-2">All time records</p>
                        </div>
                        <div class="w-12 h-10 bg-primary-200 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Completed Card -->
                <div class="bg-white border-l-4 border-green-200 rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Completed</p>
                            <p class="text-4xl font-bold text-gray-900">{{ $activities->where('status', 'done')->count() }}</p>
                            <p class="text-base font-semibold text-green-600 mt-2">Successfully finished</p>
                        </div>
                        <div class="w-12 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- In Progress Card -->
                <div class="bg-white border-l-4 border-yellow-200 rounded-lg p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">In Progress</p>
                            <p class="text-4xl font-bold text-gray-900">{{ $activities->where('status', 'pending')->count() }}</p>
                            <p class="text-base font-semibold text-yellow-600 mt-2">Currently active</p>
                        </div>
                        <div class="w-12 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities Section -->
            <div class="bg-white rounded-lg border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Recent Activities</h3>
                            <p class="text-sm text-gray-600 mt-1">Track and manage your ongoing tasks</p>
                        </div>
                        <a href="{{ route('activities.create') }}" class="inline-flex items-center px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold rounded-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Activity
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    @if($activities->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach($activities->take(6) as $activity)
                                <div class="bg-white border-2 {{ $activity->status === 'done' ? 'border-green-200' : 'border-yellow-200' }} rounded-lg p-5">
                                    <!-- Status Badge -->
                                    <div class="flex items-start justify-between mb-4">
                                        <span class="inline-flex items-center px-3 py-1 text-xs font-bold rounded-md {{ $activity->status === 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            @if($activity->status === 'done')
                                                <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                                Completed
                                            @else
                                                <svg class="w-3.5 h-3.5 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                                </svg>
                                                Pending
                                            @endif
                                        </span>
                                    </div>

                                    <!-- Activity Content -->
                                    <div class="mb-4">
                                        <h4 class="font-bold text-gray-900 text-lg mb-2">{{ $activity->name }}</h4>
                                        <p class="text-sm text-gray-600 line-clamp-3 mb-5 leading-relaxed">{{ $activity->description }}</p>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center gap-4 pt-4 border-t border-gray-200">
                                        <a href="{{ route('activities.show', $activity) }}" class="inline-flex items-center text-sm font-semibold text-primary-600 hover:text-primary-700">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-lg mb-6">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No activities yet</h3>
                            <p class="text-base text-gray-500 mb-8 max-w-md mx-auto">Get started by creating your first activity and begin tracking your progress.</p>
                            <a href="{{ route('activities.create') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white text-base font-semibold rounded-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Create Your First Activity
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>