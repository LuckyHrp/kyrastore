<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow dark:border-gray-600 dark:bg-gray-900">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 py-1 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo></x-application-logo>
                </a>
            </div>

            <!-- Search Bar -->
            <x-search-bar>
                <x-slot name="searchBox">
                    <div id="box-search"
                        class="hidden absolute z-50 w-full p-4 shadow rounded text-gray-800 dark:text-gray-300 bg-gray-400 dark:bg-gray-900 top-[4.3rem]">
                    </div>
                </x-slot>
            </x-search-bar>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex gap-4 sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" class="max-w-8 rounded-full">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if (Auth::user()->hasRole('admin'))
                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Admin Dashboard') }}
                                </x-dropdown-link>
                            @endif

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="rounded-sm shadow-sm px-5 py-2 text-md bg-sky-600 text-white hover:bg-sky-500 dark:hover:bg-sky-700 hover:text-white/90 transition focus:outline-none">
                        Log in
                    </a>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <x-search-bar></x-search-bar>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
                @guest

                @endguest
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const search = document.querySelector('#search-input');
        const boxSearch = document.querySelector('#box-search');
        let timer;
        search.addEventListener('keyup', function() {
            const value = this.value;
            clearTimeout(timer);
            timer = setTimeout(() => {
                boxSearch.classList.remove('hidden');
                boxSearch.innerHTML =
                    '<div class="text-sm text-gray-500">Mencari Product...</div>';
                fetch(`{{ route('main.search') }}?q=${encodeURIComponent(value)}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('ajax gagal terkoneksi')
                        }
                        return response.json();
                    })
                    .then(datas => {
                        let html = '';
                        if (datas.length > 0) {
                            datas.forEach(data => {
                                html += `<a href="/product/${data.slug}" class="flex items-center py-2 px-4 gap-4 hover:bg-gray-300 rounded dark:hover:bg-gray-700">
                                        <img src="storage/${data.image}" alt="${data.name}" class="max-w-10 rounded">
                                        <h2 class="text-md font-semibold">${data.name}</h2>
                                    </a>`;
                                boxSearch.innerHTML = html;
                            });
                        } else {
                            boxSearch.innerHTML =
                                '<div class="text-sm text-gray-500">Produk Tidak Ditemukan</div>';
                        }
                        document.addEventListener('click', function(event) {
                            if (!search.contains(event.target) && !
                                boxSearch.contains(event.target)) {
                                boxSearch.classList.add('hidden');
                            }
                        })
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        boxSearch.innerHTML =
                            '<div class="text-sm text-red-500">Terjadi Kesalahan.</div>';
                    });
            });
        });
    });
</script>
