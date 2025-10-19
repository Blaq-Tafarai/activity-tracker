<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between lg:flex-row sm:flex-col items-start space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 mb-1">
                    {{ __('Activity Details') }}
                </h2>
                <p class="text-sm text-gray-600">Complete information and update history</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('activities.edit', $activity) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Edit Activity
                </a>
                <a href="{{ route('activities.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Back to List
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Activity Details Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-8">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Activity Information</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <p class="text-gray-900 font-medium">{{ $activity->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $activity->status == 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($activity->status) }}
                            </span>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <p class="text-gray-700 whitespace-pre-line">{{ $activity->description ?: 'No description' }}</p>
                        </div>
                        @if($activity->remark)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Remark</label>
                            <p class="text-gray-700 whitespace-pre-line">{{ $activity->remark }}</p>
                        </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Created</label>
                            <p class="text-gray-600 text-sm">{{ $activity->created_at->format('M j, Y g:i A') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated</label>
                            <p class="text-gray-600 text-sm">{{ $activity->updated_at->format('M j, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Updates Section -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Activity Updates</h3>
                </div>
                <div class="p-6">
                    @if($activity->updates->count() > 0)
                        <div class="space-y-4">
                            @foreach($activity->updates->sortByDesc('created_at') as $update)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center">
                                            <span class="text-sm font-medium text-gray-600">
                                                {{ substr($update->user->name, 0, 1) }}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $update->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $update->created_at->format('M j, Y g:i A') }}</p>
                                        </div>
                                    </div>
                                    <span class="inline-flex items-center px-2 py-2 rounded-lg text-xs font-medium {{ $update->status == 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($update->status) }}
                                    </span>
                                </div>
                                
                                @if($update->remark)
                                <div class="mt-4 p-4 bg-gray-50 rounded border border-gray-200">
                                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $update->remark }}</p>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">No updates yet</h4>
                            <p class="text-gray-600">Update the activity status to see history here.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>