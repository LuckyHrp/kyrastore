    <style>
        @media (prefers-color-scheme: dark) {
            .theme-image {
                content: url('../storage/logins/stokleputih.png');
            }
        }

        @media (prefers-color-scheme: light) {
            .theme-image {
                content: url('../storage/logins/stoklehitam.png');
            }
        }
    </style>
    <footer class="bg-slate-800 text-gray-300">
        <div class="container mx-auto px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                <div class="lg:col-span-4 flex flex-col">
                    <div class="w-48 h-24 rounded-lg flex items-center justify-center">
                        <img class="theme-image w-auto mx-auto" src="{{ asset('.storage/logins/stoklehitam.png') }}"
                            alt="Theme Image">
                    </div>
                    <div class="w-full h-32 rounded-lg flex items-center justify-center mb-6">
                        <p class="text-m">Topup Game, data internet, hingga saldo e-wallet, semua ada
                            di sini. Proses cepat, aman, dan terpercaya.
                        </p>
                    </div>
                    <div class="items-center justify-center">
                        <a href="#"
                            class="bg-slate-600 hover:bg-slate-500 transition-colors text-white font-bold py-3 px-6 rounded-full">
                            Hubungi Kami
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="mb-10">
                        <h3 class="text-xl font-semibold mb-3">Metode Pembayaran</h3>
                        <div class="bg-slate-600 w-full rounded-lg flex items-center justify-center gap-4">
                            <img src="{{ asset('storage/payments/gopay-logo.png') }}" alt="Payment Methods"
                                class="w-28 h-auto rounded-lg">
                            <img src="{{ asset('storage/payments/gopay-logo.png') }}" alt="Payment Methods"
                                class="w-28 h-auto rounded-lg">
                            <img src="{{ asset('storage/payments/gopay-logo.png') }}" alt="Payment Methods"
                                class="w-28 h-auto rounded-lg">
                            <img src="{{ asset('storage/payments/gopay-logo.png') }}" alt="Payment Methods"
                                class="w-28 h-auto rounded-lg">
                            <img src="{{ asset('storage/payments/gopay-logo.png') }}" alt="Payment Methods"
                                class="w-28 h-auto rounded-lg">
                            <img src="{{ asset('storage/payments/gopay-logo.png') }}" alt="Payment Methods"
                                class="w-28 h-auto rounded-lg">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold mb-4">PETA SITUS</h4>
                            <ul class="space-y-2">
                                <li><a href="#" class="hover:text-white transition-colors">Beranda</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Masuk</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Artikel</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Ulasan</a></li>
                            </ul>
                        </div>

                        <div class="md:mt-10">
                            <ul class="space-y-2">
                                <li><a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                                </li>
                                <li><a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold mb-4">Sosial</h4>
                            <div class="flex space-x-4">
                                <a href="#" aria-label="Social Media 1"
                                    class="bg-slate-600 hover:bg-slate-500 transition-colors h-12 w-12 rounded-full"></a>
                                <a href="#" aria-label="Social Media 2"
                                    class="bg-slate-600 hover:bg-slate-500 transition-colors h-12 w-12 rounded-full"></a>
                                <a href="#" aria-label="Social Media 3"
                                    class="bg-slate-600 hover:bg-slate-500 transition-colors h-12 w-12 rounded-full"></a>
                                <a href="#" aria-label="Social Media 4"
                                    class="bg-slate-600 hover:bg-slate-500 transition-colors h-12 w-12 rounded-full"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>
