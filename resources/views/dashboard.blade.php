<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class=" mx-auto py-4 md:px-6 lg:px-8 grid md:grid-cols-3 gap-4">
        <div class=" md:col-span-3">
            @livewire('guest.peraturan.chart.tahun-without-status')
        </div>
        <div class="md:col-span-1">
            @livewire('guest.peraturan.chart.pie-status')
        </div>
        <div class="">
            @livewire('guest.peraturan.chart.publish')
        </div>
        <div class="md:col-span-3 overflow-x-scroll">
            @livewire('guest.inventarisasi.tahun')
        </div>
    </div>
</x-app-layout>
