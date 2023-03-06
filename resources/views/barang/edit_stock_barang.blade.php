<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Tambah Stock") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5 class="text-gray-500 m-5 flex gap-3">
                <li class="list-none" class="font-bold">Master Barang</li>
                /
                <li class="list-none">Add Product</li>
            </h5>
            <form
                class="w-full max-w-7xl p-4 shadow-md bg-white rounded-md text-gray-800"
                action="{{ route('update.stock-barang', $barangs->id) }}"
                method="post"
            >
                @csrf @method('PATCH')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="grid-password"
                        >
                            Nama Barang
                        </label>
                        <input
                            class="appearance-none text-gray-500 cursor-not-allowed block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password"
                            type="text"
                            name="nama_barang"
                            value="{{$barangs->nama_barang}}"
                            disabled
                        />
                        <!-- error message untuk title -->
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <p class="text-gray-600 text-xs italic">
                            Input Barang Dengan Lengkap
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="grid-first-name"
                        >
                            Brand
                        </label>
                        <div class="relative">
                            <input
                                class="appearance-none text-gray-500 cursor-not-allowed block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-password"
                                type="text"
                                name="brand"
                                value="{{$barangs->brand->brand}}"
                                disabled
                            />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="grid-last-name"
                        >
                            UOM
                        </label>
                        <input
                            class="appearance-none text-gray-500 cursor-not-allowed block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password"
                            type="text"
                            name="brand"
                            value="{{$barangs->satuan->satuan}}"
                            disabled
                        />
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="price"
                        >
                            Harga
                        </label>
                        <div class="relative">
                            <input
                                class="appearance-none text-gray-500 cursor-not-allowed block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="price"
                                type="text"
                                name="harga"
                                value="{{$barangs->harga}}"
                                disabled
                                onCopy="false"
                            />
                            <!-- onDrag="false"
                                onDrop="false"
                                onPaste="false" -->
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="stock"
                        >
                            Kategori
                        </label>
                        <input
                            class="appearance-none text-gray-500 cursor-not-allowed block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="kategori"
                            type="text"
                            name="kategori_id"
                            onPaste="return false"
                            value="{{$barangs->kategori->kode_kategori}} - {{$barangs->kategori->kategori}}"
                            disabled
                            required
                        />
                        <!-- value="{{$barangs->stock}}" -->
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="grid-password"
                        >
                            Jumlah Stock
                        </label>
                        <input
                            class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password"
                            type="text"
                            name="stock"
                            value="{{$barangs->stock}}"
                        />
                        <!-- error message untuk title -->
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <p class="text-gray-600 text-xs italic">
                            Input Stock Dengan Teliti
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <button
                            class="bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                        >
                            Simpan Stock
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
