@props(['data', 'categories' => false, 'products' => false, 'banners' => false])
<div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center md:space-y-0 md:space-x-3">
    <!-- Modal toggle -->
    <div class="flex justify-center items-center">
        <button id="updateModal{{ $data->id }}" data-modal-target="updateModal-{{ $data->id }}"
            data-modal-toggle="updateModal-{{ $data->id }}"
            class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            type="button">
            Edit {{ $slot }}
        </button>
    </div>

    <!-- Main modal -->
    <div id="updateModal-{{ $data->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit {{ $slot }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="updateModal-{{ $data->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form action="{{ route(Str::lower($slot) . '.update', $data->id) }}" method="POST"
                    enctype="multipart/form-data" id="editProductForm-{{ $data->id }}">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">Validasi Gagal!</span>
                            <ul class="mt-1.5 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid gap-4 mb-4 sm:grid-cols-2" x-data="{ imageUrl: '{{ $data->image ? Storage::url($data->image) : '' }}' }">
                        @if (!$banners)
                            <div>
                                <label for="name-{{ $data->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name-{{ $data->id }}"
                                    value="{{ $data->name }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Masukkan Nama" required>
                            </div>
                        @endif
                        @if (!$products && !$banners)
                            <div>
                                <label for="slug-{{ $data->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                                <input type="text" name="slug" id="slug-{{ $data->id }}"
                                    value="{{ $data->slug }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Product slug" required>
                            </div>
                        @endif
                        @if ($categories)
                            <div class="sm:col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="category" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" disabled>Pilih Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $data->category->id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" rows="4" name="description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Write product description here">{{ $data->description }}</textarea>
                            </div>
                            <div>
                                <span class ="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Image
                                </span>
                                <label for="image{{ $data->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer flex items-center justify-center">
                                    <span>Ubah Gambar</span>
                                </label>
                                <input type="file" id="image{{ $data->id }}" name="image" class="sr-only"
                                    accept="image/*"
                                    x-on:change="const reader = new FileReader(); reader.onload = (e) => { imageUrl = e.target.result }; reader.readAsDataURL($event.target.files[0]);">
                            </div>
                            <div x-show="imageUrl" class="max-w-16">
                                <span
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preview</span>
                                <img id="image-preview" :src="imageUrl" alt="Image Preview" class="w-full">
                            </div>
                        @endif

                        @if ($products)
                            <div>
                                <label for="code"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                                <input type="text" name="code" id="code" value="{{ $data->code }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Input Code" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" name="price" id="price" value="{{ $data->price }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Input Price" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="product"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product</label>
                                <select name="product_id" id="product"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="" selected disabled>Pilih Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ $data->product->id == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if ($banners)
                            <div>
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                <input type="text" name="title" id="title" value="{{ $data->title }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Input title" required>
                            </div>
                            <div>
                                <label for="link_url"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                                    Url (optional)</label>
                                <input type="text" name="link_url" id="link_url" value="{{ $data->link_url }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Input link url">
                            </div>
                            <div class="sm:col-span-2">
                                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</span>
                                <label for="image-{{ $data->id }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500  w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 cursor-pointer flex items-center justify-center">
                                    <span>Upload Gambar</span>
                                </label>
                                <input type="file" id="image-{{ $data->id }}" name="image" class="sr-only"
                                    accept="image/*"
                                    x-on:change="const reader = new FileReader(); reader.onload = (e) => { imageUrl = e.target.result }; reader.readAsDataURL($event.target.files[0]);">
                            </div>
                            <div x-show="imageUrl" class="max-w-full sm:col-span-2">
                                <span
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preview</span>
                                <img id="image-preview" :src="imageUrl" alt="Image Preview"
                                    class="w-full max-h-60 object-cover">
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Edit {{ $slot }}
                        </button>
                </form>
                <x-delete-modal :data="$data">{{ $slot }}</x-delete-modal>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function generateSlug(text) {
                return text.toString().toLowerCase().trim()
                    .replace(/\s+/g, '-') // Ganti spasi dengan -
                    .replace(/[^\w\-]+/g, '') // Hapus karakter non-kata kecuali -
                    .replace(/\-\-+/g, '-'); // Ganti -- berulang dengan satu -
            }

            let timer;
            const btnClicks = document.querySelectorAll('#updateModal{{ $data->id }}');
            btnClicks.forEach(btnClick => {
                btnClick.addEventListener('click', function() {
                    const inputName = document.querySelector('#name-{{ $data->id }}');
                    const inputSlug = document.querySelector('#slug-{{ $data->id }}');

                    if (inputName && inputSlug) {
                        inputName.addEventListener('keyup', function() {
                            const nameValue = this.value;
                            const generated = generateSlug(nameValue);
                            timer = setTimeout(() => {
                                inputSlug.value = generated;
                            }, 300)
                        })
                    }
                })
            })
        })
    </script>
@endpush
