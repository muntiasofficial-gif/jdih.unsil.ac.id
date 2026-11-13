<div class="mx-auto sm:px-6 lg:px-8 py-3">
    <x-slot name="header">{{__('Peraturan')}}</x-slot>
    <div class="mt-4 peraturan-layout">

        <div class="peraturan-filter">
            <div class="peraturan-filter-inner">
                <h3 class="text-lg font-semibold text-gray-800">
                    Filter
                </h3>
                <div class="filter-fields">

                    <div class="filter-item">
                        <x-default-input
                            placeholder="Cari peraturan perundang-undangan bidang pendidikan dan kebudayaan"
                            nama="judul"
                            type="text"
                            title="Judul"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-select
                            :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                            name="subjek_id"
                            title="Kategori"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-select
                            :option="\App\Models\Peraturan::tahun()->prepend('Pilih',' ')"
                            name="tahun"
                            title="Tahun"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-select
                            :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                            name="jenis_peraturan_id"
                            title="Jenis"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-select
                            :option="\App\Models\Peraturan::status()->prepend('Pilih',' ')"
                            name="status"
                            title="Status"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-select
                            :option="collect([0 => 'Tidak', 1 => 'YA'])->prepend('Pilih',' ')"
                            name="is_publish"
                            title="Publish"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-select
                            :option="collect([0 => 'Tidak', 1 => 'YA'])->prepend('Pilih',' ')"
                            name="draft"
                            title="Draft"
                        />
                    </div>

                    <div class="filter-item">
                        <x-default-input
                            title="Nomor"
                            nama="nomor_peraturan"
                            type="text"
                        />
                    </div>
                </div>

                <div class="filter-buttons">
                    <x-jet-secondary-button wire:click="reset">
                        Reset
                    </x-jet-secondary-button>
                    <a href="{{route('peraturan.add')}}">
                        <x-jet-button>
                            + Tambah Peraturan
                        </x-jet-button>
                    </a>
                    @livewire(
                        'super-admin.peraturan.upload',
                        [],
                        key('import-excel')
                    )
                </div>
            </div>
        </div>

        <div class="peraturan-table">
            @if($table->count() > 0)
                <div class="peraturan-table-scroll">
                    <table class="peraturan-data-table">
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
                                    Dilihat Peraturan
                                </th>
                                <th class="p-3 text-left h-15">
                                    Dilihat Dokumen
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
                <div class="peraturan-pagination">
                    {!! $table->links() !!}
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

        .peraturan-layout {
            display: grid;
            grid-template-columns: 520px minmax(0, 1fr);
            gap: 16px;
            align-items: stretch;
        }

        .peraturan-filter {
            height: 500px;
            min-width: 0;
            overflow: hidden;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
        }

        .peraturan-filter-inner {
            height: 100%;
            padding: 20px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .filter-fields {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 10px 12px;
            margin-top: 16px;
        }

        .filter-item {
            width: 100% !important;
            min-width: 0 !important;
        }

        .filter-item > * {
            width: 100% !important;
            min-width: 0 !important;
        }

        .filter-buttons {
            margin-top: 16px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: flex-end;
        }

        .peraturan-table {
            height: 500px;
            min-width: 0;
            overflow: hidden;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
        }

        .peraturan-table-scroll {
            height: 490px;
            overflow-x: auto;
            overflow-y: auto;
        }

        .peraturan-data-table {
            min-width: 1200px;
            width: max-content;
            background: white;
            border-collapse: collapse;
        }

        .peraturan-data-table th,
        .peraturan-data-table td {
            white-space: nowrap;
        }

        .peraturan-data-table th {
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

        .peraturan-pagination {
            height: 55px;
            padding: 8px 12px;
            overflow: hidden;
        }

    </style>

</div>