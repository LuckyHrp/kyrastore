<x-app-admin-layout>
    <section class="w-full relative">
        <div class="">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-shrink-0 space-x-4">
                        <h5>
                            <span class="text-gray-500">All Categories:</span>
                            <span class="dark:text-white">{{ $categories->count() }}</span>
                        </h5>
                    </div>
                    <x-search-bar></x-search-bar>
                    <x-create-model>category</x-create-model>
                    <button type="button"
                        class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        Export
                    </button>
                </div>
                <div
                    class="overflow-x-auto scrollbar scrollbar-thumb-gray-200 dark:scrollbar-thumb-gray-900 scrollbar-thumb-rounded-full">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Slug</th>
                                <th scope="col" class="px-4 py-3">Last Update</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            @include('partials.category-table-rows', [
                                'categories' => $categories,
                            ])
                        </tbody>
                    </table>
                </div>
                <div class="py-2 px-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        @if (session('success'))
            <x-alert x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90" status="alert-success"
                btn="alert-succes-btn">{{ session('success') }}</x-alert>
        @endif
    </section>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.querySelector('#search-input');
                const tableBody = document.querySelector('#product-table-body');
                let debounceTimer;

                if (searchInput && tableBody) {
                    searchInput.addEventListener('keyup', function() {
                        const query = this.value;
                        clearTimeout(debounceTimer);
                        debounceTimer = setTimeout(() => {
                            tableBody.innerHTML =
                                '<tr><td colspan="8" class="text-center py-4 text-gray-500">Mencari...</td></tr>';

                            fetch(`{{ route('category.search') }}?q=${encodeURIComponent(query)}`)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then(html => {
                                    const tableBody = document.querySelector('#product-table-body');
                                    tableBody.innerHTML = html;
                                    btnUpdate();
                                    initFlowbite();
                                })
                                .catch(error => {
                                    console.error('Fetch error:', error);
                                    document.querySelector('#product-table-body').innerHTML =
                                        '<tr><td colspan="8" class="text-center py-4 text-red-500">Terjadi kesalahan.</td></tr>';
                                });

                        }, 300);
                    });
                }
            });

            // untuk auto slug
            function generateSlug(text) {
                return text.toString().toLowerCase().trim()
                    .replace(/\s+/g, '-') // Ganti spasi dengan -
                    .replace(/[^\w\-]+/g, '') // Hapus karakter non-kata kecuali -
                    .replace(/\-\-+/g, '-'); // Ganti -- berulang dengan satu -
            }

            function btnUpdate() {
                const paginatedProduct = @json($categories);
                const allCategories = paginatedProduct.data;
                let timer;
                allCategories.forEach(product => {
                    const btnClicks = document.querySelectorAll(`#updateModal${product.slug}`);
                    btnClicks.forEach(btnClick => {
                        btnClick.addEventListener('click', function() {
                            console.log(btnClick);
                            const inputName = document.querySelector(`#name-${product.id}`);
                            const inputSlug = document.querySelector(`#slug-${product.id}`);

                            if (inputName && inputSlug) {
                                inputName.addEventListener('keyup', function() {
                                    const nameValue = this.value;
                                    const generated = generateSlug(nameValue);
                                    timer = setTimeout(() => {
                                        inputSlug.value = generated;
                                    }, 300)
                                })
                            }
                        })
                    })
                });
            }
        </script>
    @endpush

</x-app-admin-layout>
