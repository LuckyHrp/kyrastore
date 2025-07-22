@forelse ($transactions as $transaction)
    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
        <td class="w-4 px-4 py-3">
            <div class="flex items-center">
                <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()"
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
            </div>
        </td>
        <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $transaction->trx_id }}
        </th>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $transaction->user->name }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $transaction->nominal->name }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            Rp {{ number_format(intval($transaction->final_price), 0, ',', '.') }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $transaction->status }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $transaction->created_at->diffForHumans() }}
        </td>
        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <x-detail-modal :data="$transaction">
                Transaction
            </x-detail-modal>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="8" class="text-center py-4 text-gray-500">
            Produk tidak ditemukan.
        </td>
    </tr>
@endforelse
