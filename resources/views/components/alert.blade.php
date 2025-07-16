<div id="alert"
    class="fixed bottom-0 right-8 gap-2 flex items-center p-4 mb-4 {{ $status }} rounded-lg bg-green-50 dark:bg-gray-800"
    role="alert">
    <div class="ms-3 text-sm font-medium">
        {{ $slot }}
    </div>
    <button type="button"
        class="ms-auto {{ $btn }} -mx-1.5 -my-1.5 bg-green-50 rounded-lg focus:ring-2 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#alert" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
