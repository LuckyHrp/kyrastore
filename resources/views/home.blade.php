<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div>
            <div class="overflow-hidden">
                <x-banner-slide :banners="$banners"></x-banner-slide>
                <x-product-grid :products="$products">Popular Products</x-product-grid>
                <x-product-grid :products="$games">Top-up Game</x-product-grid>
                <x-product-grid :products="$vouchers">Voucher Game</x-product-grid>
                <x-product-grid :products="$pulsa">Pulsa</x-product-grid>
                <x-product-grid :products="$hiburan">Hiburan</x-product-grid>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</x-app-layout>
