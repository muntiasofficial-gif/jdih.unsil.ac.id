<div>
    <x-slot name="guest">
    </x-slot>
    <div class=" mx-auto py-4 md:px-6 lg:px-8 gap-4">
        <x-default-card>
            <x-slot name="title"></x-slot>
            <x-slot name="icon">
            </x-slot>
            <x-slot name="content">
                <form action="{{route('guest.rancangan')}}" method="get" class="p-4">
                    <div class="md:grid md:gap-2 grid-cols-3 ">
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
                    <div class="text-right">
                        <x-jet-secondary-button type="button" wire:click="reset">Reset</x-jet-secondary-button>
                        <x-jet-button> Cari</x-jet-button>
                    </div>
                </form>
            </x-slot>
        </x-default-card>
        @if($table->count() > 0)
            <table
                class=" sm:bg-white table-fixed rounded-lg overflow-hidden sm:shadow-lg my-5 w-full border">
                <thead class="">
                    <tr class="bg-gray-700 text-xs rounded-l-lg sm:rounded-none mb-2 sm:mb-0 text-white">
                        <th class="p-3 text-left  h-15 " style="max-width: 10%;">Nomor </th>
                        <th class="p-3 text-left  h-15" style="width: 30%;">Tentang</th>
                        <th class="p-3 text-left  h-15" style="max-width: 10%;">Status Draft</th>
                        <th class="p-3 text-left  h-15" style="max-width: 30%;">Jenis</th>
                        <th class="p-3 text-left  h-15" style="max-width: 10%;">Kategori</th>
                        <th class="p-3 text-left  h-15" style="max-width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody >
                @foreach($table as $key => $item)
                    <tr class="wrap sm:table-row text-xs mb-2 sm:mb-0 bg-white">
                        <td class="border-grey-light h-15 hover:bg-gray-100 p-3 " >{{$item->nomor_peraturan}}</td>
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
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate" >{{@$item->jenis->keterangan }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate" >{{@$item->subjek->keterangan }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 sm:p-0 md:p-3 truncate" >
                            <div wire:click="view({{$item->id}})">
                                <x-heroicon-o-duplicate class="flex-none w-16 h-7 w-7"/>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {!! $table->links() !!}

        @else
            <div class="flex flex-row mb-1 sm:mb-0 justify-between mt-3 w-full text-center">
                <div class="mx-auto">
                    Tidak Ada Data Rancangan
                </div>
            </div>
        @endif
    </div>
    {{-- The best athlete wants his opponent at his best. --}}
</div>
