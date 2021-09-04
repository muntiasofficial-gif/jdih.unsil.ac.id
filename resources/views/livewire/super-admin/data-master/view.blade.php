<div>
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
</div>
