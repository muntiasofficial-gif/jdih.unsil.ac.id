<div>
    <x-slot name="guest">
    </x-slot>
    <div class=" mx-auto py-4 md:px-6 lg:px-8 grid md:grid-cols-3 gap-4">
        <div class="md:col-span-2 ">
            @livewire('guest.peraturan.search')
        </div>
        <div class="md:row-span-4">
            @livewire('guest.peraturan.jenis')
        </div>
        <div class=" md:col-span-2 ">
            @livewire('guest.peraturan.latest')
        </div>
        <div class=" md:col-span-2">
            @livewire('guest.peraturan.chart.tahun')
        </div>
    </div>
    {{-- Do your work, then step back. --}}
</div>
