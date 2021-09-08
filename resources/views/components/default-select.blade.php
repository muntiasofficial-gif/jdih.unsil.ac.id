<div {{$attributes->merge(['class' => 'mb-1'])    }}>
    <x-jet-label :for="$name" value="{{__(ucfirst(str_replace('_',' ',$title)))}}" class="mb-2"/>
    @if($readonly)
        <x-select :readonly="$readonly" :option="$option" :name="$name" value="$value"/>
    @else
        <x-select :option="$option" :name="$name" value="$value"/>
    @endif
    @error($name) <span class="text-red-500">{{ $message }}</span> @enderror

</div>
