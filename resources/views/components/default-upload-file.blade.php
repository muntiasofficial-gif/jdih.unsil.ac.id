<div {{$attributes->merge(['class' => 'mb-4'])    }}>
    <x-jet-label for="{{$nama}}"  class="mb-2">
        {!! $title !!}
    </x-jet-label>
    <x-jet-input id="{{$nama}}" class="block mt-1 w-full " accept="{{$accept}}" type="file" name="{{$nama}}"
                 value="{{old($nama)}}"
                 required
                 autofocus wire:model="{{$nama}}" value="{{old($nama)}}"/>
    @error($nama) <span class="text-red-500">{{ $message }}</span> @enderror
    @if($document)
        <div class="my-2">
            <x-jet-label>Preview</x-jet-label>
            @if(is_string($document))
                <embed class="w-full h-screen" src="{{$document}}">
            @else
                <embed class="w-full h-screen" src="{{$document->temporaryUrl()}}">
            @endif
        </div>
    @endif
</div>
