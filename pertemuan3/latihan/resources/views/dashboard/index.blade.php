<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome, {{ auth()->user()->name }}</h1>
    {{-- Success Alert --}}
    @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft border border-success-subtle" role="alert">
            <svg class="w-4 h-4 me-2 shrink-0 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11h2m-2 0h2m-4 6.2-9.5 8.01.113 1299 9 0 1-18 0 9 9 0 8 18 12"/>
            </svg>

            <p class="flex-1">
                <span class="font-medium me-1">Success!</span>
                {{ session('success') }}
            </p>

            <button type="button"
                onclick="this.parentElement.remove()"
                class="ms-auto text-fg-success-strong rounded-base focus:ring-2 focus:ring-success-subtle p-1 hover:bg-success-neutral inline-flex items-center justify-center h-8 w-8">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6M7 1l6 6m0 6L7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @include('components.table')
</x-dashboard-layout>