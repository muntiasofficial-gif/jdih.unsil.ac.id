<div {{$attributes->merge(['class' => 'mb-1'])    }}>
    <x-jet-label :for="$name" value="{{__(ucfirst(str_replace('_',' ',$title)))}}" class="mb-2"/>
    <x-select :option="$option" :name="$name" value="$value"/>
    @error($name) <span class="text-red-500">{{ $message }}</span> @enderror

</div>
