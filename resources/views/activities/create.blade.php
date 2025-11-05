<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between lg:flex-row sm:flex-col items-start space-y-4 md:space-y-0">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 mb-1">
                    {{ __('Create Activity') }}
                </h2>
                <p class="text-sm text-gray-600">Add a new activity to track and manage your progress</p>
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
            <div class="bg-white rounded-xl max-w-5xl mx-auto p-4">
                <!-- Card Header -->
                <div class="px-6 py-5 border-b border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Activity Details</h3>
                            <p class="text-sm text-gray-600">Fill in the information below to create a new activity</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form action="{{ route('activities.store') }}" method="POST" class="p-6">
                    @csrf
                    
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
                                value="{{ old('name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm transition-colors duration-200"
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
                    <div class="mb-8">
                        <label for="description" class="block text-sm font-semibold text-gray-900 mb-2">
                            Description
                        </label>
                        <div class="relative">
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm transition-colors duration-200 resize-none"
                                placeholder="Describe what this activity involves..."
                            >{{ old('description') }}</textarea>
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

                    <!-- Status Field (Optional Enhancement) -->
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-900 mb-2">
                            Initial Status
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative flex cursor-pointer">
                                <input type="radio" name="status" value="pending" class="sr-only" checked>
                                <div class="flex items-center gap-3 p-4 border-2 border-gray-300 rounded-lg w-full transition-all duration-200 hover:border-primary-400 radio-checked:border-primary-500 radio-checked:bg-primary-50">
                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center radio-checked:border-primary-500 radio-checked:bg-primary-500">
                                        <div class="w-2 h-2 bg-white rounded-full radio-checked:block hidden"></div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                        <span class="text-sm font-medium text-gray-900">Pending</span>
                                    </div>
                                </div>
                            </label>
                            <label class="relative flex cursor-pointer">
                                <input type="radio" name="status" value="done" class="sr-only">
                                <div class="flex items-center gap-3 p-4 border-2 border-gray-300 rounded-lg w-full transition-all duration-200 hover:border-primary-400 radio-checked:border-primary-500 radio-checked:bg-primary-50">
                                    <div class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center radio-checked:border-primary-500 radio-checked:bg-primary-500">
                                        <div class="w-2 h-2 bg-white rounded-full radio-checked:block hidden"></div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                        <span class="text-sm font-medium text-gray-900">Done</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('activities.index') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit" id="create-button" class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded-lg transition-all duration-200 transform">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Create Activity
                        </button>
                    </div>
                </form>
            </div>

            <!-- Help Text -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900 mb-1">Creating Effective Activities</h4>
                        <p class="text-sm text-blue-800">
                            Give your activity a clear, descriptive name and provide enough detail in the description 
                            to make tracking progress easy. You can always edit this information later.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        input:checked + div {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
        input:checked + div > div:first-child {
            border-color: #3b82f6;
            background-color: #3b82f6;
        }
        input:checked + div > div:first-child > div {
            display: block;
        }
    </style>

    <script>
        // Handle Create Activity button loading state
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.getElementById('create-button');
            button.disabled = true;
            button.innerHTML = `
                <svg class="animate-spin w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Creating...
            `;
        });
    </script>
</x-app-layout>
