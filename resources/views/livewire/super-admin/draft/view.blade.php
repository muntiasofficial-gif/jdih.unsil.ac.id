<div class="mx-auto sm:px-6 lg:px-8 py-3">

    <x-slot name="header">{{__('Draft Peraturan')}}</x-slot>

    <div class="mt-4 draft-layout">

        {{-- ==================== FILTER ==================== --}}
        <div class="draft-filter">

            <div class="draft-filter-inner">

                <h3 class="text-lg font-semibold text-gray-800">
                    Filter
                </h3>

                <div class="draft-filter-fields">

                    {{-- Judul --}}
                    <div class="draft-filter-item">
                        <x-default-input
                            placeholder="Cari draft peraturan perundang-undangan bidang pendidikan dan kebudayaan"
                            nama="judul"
                            type="text"
                            title="Judul"
                        />
                    </div>

                    {{-- Kategori --}}
                    <div class="draft-filter-item">
                        <x-default-select
                            :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                            name="subjek_id"
                            title="Kategori"
                        />
                    </div>

                    {{-- Tahun --}}
                    <div class="draft-filter-item">
                        <x-default-select
                            :option="\App\Models\Peraturan::tahun()->prepend('Pilih',' ')"
                            name="tahun"
                            title="Tahun"
                        />
                    </div>

                    {{-- Jenis --}}
                    <div class="draft-filter-item">
                        <x-default-select
                            :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                            name="jenis_peraturan_id"
                            title="Jenis"
                        />
                    </div>

                    {{-- Status Draft --}}
                    <div class="draft-filter-item">
                        <x-default-select
                            :option="collect([0 => 'Proses', 1 => 'Selesai'])->prepend('Pilih',' ')"
                            name="jenis_draft"
                            title="Status Draft"
                        />
                    </div>

                    {{-- Nomor --}}
                    <div class="draft-filter-item">
                        <x-default-input
                            title="Nomor"
                            nama="nomor_peraturan"
                            type="text"
                        />
                    </div>
                </div>


                {{-- ==================== BUTTON ==================== --}}
                <div class="draft-filter-buttons">
                    <x-jet-secondary-button wire:click="reset">
                        Reset
                    </x-jet-secondary-button>
                    <a href="{{route('peraturan.add')}}">
                        <x-jet-button>
                            + Tambah Draft Peraturan
                        </x-jet-button>
                    </a>
                </div>
            </div>
        </div>

        <div class="draft-table">

            @if($table->count() > 0)

                <div class="draft-table-scroll">
                    <table class="draft-data-table">
                        <thead>
                            <tr class="bg-gray-700 text-xs text-white">
                                <th class="p-3 text-left h-15">
                                    #
                                </th>
                                <th class="p-3 text-left h-15">
                                    Nomor Peraturan
                                </th>
                                <th class="p-3 text-left h-15">
                                    Tentang
                                </th>
                                <th class="p-3 text-left h-15">
                                    Status Publish
                                </th>
                                <th class="p-3 text-left h-15">
                                    Status Draft
                                </th>
                                <th class="p-3 text-left h-15">
                                    Jenis
                                </th>
                                <th class="p-3 text-left h-15">
                                    Kategori
                                </th>
                                <th class="p-3 text-left h-15">
                                     Peraturan Dilihat
                                </th>
                               <th class="p-3 text-left h-15">
                                     Dokumen Dilihat
                                </th>
                                <th class="p-3 text-left h-15">
                                    Aksi
                                </th>
                            </tr>
                        </thead>


                        <tbody>

                        @foreach($table as $key => $item)

                            <tr class="text-xs bg-white">

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{$table->firstItem() + $key}}
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{$item->nomor_peraturan}}
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{$item->judul}}
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">

                                    @if($item->is_publish == 1)

                                        <span class="text-green-600 font-semibold">
                                            Publish
                                        </span>

                                    @else

                                        <span class="text-red-600 font-semibold">
                                            Draft
                                        </span>

                                    @endif

                                </td>


                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">

                                    @if(isset($item->jenis_draft))

                                        @if($item->jenis_draft == 1)

                                            <span class="text-blue-600 font-semibold">
                                                Selesai
                                            </span>

                                        @else

                                            <span class="text-orange-600 font-semibold">
                                                Proses
                                            </span>

                                        @endif

                                    @else

                                        <span class="text-gray-500">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{@$item->jenis->keterangan ?? ''}}
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{@$item->subjek->keterangan ?? ''}}
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{$item->count ?? '0'}}x
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    {{$item->count_download ?? '0'}}x
                                </td>

                                <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3">
                                    <a href="{{route('peraturan.edit',['peraturan_id' => $item->id])}}">
                                        <button>
                                            Edit
                                        </button>
                                    </a>
                                    |
                                    <button type="button" x-data x-on:click="$dispatch('open-delete-user-{{$item->id}}')" class="text-red-600">Delete</button>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>

                {!! $table->links() !!}

            @else

                <div class="flex flex-row mb-1 sm:mb-0 justify-between mt-3 w-full text-center">
                    <div class="mx-auto">
                        Tidak Ada Data Draft
                    </div>
                </div>
            @endif
        </div>
    </div>

    @foreach ($table as $key => $item)
<div x-data="{ show:false }"
            x-on:open-delete-user-{{$item->id}}.window="show = true" 
            x-on:keydown.escape.window="show = false"
            x-show="show"
            x-cloak
            style="display: none;" >
        <div class="fixed inset-0 z-50 bg-gray-500" style="opacity: 0.75;" x-on:click="show = false"></div>
    <div class="fixed z-50 bg-white rounded-lg shadow-xl overflow-hidden" 
        style="top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                width: calc(100% - 2rem) !important;
                max-width: 32rem !important;
                margin: 0 !important;">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">Hapus Pengguna</div>
                <div class="mt-4 text-sm text-gray-600">Apakah anda yakin akan menghapus: <strong class="font-semibold text-gray-900">{{ $item->name }}</strong>?</div>
            </div>
    
        <div class="px-6 py-4 bg-gray-100">
            <div class="flex items-center justify-end gap-2">
                <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700" x-on:click="show = false">Cancel</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md text-sm" wire:click="remove({{ $item->id }})" wire:loading.attr="disabled" x-on:click="show = false">Delete</button>
            </div>
        </div>
    </div>
</div>
            
        @endforeach


    <style>

        html,
        body {
            height: 100%;
        }

        .draft-layout {
            display: grid;
            grid-template-columns: 520px minmax(0, 1fr);
            gap: 16px;
            align-items: stretch;
        }

        .draft-filter {
            height: 430px;
            min-width: 0;
            overflow: hidden;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
        }


        .draft-filter-inner {
            height: 100%;
            padding: 20px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .draft-filter-fields {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            column-gap: 14px !important;
            row-gap: 18px !important;
            margin-top: 16px;
        }


        .draft-filter-item {
            width: 100% !important;
            min-width: 0 !important;
        }


        .draft-filter-item > * {
            width: 100% !important;
            min-width: 0 !important;
        }

        .draft-filter-buttons {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: flex-end;
        }

        .draft-table {
            height: 430px;
            min-width: 0;
            overflow: hidden;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
        }

            height: 420px;
            overflow-x: auto;
            overflow-y: auto;
        }

        .draft-data-table {
            min-width: 1200px;
            width: max-content;
            background: white;
            border-collapse: collapse;
        }

        .draft-data-table th,
        .draft-data-table td {
            white-space: nowrap;
        }

        .draft-data-table th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #374151;
            color: white;
        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:not(:last-child) {
            border-bottom: 2px solid rgba(0, 0, 0, .1);
        }

    </style>

</div>