<div>
    @if($errors->any())
        <x-jet-banner style="danger" :message="$errors->all()"/>
    @endif
    <x-slot name="header">{{__('Tambah Peraturan')}} <a href="{{route('peraturan')}}"><x-jet-secondary-button class="mx-3">kembali</x-jet-secondary-button></a></x-slot>
    <x-jet-action-section class="md:grid md:grid-cols-2 md:gap-6 grid-cols-2">
        <x-slot name="title"></x-slot>
        <x-slot name="description"></x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2 gap-4">
                <x-default-select class="col-span-2"
                                  :option="\App\Models\TipePeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                                  name="tipe_peraturan_id" title="Tipe Peraturan"/>
                <x-default-select class="col-span-2"
                                  :option="\App\Models\Kategori::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                                  name="subjek_id" title="Subjek"/>
                <x-default-select class="col-span-2"
                                  :option="\App\Models\JenisPeraturan::all()->pluck('keterangan','id')->prepend('Pilih',' ')"
                                  name="jenis_peraturan_id" title="Jenis"/>
                <x-default-select :option="\App\Models\Peraturan::status()->prepend('Pilih',' ')" name="status"
                                  title="Status"/>
                <x-text-area nama="judul" title="Judul" class="col-span-2"/>
                <x-default-input nama="badan" title="T.E.U. Badan/Pengarang" type="text"/>
                <x-default-input nama="nomor_peraturan" title="Nomor Peraturan" type="text"/>
                <x-default-input nama="tempat_penetapan" title="Tempat Penetapan" type="text"/>
                <x-default-input nama="tahun" title="Tahun" type="number"/>
                <x-default-input nama="tanggal_ditetapkan" title="Tanggal ditetapkan" type="date"/>
                <x-default-input nama="tanggal_diundangkan" title="Tanggal ditetapkan" type="date"/>
                <x-default-input nama="bahasa" title="Bahasa" type="text"/>
                <x-default-input class="col-span-2" nama="lokasi" title="Lokasi" type="text"/>
                <x-default-upload-file class="col-span-2" nama="document" :document="$document" title="Lokasi"
                                       type="file"/>
            </div>
            <div class="text-right mt-3">
                <x-jet-button wire:click="save">{{__('Simpan')}}</x-jet-button>
            </div>
        </x-slot>
    </x-jet-action-section>
</div>
