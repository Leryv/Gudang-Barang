<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight capitalize">
            {{ __("Kategori") }}
        </h2>
    </x-slot>

    <div class="p-8 text-base">
        <div class="min-w-full min-h-full mx-auto sm:px-6 lg:px-8">
            <h5 class="text-gray-500 mb-5 flex px-12">
                <a href="">Master Data</a> /
                <a href="{{ route('kategori.index') }}">Edit Kategori</a>
            </h5>
            <div class="flex gap-10">
                <form
                    action="{{ route('kategori.store') }}"
                    method="post"
                    class="bg-white max-h-60 overflow-hidden sm:rounded-lg w-1/3 flex justify-center items-center"
                >
                    @csrf
                    <div class="w-full p-10 gap-4 grid">
                        <label
                            class="block uppercase tracking-wide font-bold mb-2"
                            for="Kategori"
                        >
                            Kategori
                        </label>
                        <input
                            class="appearance-none block w-full border border-gray-600 rounded-md py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="kategori"
                            type="text"
                            name="kategori"
                        />
                        <div class="">
                            <button
                                class="focus:outline-none bg-white hover:bg-blue-500 text-blue-600 hover:text-white focus:ring-4 focus:ring-blue-300 font-semibold border border-blue-500 rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 shadow"
                            >
                                Membuat Kategori
                            </button>
                        </div>
                    </div>
                </form>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-2/3"
                >
                    <div class="flex justify-center m-8">
                        <div class="max-w-5xl flex items-center shadow-md">
                            <table class="text-left shadow">
                                <thead class="uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Kode Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Option
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kategoris as $kategori)
                                    <tr class="bg-white border-b">
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium"
                                        >
                                            {{$kategori->kode_kategori}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$kategori->kategori}}
                                        </td>
                                        <td
                                            class="px-6 py-4 flex justify-center items-center"
                                        >
                                            <a
                                                href="{{
                                                    route('kategori.edit', $kategori->id)
                                                }}"
                                                class="focus:outline-none bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium roundemax-w-6xl px-5 py-2.5 mr-2 mb-2 rounded-md"
                                            >
                                                Edit Kategori
                                            </a>
                                            <form
                                                action="{{route('kategori.destroy', $kategori->id)}}"
                                                method="post"
                                            >
                                                @csrf @method("DELETE")
                                                <button
                                                    class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium roundemax-w-6xl px-5 py-2.5 mr-2 mb-2 rounded-md"
                                                >
                                                    Hapus Kategori
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 text-gray-600">
                                            Kategori Tidak Tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="m-5">
                        <div class="">
                            {{ $kategoris->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
