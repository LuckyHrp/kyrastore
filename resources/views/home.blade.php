<x-app-layout>
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
</x-app-layout>
