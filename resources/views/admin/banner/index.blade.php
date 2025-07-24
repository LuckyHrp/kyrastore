<x-app-admin-layout>
    <section class="w-full relative">
        <div class="">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-shrink-0 space-x-4">
                        <h5>
                            <span class="text-gray-500">All Banners:</span>
                            <span class="dark:text-white">{{ $banners->count() }}</span>
                        </h5>
                    </div>
                    <x-create-model :banners="true">banner</x-create-model>
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
                                <th scope="col" class="px-4 py-3">Image</th>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Url</th>
                                <th scope="col" class="px-4 py-3">Last Update</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody id="product-table-body">
                            @include('partials.banner-table-rows', [
                                'banners' => $banners,
                            ])
                        </tbody>
                    </table>
                </div>
                <div class="py-2 px-4">

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
</x-app-admin-layout>
