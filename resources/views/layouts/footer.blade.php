<style>
    /* CSS ANDA SUDAH BENAR DAN TIDAK PERLU DIUBAH */
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

    @keyframes scroll {
        from {
            transform: translateX(0);
        }

        to {
            /* Geser ke kiri sejauh lebar satu set logo (50% dari total lebar) */
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 20s linear infinite;
        /* Durasi bisa disesuaikan */
    }

    .group:hover .animate-scroll {
        animation-play-state: paused;
    }
</style>

<footer class="bg-white dark:bg-gray-900 text-gray-700 dark:text-gray-300">
    <div class="container mx-auto px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <div class="lg:col-span-4 flex flex-col">
                <a href="{{ route('home') }}" class="text-5xl font-bold mb-6 text-gray-800 dark:text-gray-300">
                    Kyrastore
                </a>
                <div class="w-full h-30 rounded-lg flex items-center justify-center mb-8">
                    <p class="text-m">Topup Game, data internet, hingga saldo e-wallet, semua ada
                        di sini. Proses cepat, aman, dan terpercaya.
                    </p>
                </div>
                <div class="items-center justify-center">
                    <a href="#"
                        class="bg-sky-700 hover:bg-sky-600 active:bg-sky-800 transition-colors text-white font-bold py-3 px-6 rounded-full">
                        Contact Us
                    </a>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="mb-10">
                    <h3 class="text-xl font-semibold mb-3">Payment Methods</h3>
                    <div class="w-full overflow-hidden p-4 group">

                        <div class="flex w-max animate-scroll">

                            <div class="flex items-center gap-x-6 px-3">
                                <img src="{{ asset('storage/payments/gopay-logo.png') }}" class="h-8 w-auto"
                                    alt="GoPay">
                                <img src="{{ asset('storage/payments/ovo-logo.png') }}" class="h-8 w-auto"
                                    alt="OVO">
                                <img src="{{ asset('storage/payments/dana-logo.png') }}" class="h-8 w-auto"
                                    alt="DANA">
                                <img src="{{ asset('storage/payments/shopeepay-logo.png') }}" class="h-8 w-auto"
                                    alt="ShopeePay">
                                <img src="{{ asset('storage/payments/bca-logo.png') }}" class="h-8 w-auto"
                                    alt="BCA">
                                <img src="{{ asset('storage/payments/mandiri-logo.png') }}" class="h-8 w-auto"
                                    alt="Mandiri">
                                <img src="{{ asset('storage/payments/bri-logo.png') }}" class="h-8 w-auto"
                                    alt="BRI">
                                <img src="{{ asset('storage/payments/bni-logo.png') }}" class="h-8 w-auto"
                                    alt="BNI">
                                <img src="{{ asset('storage/payments/alfamart-logo.png') }}" class="h-8 w-auto"
                                    alt="Alfamart">
                                <img src="{{ asset('storage/payments/indomaret-logo.png') }}" class="h-8 w-auto"
                                    alt="Indomaret">
                                <img src="{{ asset('storage/payments/linkaja-logo.png') }}" class="h-8 w-auto"
                                    alt="LinkAja">
                            </div>

                            <div class="flex items-center gap-x-6 px-3">
                                <img src="{{ asset('storage/payments/gopay-logo.png') }}" class="h-8 w-auto"
                                    alt="GoPay">
                                <img src="{{ asset('storage/payments/ovo-logo.png') }}" class="h-8 w-auto"
                                    alt="OVO">
                                <img src="{{ asset('storage/payments/dana-logo.png') }}" class="h-8 w-auto"
                                    alt="DANA">
                                <img src="{{ asset('storage/payments/shopeepay-logo.png') }}" class="h-8 w-auto"
                                    alt="ShopeePay">
                                <img src="{{ asset('storage/payments/bca-logo.png') }}" class="h-8 w-auto"
                                    alt="BCA">
                                <img src="{{ asset('storage/payments/mandiri-logo.png') }}" class="h-8 w-auto"
                                    alt="Mandiri">
                                <img src="{{ asset('storage/payments/bri-logo.png') }}" class="h-8 w-auto"
                                    alt="BRI">
                                <img src="{{ asset('storage/payments/bni-logo.png') }}" class="h-8 w-auto"
                                    alt="BNI">
                                <img src="{{ asset('storage/payments/alfamart-logo.png') }}" class="h-8 w-auto"
                                    alt="Alfamart">
                                <img src="{{ asset('storage/payments/indomaret-logo.png') }}" class="h-8 w-auto"
                                    alt="Indomaret">
                                <img src="{{ asset('storage/payments/linkaja-logo.png') }}" class="h-8 w-auto"
                                    alt="LinkAja">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <ul class="space-y-2">
                            <li><a href="#"
                                    class="hover:text-gray-900 dark:hover:text-white transition-colors">Home</a></li>
                            <li><a href="#" class="dark:hover:text-white transition-colors">Login</a></li>
                            <li><a href="#" class="dark:hover:text-white transition-colors">Article</a></li>
                        </ul>
                    </div>

                    <div>
                        <ul class="space-y-2">
                            <li><a href="#" class="dark:hover:text-white transition-colors">Terms & Conditions</a>
                            </li>
                            <li><a href="#" class="dark:hover:text-white transition-colors">privacy policy</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div class="flex space-x-4">
                            <a href="#">
                                <svg class="w-[35px] h-[35px] text-red-600 hover:text-red-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg class="w-[35px] h-[35px] text-rose-700 hover:text-rose-500 active:text-rose-600"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg class="w-[35px] h-[35px] text-blue-500 hover:text-blue-400 active:text-blue-600"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#">
                                <svg class="w-[35px] h-[35px] text-sky-600 hover:text-sky-500 active:text-sky-600"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M22 5.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.343 8.343 0 0 1-2.605.981A4.13 4.13 0 0 0 15.85 4a4.068 4.068 0 0 0-4.1 4.038c0 .31.035.618.105.919A11.705 11.705 0 0 1 3.4 4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 6.1 13.635a4.192 4.192 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 2 18.184 11.732 11.732 0 0 0 8.291 20 11.502 11.502 0 0 0 19.964 8.5c0-.177 0-.349-.012-.523A8.143 8.143 0 0 0 22 5.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
