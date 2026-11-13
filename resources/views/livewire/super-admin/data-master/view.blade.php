<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Master') }}
        </h2>
    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8 py-3">
       <div class="flex items-start justify-between">
        <div>
            @if ($tabButton == "jenis")
                <h3 class="text-lg font-medium leading-6 text-gray-900"> Jenis Peraturan</h3>
                <p class="mt-1 text-sm text-gray-600">Konfigurasi Jenis Peraturan</p>
                @elseif ($tabButton == "kategori")
                <h3 class="text-lg font-medium leading-6 text-gray-900"> Subjek Peraturan</h3>
                <p class="mt-1 text-sm text-gray-600">Konfigurasi Subjek Peraturan</p>
                @elseif ($tabButton == "tipe")
                <h3 class="text-lg font-medium leading-6 text-gray-900"> Tipe Peraturan</h3>
                <p class="mt-1 text-sm text-gray-600">Konfigurasi Tipe Peraturan</p>
            @endif
        </div>
        <div>
            <x-tab :tab="$tab" :tabButton="$tabButton"/>
        </div>
       </div>
    </div>
    @if($tabButton == "jenis")
        @livewire('super-admin.data-master.jenis.view')
    @elseif($tabButton == "kategori")
        @livewire('super-admin.data-master.kategori.view')
    @elseif($tabButton == "tipe")
        @livewire('super-admin.data-master.tipe.view')
    @endif
</div>

{{-- <div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Master') }}
        </h2>
    </x-slot>
    <div class="mx-auto sm:px-6 lg:px-8 py-3">
        <x-tab :tab="$tab" :tabButton="$tabButton"/>
    </div>
    @if($tabButton == "jenis")
        @livewire('super-admin.data-master.jenis.view')
    @elseif($tabButton == "kategori")
        @livewire('super-admin.data-master.kategori.view')
    @elseif($tabButton == "tipe")
        @livewire('super-admin.data-master.tipe.view')
    @endif
</div> --}}
