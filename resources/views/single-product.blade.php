<x-app-layout>
    <div class="block grid-cols-3 gap-6 mt-8 lg:grid">
        <div class="mb-5">
            <div class="bg-gray-300 dark:bg-slate-700 p-5 rounded-md">
                <div class="flex items-center gap-4 mb-3 relative">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="max-w-20 rounded-md text-gray-800 dark:text-gray-200">
                    <div>
                        <div class="bg-blue-500 rounded-full w-fit py-1 px-4 absolute right-1 top-1">
                            <p class="text-xs text-white">{{ $product->category->name }}</p>
                        </div>
                        <h2 class="text-sm font-medium text-yellow-500">{{ Str::ucfirst($product->company) }}</h2>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">{{ $product->name }}</h2>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Description</h2>
                    <p class="text-sm text-gray-800 dark:text-gray-200">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <form action="">
                @csrf
                <div class="bg-gray-300 dark:bg-slate-700 p-5 rounded-md">
                    <div class="flex items-center gap-4">
                        <span
                            class="bg-blue-500 text-lg font-semibold py-1 px-5 text-gray-200 rounded-full">1</span>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                            Masukkan detail akun
                        </h2>
                    </div>
                    <div class="flex items-center gap-4 mt-3">
                        <div class="flex-1">
                            <label for="player_id" class="text-md font-semibold text-gray-800 dark:text-gray-200">User
                                ID</label>
                            <input type="text" name="player_id" placeholder="Masukkan User ID"
                                class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-slate-600 dark:border-slate-500 dark:placeholder-slate-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                        @if ($product->slug == 'mobile-legends')
                            <div class="flex-1">
                                <label for="player_id"
                                    class="text-md font-semibold text-gray-800 dark:text-gray-200">Server
                                    ID</label>
                                <input type="text" name="player_id" placeholder="Masukkan Server ID"
                                    class="bg-slate-50 border border-slate-300 text-slate-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-slate-600 dark:border-slate-500 dark:placeholder-slate-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        @endif
                    </div>
                </div>
                <div class=" mt-5 bg-gray-300 dark:bg-slate-700 p-5 rounded-md">
                    <div class="flex items-center gap-4">
                        <span
                            class="bg-blue-500 text-lg font-semibold py-1 px-5 text-gray-200 rounded-full">2</span>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                            Pilih Nominal Top-up
                        </h2>
                    </div>
                    <div class="grid grid-cols-4 gap-4 mt-5">
                        @foreach ($nominals as $nominal)
                            <div class="nominal-card cursor-pointer bg-slate-50 border border-slate-300 text-sm rounded-lg w-full p-2.5 hover:ring-2 hover:ring-primary-600 hover:border-primary-600 hover:dark:ring-primary-500 hover:dark:border-primary-500 dark:bg-slate-600 dark:border-slate-500 dark:placeholder-slate-400 flex flex-col items-center"
                                data-id="{{ $nominal->id }}">
                                <img src="{{ asset('storage/' . $nominal->image) }}" alt="{{ $nominal->name }}"
                                    class="-translate-y-4">
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $nominal->name }}
                                </p>
                                <p class="text-md text-gray-800 dark:text-gray-200">
                                    Rp {{ number_format($nominal->price, '0', ',', '.') }}</p>
                            </div>
                        @endforeach
                        <input type="hidden" name="nominal_id" id="nominal">
                    </div>
                </div>
                <div class=" mt-5 bg-gray-300 dark:bg-slate-700 p-5 rounded-md">
                    <div class="flex items-center gap-4">
                        <span
                            class="bg-blue-500 text-lg font-semibold py-1 px-5 text-gray-200 rounded-full">3</span>
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">
                            Pilih Metode Pembayaran
                        </h2>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nominalCards = document.querySelectorAll('.nominal-card');
                const nominalId = document.getElementById('nominal');

                nominalCards.forEach(nominalCard => {
                    nominalCard.addEventListener('click', function() {
                        nominalCards.forEach(r => r.classList.remove('nominal-selected'));
                        this.classList.add('nominal-selected');
                        nominalId.value = this.getAttribute('data-id');
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
