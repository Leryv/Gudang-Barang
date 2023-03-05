<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight capitalize">
            {{ __("Brand") }}
        </h2>
    </x-slot>

    <div class="p-12 text-base">
        <div class="min-w-full min-h-full mx-auto sm:px-6 lg:px-8">
            <h5 class="m-5 gap-3 flex px-12">
                <li class="list-none" class="font-bold">Master Data</li>
                /
                <li class="list-none">Brand</li>
            </h5>
            <div class="flex gap-10">
                <form
                    action="{{ route('brand.update' ,$brands->id) }}"
                    method="post"
                    class="bg-white max-h-80 overflow-hidden sm:rounded-lg w-1/3 flex justify-center items-center"
                >
                    @csrf @method('PATCH')
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b">
                                        <th
                                            scope="row"
                                            class="px-6 py-4 font-medium"
                                        >
                                            {{$brands->kode_brand}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$brands->brand}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
