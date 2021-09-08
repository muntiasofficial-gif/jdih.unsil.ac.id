<div>
    <x-slot name="guest">
    </x-slot>
    <div class=" mx-auto py-4 md:px-6 lg:px-8 gap-4">
        <x-default-card>
            <x-slot name="title"></x-slot>
            <x-slot name="icon">
            </x-slot>
            <x-slot name="content">
                <form action="{{route('guest.peraturan')}}" method="get" class="p-4">
                    <div class="md:grid md:gap-2 grid-cols-3 ">
                        <x-default-input
                            placeholder='Cari peraturan perundang-undangan bidang pendidikan dan kebudayaan'
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
                            :option="\App\Models\Peraturan::status()->prepend('Pilih',' ')"
                            name="status"
                            title="Status"/>
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
                class="w-full sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="">
                    <tr class="bg-gray-700 wrap sm:table-row text-xs rounded-l-lg sm:rounded-none mb-2 sm:mb-0 text-white">
                        <th class="p-3 text-left  h-15 ">Nomor</th>
                        <th class="p-3 text-left  h-15">Tentang</th>
                        <th class="p-3 text-left  h-15">Status</th>
                        <th class="p-3 text-left  h-15">Jenis</th>
                        <th class="p-3 text-left  h-15">Kategori</th>
                        <th class="p-3 text-left  h-15">Aksi</th>
                    </tr>
                </thead>
                <tbody >
                @foreach($table as $key => $item)
                    <tr class="wrap sm:table-row text-xs mb-2 sm:mb-0 bg-white">
                        <td class="border-grey-light h-15 hover:bg-gray-100 p-3">{{$item->nomor_peraturan}}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->judul }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->status }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->jenis->keterangan }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">{{$item->subjek->keterangan }}</td>
                        <td class="border-grey-light border-t-2 h-15 hover:bg-gray-100 p-3 truncate">
                            <a href="{{route('guest.peraturan.view',['peraturan_id' => $item->id])}}">
                                <x-heroicon-o-duplicate class="flex-none w-16 h-7 w-7"/>
                            </a>
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
    {{-- The best athlete wants his opponent at his best. --}}
</div>
