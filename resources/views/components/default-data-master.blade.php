<div>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-3">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        {{-- JUDUL --}}
        <div class="mt-5 sm:mt-0">
            {{-- FORM + TABEL --}}
            <div class="md:grid md:grid-cols-4 md:gap-6">
                {{-- FORM SEARCH --}}
                <div class="md:col-span-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <form
                            wire:submit.prevent="save"
                            class="py-3 bg-white border-b border-gray-200 p-3"
                        >
                            <div>
                                <x-default-input
                                    type="text"
                                    :nama="$nama"
                                    :title='($idName ? "Edit " : "")."Nama ".$title'
                                />
                            </div>
                            <div class="text-right mt-3">
                                <x-jet-button class="">
                                    <x-spinner wire:target="save"/>
                                    Tambah
                                </x-jet-button>
                            </div>
                            <div class="mt-10 rounded-lg border-blue-200 bg-blue-50 p-3.5">
                                <div class="flex items-start gap-3">
                                    <div class="text-blue-600 text-xl"></div>
                                    <div>
                                        <h3 class="font-semibold text-blue-800">
                                            Informasi Halaman
                                        </h3>
                                        <p class="mt-1 text-sm text-blue-700">
                                            Anda dapat menambahkan jenis, subjek, dan tipe peraturan pada halaman ini
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- TABEL --}}
                <div class="md:col-span-3 min-w-0">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @if($table->count() > 0)

                            {{-- AREA SCROLL --}}
                            <div
                                class="table-scroll"
                                style="height: 300px;"
                            >

                                <table class="w-full bg-white rounded-lg overflow-hidden">
                                    <thead>
                                        <tr class="bg-gray-700 text-xs text-white">
                                            <th class="p-3 text-left h-15">
                                                No
                                            </th>
                                            <th class="p-3 text-left h-15">
                                                Nama {{$title}}
                                            </th>
                                            <th class="p-3 text-left h-15">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($table as $key => $item)

                                            <tr class="text-xs bg-white">
                                                <td class="border-grey-light h-15 hover:bg-gray-100 p-3">
                                                    {{$key + 1}}
                                                </td>
                                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">
                                                    {{ data_get($item, $nama) }}
                                                </td>
                                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">

                                                    {{-- EDIT --}}
                                                    <button
                                                        type="button"
                                                        wire:click="edit({{$item->id}})"
                                                    >
                                                        Edit
                                                    </button>
                                                    |
                                                    {{-- DELETE --}}
                                                    <button
                                                        type="button"
                                                        x-data
                                                        x-on:click="$dispatch('open-delete-{{$item->id}}')"
                                                    >
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else

                            <div class="flex flex-row mb-1 sm:mb-0 justify-between mt-3 w-full text-center">

                                <div class="mx-auto">
                                    Tidak Ada Data
                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    @foreach($table as $key => $item)

        <div
            x-data="{ show: false }"
            x-on:open-delete-{{$item->id}}.window="show = true"
            x-on:keydown.escape.window="show = false"
            x-show="show"
            x-cloak
            style="display: none;"
        >

            {{-- BACKDROP --}}
            <div
                class="fixed inset-0 z-50 bg-gray-500"
                style="opacity: 0.75;"
                x-on:click="show = false"
            ></div>


            {{-- CARD --}}
            <div
                class="fixed z-50 bg-white rounded-lg shadow-xl overflow-hidden"
                style="
                    top: 50% !important;
                    left: 50% !important;
                    transform: translate(-50%, -50%) !important;
                    width: calc(100% - 2rem) !important;
                    max-width: 32rem !important;
                    margin: 0 !important;
                "
            >

                {{-- CONTENT --}}
                <div class="px-6 py-4">
                    <div class="text-lg font-medium text-gray-900">
                        Hapus Data
                    </div>
                    <div class="mt-4 text-sm text-gray-600">
                        Apakah anda yakin akan menghapus:
                        <strong class="font-semibold text-gray-900">
                            {{ data_get($item, $nama) }}
                        </strong>
                        ?
                    </div>
                </div>


                {{-- FOOTER --}}
                <div class="px-6 py-4 bg-gray-100">
                    <div class="flex items-center justify-end gap-2">

                        {{-- CANCEL --}}
                        <button
                            type="button"
                            class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700"
                            x-on:click="show = false"
                        >
                            Cancel
                        </button>

                        {{-- DELETE --}}
                        <button
                            type="button"
                            class="px-4 py-2 bg-red-600 text-white rounded-md text-sm"
                            wire:click="remove({{$item->id}})"
                            wire:loading.attr="disabled"
                            x-on:click="show = false"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach


    <style>

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        .table-scroll {
            height: 300px;
            overflow-y: auto;
            overflow-x: auto;
        }

        [x-cloak] {
            display: none !important;
        }

        @media (min-width: 640px) {

            table {
                display: table !important;
            }

            thead tr:not(:first-child) {
                display: none;
            }

        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:not(:last-child) {
            border-bottom: 2px solid rgba(0, 0, 0, .1);
        }

    </style>
</div>