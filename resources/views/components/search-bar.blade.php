<div class="mr-4 sm:flex flex-grow items-center relative">
    <form action="" class="w-full">
        <div class="flex w-full">
            <input type="search" name="search" id="search-input" placeholder="Cari Game atau Aplikasi..."
                autocomplete="off"
                class="w-full flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-small text-gray-900 bg-white border border-gray-200 rounded-lg placeholder-gray-500 focus:outline-none focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600">
        </div>
    </form>
    @isset($searchBox)
        {{ $searchBox }}
    @endisset
</div>
