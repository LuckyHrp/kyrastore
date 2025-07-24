<section class="py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">{{ $slot }}</h2>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-5 lg:grid-cols-7">
            @foreach ($products as $product)
                <a href="{{ route('single-product', $product->slug) }}" class="p-2 text-center">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-md">
                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->name }}</span>
                </a>
            @endforeach

        </div>
    </div>
</section>
