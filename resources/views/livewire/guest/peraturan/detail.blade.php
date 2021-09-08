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

        <x-jet-action-section class="md:grid md:grid-cols-2 md:gap-6 grid-cols-2">
            <x-slot name="title"></x-slot>
            <x-slot name="description"></x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-2 gap-4">
                    {{--                <x-default-select--}}
                    {{--                    readonly="true"--}}
                    {{--                    class="col-span-2"--}}
                    {{--                                  :option="\App\Models\TipePeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"--}}
                    {{--                                  name="tipe_peraturan_id" title="Tipe Peraturan"/>--}}
                    <x-default-input
                        readonly="true"
                        type="text"
                        nama="tipe_peraturan" title="Tipe Peraturan"
                        class="col-span-2"/>
                    {{--                <x-default-select--}}
                    {{--                    readonly="true"--}}
                    {{--                    class="col-span-2"--}}
                    {{--                                  :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"--}}
                    {{--                                  name="subjek_id" title="Subjek"/>--}}
                    <x-default-input
                        readonly="true"
                        type="text"
                        nama="subjek"
                        title="Subjek"
                        class="col-span-2"/>
                    {{--                <x-default-select--}}
                    {{--                    readonly="true"--}}
                    {{--                    class="col-span-2"--}}
                    {{--                                  :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"--}}
                    {{--                                  name="jenis_peraturan_id" title="Jenis"/>--}}
                    <x-default-input
                        readonly="true"
                        type="text"
                        nama="jenis_peraturan"
                        title="Jenis Peraturan"
                        class="col-span-2"/>
                    <x-default-input
                        readonly="true"
                        type="text"
                        nama="status"
                        title="Status"/>
                    <x-text-area
                        readonly="true"
                        nama="judul" title="Judul"
                        class="col-span-2"/>
                    <x-default-input
                        readonly="true"
                        nama="badan" title="T.E.U. Badan/Pengarang" type="text"/>
                    <x-default-input
                        readonly="true"
                        nama="nomor_peraturan" title="Nomor Peraturan" type="text"/>
                    <x-default-input
                        readonly="true"
                        nama="tempat_penetapan" title="Tempat Penetapan" type="text"/>
                    <x-default-input
                        readonly="true"
                        nama="tahun" title="Tahun" type="number"/>
                    <x-default-input
                        readonly="true"
                        nama="tanggal_ditetapkan" title="Tanggal ditetapkan" type="date"/>
                    <x-default-input
                        readonly="true"
                        nama="tanggal_diundangkan" title="Tanggal ditetapkan" type="date"/>
                    <x-default-input
                        readonly="true"
                        nama="bahasa" title="Bahasa" type="text"/>
                    <x-default-input
                        readonly="true"
                        class="col-span-2" nama="lokasi" title="Lokasi" type="text"/>
                    <div>
                        <x-jet-label class="my-3">Dokumen
                            <x-jet-button wire:click="unduh">unduh</x-jet-button>
                        </x-jet-label>
                        <embed class="w-full h-screen" src="{{$document}}"/>
                    </div>

                </div>
                <div class="text-right mt-3">
                </div>
            </x-slot>
        </x-jet-action-section>
    </div>
</div>
