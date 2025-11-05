<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between lg:flex-row sm:flex-col items-start space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 mb-1">
                    {{ __('Edit Activity') }}
                </h2>
                <p class="text-sm text-gray-600">Update the activity details and track progress</p>
            </div>
            <a href="{{ route('activities.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Activities
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <!-- Card Header -->
                <div class="px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Activity Details</h3>
                            <p class="text-sm text-gray-600">Update the information below to modify this activity</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form id="update-form" action="{{ route('activities.update', $activity) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-900 mb-2">
                            Activity Name
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $activity->name) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200"
                                placeholder="Enter activity name"
                                required
                            >
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="mb-6">
                        <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                            Description
                        </label>
                        <div class="relative">
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 resize-none"
                                placeholder="Describe what this activity involves..."
                            >{{ old('description', $activity->description) }}</textarea>
                            <div class="absolute top-3 right-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                        </div>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="mb-6">
                        <label for="status" class="block text-sm font-semibold text-gray-900 mb-2">
                            Status
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select
                                name="status"
                                id="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 appearance-none bg-white"
                                required
                            >
                                <option value="pending" {{ old('status', $activity->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="done" {{ old('status', $activity->status) == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remark Field -->
                    <div class="mb-8">
                        <label for="remark" class="block text-sm font-semibold text-gray-900 mb-2">
                            Remark
                            <span class="text-xs font-normal text-gray-500 ml-1">(Optional)</span>
                        </label>
                        <div class="relative">
                            <textarea
                                name="remark"
                                id="remark"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors duration-200 resize-none"
                                placeholder="Add any additional notes or remarks..."
                            >{{ old('remark', $activity->remark) }}</textarea>
                            <div class="absolute top-3 right-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </div>
                        </div>
                        @error('remark')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </form>

                <!-- Activity Info -->
                <div class="mb-6 p-4 mx-auto max-w-xl bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Activity Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600">Created:</span>
                            <span class="text-gray-900 font-medium ml-2">{{ $activity->created_at->format('M j, Y g:i A') }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Last Updated:</span>
                            <span class="text-gray-900 font-medium ml-2">{{ $activity->updated_at->format('M j, Y g:i A') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="grid grid-cols-1 md:grid-cols-2 px-4 pb-4 lg:grid-cols-2 gap-4 pt-6 border-t border-gray-200">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('activities.index') }}" class="inline-flex text-nowrap items-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            Cancel
                        </a>
                        <a href="{{ route('activities.show', $activity) }}" class="inline-flex text-nowrap items-center px-4 py-2.5 text-sm font-medium text-primary-600 bg-primary-50 border border-primary-200 rounded-lg hover:bg-primary-100 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            View Activity
                        </a>
                    </div>
                    <div class="flex items-center gap-3">
                        <form action="{{ route('activities.destroy', $activity) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this activity?')">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                        <button type="submit" form="update-form" id="update-button" class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Update Activity
                        </button>
                    </div>
                </div>
            </div>

            <!-- Help Text -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900 mb-1">Updating Activities</h4>
                        <p class="text-sm text-blue-800">
                            Keep your activity information up to date. Changing the status to "Completed" will move it to the done section. 
                            Use remarks to track important notes about progress or changes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle Update Activity button loading state
        document.getElementById('update-form').addEventListener('submit', function() {
            const button = document.getElementById('update-button');
            button.disabled = true;
            button.innerHTML = `
                <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Updating...
            `;
        });

        // Handle Delete button loading state
        const deleteForm = document.querySelector('form[action*="destroy"]');
        deleteForm.addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete this activity?')) {
                e.preventDefault();
                return;
            }
            const button = this.querySelector('button');
            button.disabled = true;
            button.innerHTML = `
                <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Deleting...
            `;
        });
    </script>
</x-app-layout>
