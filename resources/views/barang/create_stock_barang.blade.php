<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Dashboard") }}
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
                action="{{ route('store.stock-barang', $kategoris->id) }}"
                method="post"
            >
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="grid-password"
                        >
                            Nama Barang
                        </label>
                        <input
                            class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password"
                            type="text"
                            name="nama_barang"
                        />
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
                            <select
                                class="block appearance-none w-full border border-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state"
                                name="brand_id"
                            >
                                <option value="">Pilih Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">
                                    {{$brand->kode_brand}} -
                                    {{$brand->brand}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="grid-last-name"
                        >
                            UOM
                        </label>
                        <select
                            class="block appearance-none w-full border border-gray-200 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-state"
                            name="satuan_id"
                        >
                            <option>Pilih Satuan</option>
                            @foreach ($satuans as $satuan)
                            <option value="{{$satuan->id}}">
                                {{$satuan->kode_satuan}} -
                                {{$satuan->satuan}}
                            </option>
                            @endforeach
                        </select>
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
                                class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="price"
                                type="text"
                                name="harga"
                            />
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label
                            class="block uppercase tracking-wide text-xs font-bold mb-2 text-gray-500"
                            for="stock"
                        >
                            Jumlah Stock
                        </label>
                        <input
                            class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="stock"
                            type="text"
                            name="stock"
                        />
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
