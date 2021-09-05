<div>
    <x-slot name="guest">
    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8 py-3 mt-3 grid md:grid-cols-3 gap-4">
        <div class="grid-cols-auto-fit grid-rows-auto-fit md:col-span-2 grid-template-rows">
            @livewire('guest.peraturan.search')
        </div>
        <div class="grid-cols-none md:row-span-4">
            @livewire('guest.peraturan.jenis')
        </div>
        <div class=" md:col-span-2 ">
            @livewire('guest.peraturan.latest')
        </div>
        <div class=" md:col-span-2 ">
            @livewire('guest.peraturan.chart.tahun')
        </div>
    </div>
    {{-- Do your work, then step back. --}}
</div>
