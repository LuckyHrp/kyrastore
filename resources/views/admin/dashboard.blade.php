<x-app-admin-layout>
    <div>
        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Transaction</h3>
        <div class="grid grid-cols-4 gap-4 my-4">
            <div class="dark:bg-gray-700 py-4 px-4 rounded-md">
                <span class="font-medium text-gray-800 dark:text-gray-300">Today, {{ now()->format('d F') }}</span>
                <div class="flex justify-between items-end mt-4">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-300">{{ $todayTransactions->count() }}
                    </h3>
                    <span class="text-md font-medium text-gray-800 dark:text-gray-300">Rp
                        {{ number_format($todayTransactions->sum('final_price'), 0, ',', '.') }}

                    </span>
                </div>
            </div>
            <div class="dark:bg-gray-700 py-4 px-4 rounded-md">
                <span class="font-medium text-gray-800 dark:text-gray-300">Yesterday,
                    {{ now()->yesterday()->format('d F') }}</span>
                <div class="flex justify-between items-end mt-4">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-300">
                        {{ $yesterdayTransactions->count() }}
                    </h3>
                    <span class="text-md font-medium text-gray-800 dark:text-gray-300">Rp
                        {{ number_format($yesterdayTransactions->sum('final_price'), 0, ',', '.') }}
                    </span>
                </div>
            </div>
            <div class="dark:bg-gray-700 py-4 px-4 rounded-md">
                <span class="font-medium text-gray-800 dark:text-gray-300">This Month,
                    {{ now()->startOfMonth()->format('F') }}</span>
                <div class="flex justify-between items-end mt-4">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-300">
                        {{ $thisMonthTransactions->count() }}
                    </h3>
                    <span class="text-md font-medium text-gray-800 dark:text-gray-300">Rp
                        {{ number_format($thisMonthTransactions->sum('final_price'), 0, ',', '.') }}
                    </span>
                </div>
            </div>
            <div class="dark:bg-gray-700 py-4 px-4 rounded-md">
                <span class="font-medium text-gray-800 dark:text-gray-300">Last Month,
                    {{ now()->subMonth()->format('F') }}</span>
                <div class="flex justify-between items-end mt-4">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-300">
                        {{ $lastMonthTransactions->count() }}
                    </h3>
                    <span class="text-md font-medium text-gray-800 dark:text-gray-300">Rp
                        {{ number_format($lastMonthTransactions->sum('final_price'), 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script></script>
    @endpush
</x-app-admin-layout>
