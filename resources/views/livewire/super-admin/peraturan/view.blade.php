<div class="mx-auto sm:px-6 lg:px-8 py-3">
    <x-slot name="header">{{__('Peraturan')}}</x-slot>
    <div class="mt-4">
        <x-jet-action-section class="md:grid md:grid-cols-2 md:gap-6 grid-cols-2">
            <x-slot name="title">
                Filter
            </x-slot>
            <x-slot name="description">
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-3 gap-3">
                    <x-default-input placeholder='Cari peraturan perundang-undangan bidang pendidikan dan kebudayaan'
                                     class="col-span-3" nama="judul" type="text" title="Judul"/>
                    <x-default-select
                        :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                        name="subjek_id" title="Kategori"/>
                    <x-default-select :option="\App\Models\Peraturan::tahun()->prepend('Pilih',' ')" name="tahun"
                                      title="Tahun"/>
                    <x-default-select
                        :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                        name="jenis_peraturan_id" title="Jenis"/>
                    <x-default-select :option="\App\Models\Peraturan::status()->prepend('Pilih',' ')" name="status"
                                      title="Status"/>
                    <x-default-input title="Nomor" nama="nomor_peraturan" type="text"/>
                </div>
                <div class="text-right">
                    <x-jet-secondary-button wire:click="reset">Reset</x-jet-secondary-button>
                    <a href="{{route('peraturan.add')}}">
                        <x-jet-button> + Tambah Peraturan</x-jet-button>
                    </a>
                    @livewire('super-admin.peraturan.upload',[],key('export-excel'))
                </div>
            </x-slot>
        </x-jet-action-section>
        @if($table->count() > 0)
            <table
                class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="">
                @foreach($table as $item)
                    <tr class="bg-gray-700 flex flex-col flex-no wrap sm:table-row text-xs rounded-l-lg sm:rounded-none mb-2 sm:mb-0 text-white">
                        <th class="p-3 text-left  h-15 ">Nomor</th>
                        <th class="p-3 text-left  h-15">Tentang</th>
                        <th class="p-3 text-left  h-15">Status</th>
                        <th class="p-3 text-left  h-15">Jenis</th>
                        <th class="p-3 text-left  h-15">Kategori</th>
                        <th class="p-3 text-left  h-15">Aksi</th>
                    </tr>
                @endforeach
                </thead>
                <tbody class="flex-1 sm:flex-none">
                @foreach($table as $key => $item)
                    <tr class="flex flex-col flex-no wrap sm:table-row text-xs mb-2 sm:mb-0 bg-white">
                        <td class="border-grey-light h-15 hover:bg-gray-100 p-3">{{$item->nomor_peraturan}}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->judul }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->status }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->jenis->keterangan }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->subjek->keterangan }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">
                            <a href="{{route('peraturan.edit',['peraturan_id' => $item->id])}}">
                                <button>Edit</button>
                            </a>
                            |
                            <button

                                onclick="confirm('Apakah anda yakin menghapus: {{$item->judul}}') && @this.remove({{$item->id}})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {!! $table->links() !!}

        @else
            <div class="flex flex-row mb-1 sm:mb-0 justify-between mt-3 w-full text-center">
                <div class="mx-auto">
                    Tidak Ada Data
                </div>
            </div>
        @endif
    </div>
    <style>
        html,
        body {
            height: 100%;
        }

        @media (min-width: 640px) {
            table {
                display: inline-table !important;
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
