{{-- Success Alert --}}
@if(session('success'))
<div class="flex items-center p-4 mb-4 text-sm text-green-600 rounded-lg bg-green-50 border border-green-300" role="alert">
    <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 11h2m5-2v4m-4 4h-4m2 3a9 9 0 1 0-9-9 9 9 0 0 0 9 9Z" />
    </svg>

    <p class="flex-1">
        <span class="font-medium me-1">Success!</span>
        {{ session('success') }}
    </p>

    <button type="button"
        onclick="this.parentElement.remove()"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-600 rounded-lg focus:ring-2 focus:ring-green-300 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1l12 12M13 1L1 13" />
        </svg>
    </button>
</div>
@endif

