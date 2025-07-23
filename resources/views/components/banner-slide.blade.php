@props(['banners'])

<div x-data="{
    activeSlide: 1,
    // [!] Ganti data PHP dengan array JavaScript statis di sini
    slides: [
        @foreach ($banners as $banner)
        { id: {{ $banner->id }}, title: '{{ $banner->title }}', image_url: '{{ asset('storage/' . $banner->image) }}' }, @endforeach
    ],
    loop() {
        setInterval(() => {
            this.activeSlide = this.activeSlide === this.slides.length ? 1 : this.activeSlide + 1
        }, 5000);
    }
}" x-init="loop()"
    class="relative overflow-hidden w-full rounded-2xl shadow-lg bg-gray-800">

    {{-- Container untuk semua slide yang akan bergeser --}}
    <div class="flex transition-transform duration-500 ease-in-out"
        :style="'transform: translateX(-' + (activeSlide - 1) * 100 + '%)'">
        {{-- Template loop untuk setiap slide --}}
        <template x-for="slide in slides" :key="slide.id">
            <div class="w-full flex-shrink-0">
                <img :src="slide.image_url" :alt="slide.title" class="w-full h-full object-cover" />
            </div>
        </template>
    </div>

    {{-- Tombol Navigasi --}}
    <div class="absolute inset-y-0 w-full flex items-center justify-between px-4">
        <button @click="activeSlide = activeSlide === 1 ? slides.length : activeSlide - 1"
            class="p-2 bg-black/40 text-white rounded-full hover:bg-black/60 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="activeSlide = activeSlide === slides.length ? 1 : activeSlide + 1"
            class="p-2 bg-black/40 text-white rounded-full hover:bg-black/60 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>
