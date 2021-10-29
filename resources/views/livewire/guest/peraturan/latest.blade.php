<x-default-card>
    <x-slot name="title">
        {{__('PRODUK HUKUM TERBARU')}}
    </x-slot>
    <x-slot name="icon">
        <x-heroicon-o-collection class="flex-none w-16 h-7 w-7"/>
    </x-slot>
    <x-slot name="content">
        @if($data->count())
            @foreach($data as $item)
{{--                <a href="{{route('guest.peraturan.view',['peraturan_id' => $item->id])}}">--}}
                    <dd wire:click="view({{$item->id}})" class="text-sm py-3 px-4 pl-8 hover:bg-gray-100 text-gray-900 sm:mt-0 sm:col-span-3 flex gap-4">
                        <x-heroicon-o-document class="flex-none h-8 "/>
                        <div class="flex-grow ">
                            <h3 class="text-lg font-bold text-blue-500">{{@$item->jenis->keterangan." Nomor ".$item->nomor_peraturan." Tahun ".$item->tahun}}</h3>
                            <p>{{$item->judul}}</p>
                            <p class="font-bold my-3">{{__('Subjek')}} :
                                @if($item->subjek)
                                    <span
                                        class="bg-gray-700 text-white px-2 rounded">{{@$item->subjek->keterangan}}</span>
                                @endif
                            </p>
                        </div>
                    </dd>
{{--                </a>--}}
            @endforeach
        @else
            <div class="text-center py-2">
                {{__('Tidak data peraturan terbaru')}}
            </div>
        @endif
    </x-slot>
</x-default-card>
