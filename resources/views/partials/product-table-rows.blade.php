@forelse ($products as $product)
    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
        <td class="w-4 px-4 py-3">
            <div class="flex items-center">
                <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()"
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
            </div>
        </td>
        <td class="px-4 py-2">
            <span class="px-2 py-0.5">
                <img src="{{ asset('storage/' . $product->icon) }}" class="w-auto h-8 mr-3" alt="Mobile Legends">
            </span>
        </td>
        <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $product->name }}
        </th>
        <td class="px-4 py-2">
            <span
                class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                {{ $product->category->name }}
            </span>
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <div class="flex items-center">
                <span class="ml-1 text-gray-500 dark:text-gray-400">{{ $product->slug }}</span>
            </div>
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $product->description }}</td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $product->created_at->diffForHumans() }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <x-update-model :data="$product" :categories="$categories">
                product
            </x-update-model>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="text-center py-4 text-gray-500">
            Produk tidak ditemukan.
        </td>
    </tr>
@endforelse
