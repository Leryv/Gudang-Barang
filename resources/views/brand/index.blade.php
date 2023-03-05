<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight capitalize">
            {{ __("Brand") }}
        </h2>
    </x-slot>

    <div class="p-8 text-base">
        <div class="min-w-full min-h-full mx-auto sm:px-6 lg:px-8">
            <h5 class="text-gray-500 mb-5 gap-3 flex px-12">
                <li class="list-none" class="font-bold">Master Data</li>
                /
                <li class="list-none">Brand</li>
            </h5>
            <div class="flex gap-10">
                <form
                    action="{{ route('brand.store') }}"
                    method="post"
                    class="bg-white max-h-60 overflow-hidden sm:rounded-lg w-1/3 flex justify-center items-center"
                >
                    @csrf
                    <div class="w-full p-10 gap-4 grid">
                        <label
                            class="block uppercase tracking-wide font-bold mb-2"
                            for="brand"
                        >
                            Brand
                        </label>
                        <input
                            class="appearance-none block w-full border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="brand"
                            type="text"
                            name="brand"
                        />
                        <div class="">
                            <button
                                class="focus:outline-none bg-white hover:bg-blue-500 text-blue-600 hover:text-white focus:ring-4 focus:ring-blue-300 font-semibold border border-blue-500 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 shadow"
                            >
                                Membuat Brand
                            </button>
                        </div>
                    </div>
                </form>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-2/3"
                >
                    <div class="flex justify-center m-8">
                        <div class="max-w-5xl flex items-center shadow-lg">
                            <table class="text-left shadow">
                                <thead class="uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Kode Brand
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Brand
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Option
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($brands as $brand)
                                    <tr class="bg-white border-b">
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium"
                                        >
                                            {{$brand->kode_brand}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$brand->brand}}
                                        </td>
                                        <td
                                            class="px-6 py-4 flex justify-center items-center"
                                        >
                                            <a
                                                href="{{
                                            route('brand.edit', $brand->id)
                                        }}"
                                                class="focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium roundemax-w-6xl px-5 py-2.5 mr-2 mb-2 rounded-md"
                                            >
                                                Edit Brand
                                            </a>

                                            <form
                                                action="{{route('brand.destroy', $brand->id)}}"
                                                method="post"
                                            >
                                                @csrf @method("DELETE")
                                                <button
                                                    class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium max-w-6xl px-5 py-2.5 mr-2 mb-2 rounded"
                                                >
                                                    Hapus Brand
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 text-gray-600">
                                            Brand Tidak Tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m-5">
                        <div class="">
                            {{ $brands->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
