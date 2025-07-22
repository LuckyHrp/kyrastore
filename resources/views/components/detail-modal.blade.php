<!-- Modal toggle -->
<div class="flex my-3">
    <button id="trxDetailButton-{{ $data->id }}" data-modal-target="trxDetailModal-{{ $data->id }}"
        data-modal-toggle="trxDetailModal-{{ $data->id }}"
        class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        type="button">
        Detail
    </button>
</div>

<!-- Main modal -->
<div id="trxDetailModal-{{ $data->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full whitespace-normal">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-center mb-4 rounded-t sm:mb-5 relative">
                <div class="text-lg flex flex-col items-center text-gray-900 md:text-xl dark:text-white">
                    <img src="{{ asset('storage/' . $data->nominal->product->icon) }}" alt=""
                        class="w-20 h-auto m-3">
                    <h3 class="font-bold ">
                        {{ $data->nominal->name }}
                    </h3>
                </div>
                <div>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white absolute right-0"
                        data-modal-toggle="trxDetailModal-{{ $data->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <div>
                <ul>
                    <div class="flex justify-between text-md py-3 border-b border-b-gray-500 border-dashed">
                        <li>Transaction ID</li>
                        <li>{{ $data->trx_id }}</li>
                    </div>
                    <div class="flex justify-between text-md py-3 border-b border-b-gray-500 border-dashed">
                        <li>User</li>
                        <li>{{ $data->user->name }}</li>
                    </div>
                    <div class="flex justify-between text-md py-3 border-b border-b-gray-500 border-dashed">
                        <li>User ID / Zone ID</li>
                        <li>{{ $data->player_id }}</li>
                    </div>
                    <div class="flex justify-between text-md py-3 border-b border-b-gray-500 border-dashed">
                        <li>Price</li>
                        <li>Rp {{ number_format(intval($data->final_price), 0, ',', '.') }}</li>
                    </div>
                    <div class="flex justify-between text-md py-3 border-b border-b-gray-500 border-dashed">
                        <li>Transaction Date</li>
                        <li>{{ $data->created_at->format('l, d F Y') }}</li>
                    </div>
                </ul>
            </div>
            <div class="flex justify-between items-center my-5">
                <x-delete-modal :data="$data">Transaction</x-delete-modal>
            </div>
        </div>
    </div>
</div>
