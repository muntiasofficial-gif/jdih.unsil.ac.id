<div>
    <x-slot name="guest">
    </x-slot>

    <div class=" mx-auto py-4 md:px-6 lg:px-8 grid md:grid-cols-3 gap-4">
        <div class=" md:col-span-2">
            @livewire('guest.peraturan.chart.tahun-without-status')
        </div>
        <div class="md:col-span-1">
            @livewire('guest.peraturan.chart.pie-status')
        </div>
        <div class="md:col-span-3 overflow-x-scroll">
            @livewire('guest.inventarisasi.tahun')
        </div>
    </div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
