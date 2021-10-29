<div>
    <x-slot name="guest">
    </x-slot>
    @if($errors->any())
        <x-jet-banner style="danger" :message="$errors->all()"/>
    @endif
    <x-slot name="header">{{__('Detail Peraturan')}} <a href="{{route('guest.peraturan')}}">
            <x-jet-secondary-button class="mx-3">kembali</x-jet-secondary-button>
        </a></x-slot>
    <div class="mx-auto sm:px-6 lg:px-8 py-3">
        <x-default-card>
            <x-slot name="title">
                {{__('DETAIL PRODUK HUKUM')}}
            </x-slot>
            <x-slot name="icon">

            </x-slot>
            <x-slot name="content">
                <x-card-view title="tipe peraturan" :value="$tipe_peraturan"/>
                <x-card-view title="subjek" :value="$subjek"/>
                <x-card-view title="jenis peraturan" :value="$jenis_peraturan"/>
                <x-card-view title="judul" :value="$judul"/>
                <x-card-view :value="$badan" title="T.E.U. Badan/Pengarang"/>
                <x-card-view :value="$nomor_peraturan" title="Nomor Peraturan"/>
                <x-card-view
                    :value="$tempat_penetapan" title="Tempat Penetapan"/>
                <x-card-view
                    readonly="true"
                    :value="$tahun" title="Tahun" type="number"/>
                <x-card-view
                    readonly="true"
                    :value="$tanggal_ditetapkan" title="Tanggal ditetapkan"/>
                <x-card-view
                    readonly="true"
                    :value="$tanggal_diundangkan" title="Tanggal ditetapkan"/>
                <x-card-view
                    readonly="true"
                    :value="$bahasa" title="Bahasa"/>
                <x-card-view
                    readonly="true"
                    class="col-span-2" :value="$lokasi" title="Lokasi"/>
                <x-card-view
                    readonly="true"
                    class="col-span-2" :value="$status" title="Status"/>
            </x-slot>
        </x-default-card>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8 py-3">
        <x-default-card>
            <x-slot name="title">
                {{__('HISTORI PRODUK HUKUM')}}
            </x-slot>
            <x-slot name="icon">
            </x-slot>
            <x-slot name="content">

                <x-nested-card-view :item="$child" type="child"/>
                <x-nested-card-view :item="$parent" type="parent"/>
            </x-slot>
        </x-default-card>
    </div>
    <div class="mx-auto sm:px-6 lg:px-8 py-3">
        <x-default-card>
            <x-slot name="title">
                {{__('BERKAS PRODUK HUKUM')}}
            </x-slot>
            <x-slot name="icon">
            </x-slot>
            <x-slot name="content">
                <div class="p-3 pl-6">
                    <div class="grid grid-cols-3 gap-4">
                        <x-jet-label class="my-3">Dokumen
                        </x-jet-label>
                        <a class="col-span-2" href="{{$document}}" target="_blank" rel="noopener noreferrer">
                            <x-jet-button>Lihat</x-jet-button>
                        </a>
                    </div>
                </div>
            </x-slot>
        </x-default-card>
    </div>
</div>
