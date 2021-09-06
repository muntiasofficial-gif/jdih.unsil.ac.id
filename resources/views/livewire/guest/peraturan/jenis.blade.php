<x-default-card>
    <x-slot name="title">
        {{__('JENIS PRODUK HUKUM')}}
    </x-slot>
    <x-slot name="icon">
        <x-heroicon-o-bookmark class="flex-none w-16 h-7 w-7"/>
    </x-slot>
    <x-slot name="content">
        @if($data->count())
            @foreach($data  as $item)
                <a href="{{route('guest.peraturan',['jenis_peraturan_id' => $item->id])}}">
                    <dd class="mt-1 hover:bg-gray-100 hover:text-blue-500 text-sm text-gray-900 sm:mt-0 sm:col-span-3 flex gap-1 p-3 border-b">
                        <x-heroicon-o-document-duplicate class="flex-none w-16 h-7 w-7"/>
                        <div class="flex-grow">
                            <h3 class="text-sm pt-2">{{strtoupper($item->keterangan)}}</h3>
                        </div>
                        <div class="flex-end text-right">
                            <spanc class="bg-gray-800 px-4 rounded-md text-white">{{$item->peraturan->count()}}</spanc>
                        </div>
                    </dd>
                </a>
            @endforeach
        @else
            {{__('Tidak data jenis peraturan')}}
        @endif
    </x-slot>
</x-default-card>
