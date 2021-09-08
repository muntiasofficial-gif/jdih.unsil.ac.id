<div {{$attributes->merge(['class' => 'mb-4'])    }}>
    <x-jet-label for="{{$nama}}" value="{{__(ucfirst(str_replace('_',' ',$title)))}}" class="mb-2"/>
    @if($change)
        <x-jet-input id="{{$nama}}"
                     class="block mt-1 w-full"
                     type="{{$type}}"
                     name="{{$nama}}"
                     value="{{old($nama)}}"
                     :placeholder="__($placeholder ? $placeholder : $title )"
                     accept="{{$accept ?? ''}}" autofocus
                     wire:model="{{$nama}}"
                     wire:change="{{$change}}"
                     value="{{old($nama)}}"/>
    @elseif($readonly)
        <x-jet-input id="{{$nama}}"
                     readonly
                     class="block mt-1 w-full"
                     type="{{$type}}"
                     name="{{$nama}}"
                     value="{{old($nama)}}"
                     :placeholder="__($placeholder ? $placeholder : $title )"
                     accept="{{$accept ?? ''}}" autofocus
                     wire:model="{{$nama}}"
                     value="{{old($nama)}}"/>
    @else
        <x-jet-input id="{{$nama}}"
                     class="block mt-1 w-full"
                     type="{{$type}}"
                     name="{{$nama}}"
                     value="{{old($nama)}}"
                     :placeholder="__($placeholder ? $placeholder : $title )"
                     accept="{{$accept ?? ''}}" autofocus
                     wire:model="{{$nama}}"
                     value="{{old($nama)}}"/>
    @endif
    @error($nama) <span class="text-red-500">{{ $message }}</span> @enderror
</div>
