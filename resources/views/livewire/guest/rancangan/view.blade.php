<div class="rancangan-page">
    <x-slot name="guest">
    </x-slot>
    <div class=" mx-auto py-4 md:px-6 lg:px-8 gap-4">
        <div class="rancangan-layout">
            <div class="rancangan-filter">
                <div class="rancangan-filter-inner">
                    <h3 class="text-lg font-semibold text-gray-800">Filter</h3>
                    <form action="{{ route('guest.rancangan') }}" method="get">
                        <div class="rancangan-filter-fields">
                            <x-default-input
                            placeholder='Cari rancangan peraturan perundang-undangan bidang pendidikan dan kebudayaan'
                            class="col-span-3" nama="judul" type="text" title="Judul"/>
                            <x-default-select
                            :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                            name="subjek_id" title="Kategori"/>
                            <x-default-select
                            :option="\App\Models\Peraturan::tahun()->prepend('Pilih',' ')" name="tahun"
                                          title="Tahun"/>
                            <x-default-select

                            :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                            name="jenis_peraturan_id" title="Jenis"/>
                            <x-default-select
                            :option="collect([0 => 'Proses', 1 => 'Selesai'])->prepend('Pilih',' ')"
                            name="jenis_draft"
                            title="Status Draft"/>
                            <x-default-input
                            title="Nomor" nama="nomor_peraturan" type="text"/>
                        </div>
                        <div class="rancangan-filter-buttons">
                            <x-jet-secondary-button type="button" wire:click="reset">Reset</x-jet-secondary-button>
                            <x-jet-button> Cari</x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="rancangan-table">
                @if ($table->count() > 0)
                    <div class="rancangan-table-scroll">
                <table class="rancangan-data-table">
                <thead>
                    <tr class="bg-gray-700 text-xs rounded-l-lg sm:rounded-none mb-2 sm:mb-0 text-white">
                        <th class="p-3 text-left  h-15 " style="max-width: 10%;">Nomor </th>
                        <th class="p-3 text-left  h-15" style="width: 30%;">Tentang</th>
                        <th class="p-3 text-left  h-15" style="max-width: 10%;">Status Draft</th>
                        <th class="p-3 text-left  h-15" style="max-width: 30%;">Jenis</th>
                        <th class="p-3 text-left  h-15" style="max-width: 10%;">Kategori</th>
                        {{-- <th class="p-3 text-left  h-15" style="max-width: 10%;">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                @foreach($table as $key => $item)
                    <tr class="wrap sm:table-row text-xs mb-2 sm:mb-0 bg-white" wire:click="view({{ $item->id }})">
                        <td class="border-grey-light h-15 hover:bg-gray-100 p-3" >{{$item->nomor_peraturan}}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->judul }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">
                            @if(isset($item->jenis_draft))
                                @if($item->jenis_draft == 1)
                                    <span class="text-blue-600 font-semibold">Selesai</span>
                                @else
                                    <span class="text-orange-600 font-semibold">Proses</span>
                                @endif
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                        </td>
                        <td>{{@$item->jenis->keterangan }}</td>
                        <td>{{@$item->subjek->keterangan }}</td>
                        {{-- <td>
                            <button type="button" wire:click="view({{ $item->id }})" class="felx items-center justify-center">
                                <x-heroicon-o-duplicate class="w-7 h-7"/>
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>

                </table>
                    </div>
                    <div class="rancangan-pagination">
                        {!! $table->links() !!}
                    </div>
                    @else
                    <div class="flex item-center justify-center h-full text-center">Tidak ada data</div>
                @endif
            </div>
        </div>
    </div>
    <style>
        html,
        body {
            height: 100%;
            overflow: hidden !important;
        }

        .rancangan-page {
            height: 100vh;
            overflow: hidden;
        }

        .rancangan-layout {
            display: grid;
            grid-template-columns: 520px minmax(0, 1fr);
            gap: 16px;
            height: 500px;
            align-items: stretch;
        }

        .rancangan-filter {
            height: 450px;
            min-width: 0;
            overflow: hidden;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
        }

        .rancangan-filter-inner {
            height: 100%;
            padding: 20px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .rancangan-filter-fields {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 18px 14px;
            margin-top: 16px;
        }

        .rancangan-filter-fields > * {
            width: 100% !important;
            min-width: 0 !important;
        }

        .rancangan-filter-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 6px;
        }

        .rancangan-table {
            height: 450px;
            min-width: 0;
            overflow: hidden;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
            display: flex;
            flex-direction: column;
        }

        .rancangan-table-scroll {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .rancangan-data-table {
            width: 100%;
            max-width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            background: white;
        }

        .rancangan-data-table th,
        .rancangan-data-table td {
            padding: 12px;
            text-align: left;
            font-size: 0.75rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .rancangan-data-table th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #374151;
            color: white;
            font-weight: 600;
        }

        .rancangan-data-table td {
            border-top: 2px solid #f3f4f6;
        }

        .rancangan-data-table th:hover td {
            background-color: #f9fafb;
        }

        .rancangan-data-table th:nth-child(1),
        .rancangan-data-table td:nth-child(1) {
            width: 15%;
        }

        .rancangan-data-table th:nth-child(2),
        .rancangan-data-table td:nth-child(2) {
            width: 35%;
        }

        .rancangan-data-table th:nth-child(3),
        .rancangan-data-table td:nth-child(3) {
            width: 15%;
        }

        .rancangan-data-table th:nth-child(4),
        .rancangan-data-table td:nth-child(4) {
            width: 15%;
        }

        .rancangan-data-table th:nth-child(5),
        .rancangan-data-table td:nth-child(5) {
            width: 15%;
        }

        .rancangan-data-table th:nth-child(6),
        .rancangan-data-table td:nth-child(6) {
            width: 5%;
            text-align: center;
        }

        .rancangan-pagination {
            flex-shrink: 0;
            height: 55px;
            padding: 8px 12px;
            overflow: hidden;
            background: white;
        }

        @media (max-width: 767px) {
            html,
            body {
                overflow: auto !important;
            }

            .rancangan-page {
                height: auto;
                overflow: visible;
            }

            .rancangan-layout {
                grid-template-columns: 1fr;
                height: auto;
            }

            .rancangan-filter,
            .rancangan-table {
                height: 500px;
            }
        }
    </style>