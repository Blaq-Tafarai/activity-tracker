@php
    $messages = [
        'success' => session('success'),
        'error' => session('error'),
        'warning' => session('warning'),
        'info' => session('info'),
        'status' => session('status'),
    ];
@endphp

@if($messages['success'] || $messages['error'] || $messages['warning'] || $messages['info'] || $messages['status'])
    <div class="fixed top-4 left-4 transform z-50 space-y-2 max-w-md w-full px-4">
        @if($messages['success'])
            <x-toast type="success" :message="$messages['success']" />
        @endif

        @if($messages['error'])
            <x-toast type="error" :message="$messages['error']" />
        @endif

        @if($messages['warning'])
            <x-toast type="warning" :message="$messages['warning']" />
        @endif

        @if($messages['info'])
            <x-toast type="info" :message="$messages['info']" />
        @endif

        @if($messages['status'])
            <x-toast type="info" :message="$messages['status']" />
        @endif
    </div>
@endif
