<div {{$attributes->merge(['class' => 'mb-4'])    }}>
    <x-jet-label for="{{$nama}}" value="{{__(ucfirst(str_replace('_',' ',$title)))}}" class="mb-2"/>
    <x-jet-input id="{{$nama}}" class="block mt-1 w-full " type="{{$type}}" name="{{$nama}}" value="{{old($nama)}}"
                 :placeholder="__($placeholder ? $placeholder : $title )"
                 autofocus wire:model="{{$nama}}" value="{{old($nama)}}"/>
    @error($nama) <span class="text-red-500">{{ $message }}</span> @enderror
</div>
